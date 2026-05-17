<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class HC_Module_Field_Scanner {

	const TABLE_SUFFIX         = 'hc_module_fields';
	const MODULE_INDEX_OPTION  = 'hc_module_field_module_index_v1';
	const SUMMARY_OPTION       = 'hc_module_field_scan_summary_v1';
	const PROGRESS_OPTION      = 'hc_module_field_scan_progress_v1';
	const LAST_ERROR_OPTION    = 'hc_module_field_last_error_v1';
	const SCHEMA_VERSION       = '1.0';
	const SCHEMA_OPTION        = 'hc_module_field_schema_version';
	const JS_READ_LIMIT        = 204800;
	const DEFAULT_BATCH_LIMIT  = 100;

	private static $current_scan_slug = '';
	private static $current_scan_context = '';

	public static function init() {
		add_action( 'admin_init', array( __CLASS__, 'maybe_upgrade_table' ) );
		add_action( 'wp_ajax_hc_module_analysis_scan_batch', array( __CLASS__, 'ajax_scan_batch' ) );
		add_action( 'wp_ajax_hc_module_analysis_save_custom_field', array( __CLASS__, 'ajax_save_custom_field' ) );
		add_action( 'wp_ajax_hc_module_analysis_update_review', array( __CLASS__, 'ajax_update_review' ) );
		add_action( 'admin_post_hc_module_analysis_export', array( __CLASS__, 'handle_export' ) );
	}

	public static function maybe_upgrade_table() {
		static $done = false;

		if ( $done ) {
			return self::table_exists();
		}

		$done = true;

		global $wpdb;

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';

		$table_name      = self::get_table_name();
		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE `{$table_name}` (
			`id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
			`module_slug` VARCHAR(190) NOT NULL,
			`module_title` VARCHAR(255) NULL,
			`shortcode` VARCHAR(190) NULL,
			`category` VARCHAR(120) NULL,
			`section` VARCHAR(80) NULL,
			`module_input_name` VARCHAR(190) NOT NULL,
			`profile_field` VARCHAR(120) NOT NULL,
			`field_label` VARCHAR(190) NULL,
			`field_type` VARCHAR(40) NULL,
			`field_unit` VARCHAR(40) NULL,
			`required` TINYINT(1) DEFAULT 1,
			`options_json` LONGTEXT NULL,
			`source` VARCHAR(80) DEFAULT 'auto_scan',
			`confidence` DECIMAL(5,2) DEFAULT 0.00,
			`has_meta_json` TINYINT(1) DEFAULT 0,
			`has_calculator_php` TINYINT(1) DEFAULT 0,
			`has_calculator_js` TINYINT(1) DEFAULT 0,
			`has_calculator_css` TINYINT(1) DEFAULT 0,
			`backend_supported` TINYINT(1) DEFAULT 0,
			`frontend_supported` TINYINT(1) DEFAULT 1,
			`profile_relevance_score` INT DEFAULT 0,
			`suggested_profile_status` VARCHAR(40) DEFAULT 'tool_only',
			`ai_useful` TINYINT(1) DEFAULT 0,
			`is_sensitive` TINYINT(1) DEFAULT 0,
			`is_custom_field` TINYINT(1) DEFAULT 0,
			`detected_field_key` VARCHAR(120) NULL,
			`field_group` VARCHAR(80) NULL,
			`admin_review_status` VARCHAR(40) DEFAULT 'auto',
			`created_at` DATETIME NULL,
			`updated_at` DATETIME NULL,
			PRIMARY KEY  (`id`),
			UNIQUE KEY `module_input_unique` (`module_slug`, `module_input_name`, `profile_field`),
			KEY `profile_field` (`profile_field`),
			KEY `module_slug` (`module_slug`),
			KEY `section` (`section`),
			KEY `suggested_profile_status` (`suggested_profile_status`),
			KEY `admin_review_status` (`admin_review_status`)
		) {$charset_collate};";

		dbDelta( $sql );
		self::migrate_legacy_sensitive_column();
		update_option( self::SCHEMA_OPTION, self::SCHEMA_VERSION, false );

		if ( self::table_exists() ) {
			delete_option( self::LAST_ERROR_OPTION );
			return true;
		}

		$error = $wpdb->last_error ? $wpdb->last_error : 'wp_hc_module_fields tablosu oluşturulamadı.';
		update_option( self::LAST_ERROR_OPTION, $error, false );
		return false;
	}

	public static function get_table_name() {
		global $wpdb;
		return $wpdb->prefix . self::TABLE_SUFFIX;
	}

	public static function table_exists() {
		global $wpdb;
		$table_name = self::get_table_name();
		$found      = $wpdb->get_var( $wpdb->prepare( 'SHOW TABLES LIKE %s', $table_name ) );

		return $found === $table_name;
	}

	public static function get_last_error() {
		return (string) get_option( self::LAST_ERROR_OPTION, '' );
	}

	public static function ajax_scan_batch() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error( array( 'message' => 'Yetkiniz yok.' ), 403 );
		}

		check_ajax_referer( 'hc_ajax_nonce', 'nonce' );

		$mode   = sanitize_key( wp_unslash( $_POST['mode'] ?? 'all' ) );
		$offset = max( 0, (int) ( $_POST['offset'] ?? 0 ) );
		$limit  = min( self::DEFAULT_BATCH_LIMIT, max( 1, (int) ( $_POST['limit'] ?? self::DEFAULT_BATCH_LIMIT ) ) );
		$slug   = sanitize_key( wp_unslash( $_POST['slug'] ?? '' ) );
		$reset  = ! empty( $_POST['reset'] );

		if ( $reset && 0 === $offset ) {
			self::clear_all_data();
		}

		$result = self::scan_all_modules(
			array(
				'mode'   => $slug ? 'single' : $mode,
				'offset' => $offset,
				'limit'  => $limit,
				'slug'   => $slug,
			)
		);

		wp_send_json_success( $result );
	}

	public static function ajax_save_custom_field() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error( array( 'message' => 'Yetkiniz yok.' ), 403 );
		}

		check_ajax_referer( 'hc_ajax_nonce', 'nonce' );

		$field_key = sanitize_key( wp_unslash( $_POST['field_key'] ?? '' ) );
		$label     = sanitize_text_field( wp_unslash( $_POST['label'] ?? '' ) );
		$type      = sanitize_key( wp_unslash( $_POST['type'] ?? 'text' ) );
		$unit      = sanitize_text_field( wp_unslash( $_POST['unit'] ?? '' ) );
		$group     = sanitize_key( wp_unslash( $_POST['field_group'] ?? 'custom' ) );
		$aliases   = array_filter(
			array_map(
				'trim',
				preg_split( '/[\r\n,]+/', (string) wp_unslash( $_POST['aliases'] ?? '' ) )
			)
		);
		$status    = sanitize_key( wp_unslash( $_POST['admin_review_status'] ?? 'approved' ) );

		$field = HC_Profile_Field_Dictionary::upsert_custom_field(
			$field_key,
			array(
				'label'               => $label ?: ucwords( str_replace( '_', ' ', $field_key ) ),
				'type'                => $type ?: 'text',
				'unit'                => $unit,
				'field_group'         => $group ?: 'custom',
				'aliases'             => $aliases ? $aliases : array( $field_key ),
				'admin_review_status' => $status ?: 'approved',
				'is_custom_field'     => 1,
			)
		);

		self::sync_custom_field_rows( $field_key, $field );
		self::rebuild_summary();

		wp_send_json_success(
			array(
				'message' => 'Alan tanımı kaydedildi.',
				'field'   => $field,
			)
		);
	}

	public static function ajax_update_review() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error( array( 'message' => 'Yetkiniz yok.' ), 403 );
		}

		check_ajax_referer( 'hc_ajax_nonce', 'nonce' );

		$field_key = sanitize_key( wp_unslash( $_POST['field_key'] ?? '' ) );
		$status    = sanitize_key( wp_unslash( $_POST['status'] ?? 'reviewed' ) );

		if ( '' === $field_key ) {
			wp_send_json_error( array( 'message' => 'Alan anahtarı gerekli.' ), 400 );
		}

		$field = HC_Profile_Field_Dictionary::upsert_custom_field(
			$field_key,
			array(
				'admin_review_status' => $status,
				'is_custom_field'     => 1,
			)
		);

		self::sync_custom_field_rows( $field_key, $field );
		self::rebuild_summary();

		wp_send_json_success( array( 'message' => 'İnceleme durumu güncellendi.' ) );
	}

	public static function handle_export() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( 'Yetkiniz yok.' );
		}

		check_admin_referer( 'hc_module_analysis_export' );

		$data = self::build_export_data();

		nocache_headers();
		header( 'Content-Type: application/json; charset=utf-8' );
		header( 'Content-Disposition: attachment; filename=hc-module-analysis-export.json' );

		echo wp_json_encode( $data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT );
		exit;
	}

	public static function scan_all_modules( $args = array() ) {
		if ( ! self::maybe_upgrade_table() ) {
			return array(
				'mode'       => $args['mode'] ?? 'all',
				'offset'     => 0,
				'next_offset'=> 0,
				'processed'  => 0,
				'total'      => 0,
				'done'       => true,
				'results'    => array(),
				'summary'    => self::rebuild_summary(),
				'error'      => self::get_last_error(),
			);
		}

		$args = wp_parse_args(
			$args,
			array(
				'mode'   => 'all',
				'offset' => 0,
				'limit'  => self::DEFAULT_BATCH_LIMIT,
				'slug'   => '',
			)
		);

		$slugs = self::get_all_module_slugs();

		if ( 'missing' === $args['mode'] ) {
			$scanned_slugs = array_keys( self::get_module_index() );
			$slugs         = array_values( array_diff( $slugs, $scanned_slugs ) );
		} elseif ( 'single' === $args['mode'] && $args['slug'] ) {
			$slugs = in_array( $args['slug'], $slugs, true ) ? array( $args['slug'] ) : array();
		}

		$total   = count( $slugs );
		$offset  = min( (int) $args['offset'], $total );
		$batch   = array_slice( $slugs, $offset, (int) $args['limit'] );
		$results = array();

		foreach ( $batch as $slug ) {
			$results[] = self::scan_module( $slug );
		}

		$next_offset = $offset + count( $batch );
		$done        = $next_offset >= $total;
		$summary     = self::rebuild_summary();

		update_option(
			self::PROGRESS_OPTION,
			array(
				'mode'        => $args['mode'],
				'offset'      => $next_offset,
				'total'       => $total,
				'processed'   => $next_offset,
				'done'        => $done,
				'updated_at'  => current_time( 'mysql' ),
			),
			false
		);

		return array(
			'mode'       => $args['mode'],
			'offset'     => $offset,
			'next_offset'=> $next_offset,
			'processed'  => count( $batch ),
			'total'      => $total,
			'done'       => $done,
			'results'    => $results,
			'summary'    => $summary,
		);
	}

	public static function scan_module( $slug ) {
		if ( ! self::maybe_upgrade_table() ) {
			return array(
				'slug'              => sanitize_key( $slug ),
				'error'             => true,
				'error_code'        => 'table_creation_failed',
				'message'           => self::get_last_error(),
				'field_count'       => 0,
				'profile_fields'    => array(),
				'required_fields'   => array(),
				'optional_fields'   => array(),
				'backend_supported' => 0,
			);
		}

		$slug = sanitize_key( $slug );
		self::$current_scan_slug = $slug;

		$module_path = self::get_module_path( $slug );
		$files       = array(
			'meta_json'      => is_file( $module_path . 'meta.json' ),
			'calculator_php' => is_file( $module_path . 'calculator.php' ),
			'calculator_js'  => is_file( $module_path . 'calculator.js' ),
			'calculator_css' => is_file( $module_path . 'calculator.css' ),
		);

		$meta        = self::read_meta_json( $slug );
		$php_content = $files['calculator_php'] ? (string) file_get_contents( $module_path . 'calculator.php' ) : '';
		$js_content  = $files['calculator_js'] ? (string) file_get_contents( $module_path . 'calculator.js', false, null, 0, self::JS_READ_LIMIT ) : '';
		$title       = ! empty( $meta['name'] ) ? (string) $meta['name'] : self::humanize_slug( $slug );
		$shortcode   = self::detect_shortcode( $meta, $php_content, $slug );
		$category    = self::detect_category( $slug, $title, $meta );
		$section     = self::infer_section( $slug, $title, $category );
		$backend     = self::detect_backend_supported( $slug );
		$context     = implode(
			' ',
			array_filter(
				array(
					$slug,
					$title,
					(string) ( $meta['desc'] ?? '' ),
					$category,
					$section,
				)
			)
		);
		self::$current_scan_context = $context;

		$meta_inputs = self::extract_inputs_from_meta( $meta );
		$php_inputs  = self::extract_inputs_from_calculator_php( $php_content );
		$js_inputs   = self::extract_inputs_from_calculator_js( $js_content );
		$inputs      = array_merge( $meta_inputs, $php_inputs );

		if ( empty( $inputs ) ) {
			$inputs = array_merge( $inputs, $js_inputs );
		} else {
			$inputs = array_merge(
				$inputs,
				array_values(
					array_filter(
						$js_inputs,
						static function ( $row ) {
							return in_array( (string) ( $row['source'] ?? '' ), array( 'calculator_js_formdata' ), true );
						}
					)
				)
			);
		}

		$field_rows = self::prepare_field_rows( $slug, $inputs, $context );
		$relevance  = self::infer_profile_relevance( $slug, $title, $field_rows );

		foreach ( $field_rows as &$field_row ) {
			$field_row['profile_relevance_score']  = $relevance['score'];
			$field_row['suggested_profile_status'] = $relevance['suggested_status'];
			$field_row['ai_useful']                = $relevance['ai_useful'] ? 1 : 0;
			$field_row['is_sensitive']             = $field_row['is_sensitive'] ? 1 : ( $relevance['sensitive'] ? 1 : 0 );
		}
		unset( $field_row );

		$module_info = array(
			'module_slug'             => $slug,
			'module_title'            => $title,
			'shortcode'               => $shortcode,
			'category'                => $category,
			'section'                 => $section,
			'has_meta_json'           => $files['meta_json'] ? 1 : 0,
			'has_calculator_php'      => $files['calculator_php'] ? 1 : 0,
			'has_calculator_js'       => $files['calculator_js'] ? 1 : 0,
			'has_calculator_css'      => $files['calculator_css'] ? 1 : 0,
			'backend_supported'       => $backend ? 1 : 0,
			'frontend_supported'      => 1,
			'profile_relevance_score' => $relevance['score'],
			'suggested_profile_status'=> $relevance['suggested_status'],
			'ai_useful'               => $relevance['ai_useful'] ? 1 : 0,
			'is_sensitive'            => $relevance['sensitive'] ? 1 : 0,
		);

		$save_result = self::save_module_fields( $slug, $module_info, $field_rows );

		if ( is_wp_error( $save_result ) ) {
			return array(
				'slug'              => $slug,
				'title'             => $title,
				'error'             => true,
				'error_code'        => $save_result->get_error_code(),
				'message'           => $save_result->get_error_message(),
				'field_count'       => count( $field_rows ),
				'profile_fields'    => array_values( array_unique( array_filter( wp_list_pluck( $field_rows, 'profile_field' ), array( __CLASS__, 'filter_known_profile_field' ) ) ) ),
				'required_fields'   => array_values( array_unique( wp_list_pluck( array_filter( $field_rows, array( __CLASS__, 'filter_required_rows' ) ), 'profile_field' ) ) ),
				'optional_fields'   => array_values( array_unique( wp_list_pluck( array_filter( $field_rows, array( __CLASS__, 'filter_optional_rows' ) ), 'profile_field' ) ) ),
				'backend_supported' => $backend ? 1 : 0,
			);
		}

		return array(
			'slug'               => $slug,
			'title'              => $title,
			'field_count'        => count( $field_rows ),
			'no_inputs_detected' => empty( $field_rows ),
			'profile_fields'     => array_values( array_unique( array_filter( wp_list_pluck( $field_rows, 'profile_field' ), array( __CLASS__, 'filter_known_profile_field' ) ) ) ),
			'required_fields'    => array_values( array_unique( wp_list_pluck( array_filter( $field_rows, array( __CLASS__, 'filter_required_rows' ) ), 'profile_field' ) ) ),
			'optional_fields'    => array_values( array_unique( wp_list_pluck( array_filter( $field_rows, array( __CLASS__, 'filter_optional_rows' ) ), 'profile_field' ) ) ),
			'suggested_status'   => $relevance['suggested_status'],
			'backend_supported'  => $backend ? 1 : 0,
		);
	}

	public static function get_module_path( $slug ) {
		return trailingslashit( HC_PLUGIN_DIR . 'modules/' . $slug );
	}

	public static function read_meta_json( $slug ) {
		$file = self::get_module_path( $slug ) . 'meta.json';

		if ( ! is_file( $file ) ) {
			return array();
		}

		$data = json_decode( (string) file_get_contents( $file ), true );

		return is_array( $data ) ? $data : array();
	}

	public static function extract_inputs_from_meta( $meta ) {
		$keys   = array( 'inputs', 'fields', 'schema', 'form_fields' );
		$inputs = array();

		foreach ( $keys as $key ) {
			if ( empty( $meta[ $key ] ) || ! is_array( $meta[ $key ] ) ) {
				continue;
			}

			foreach ( $meta[ $key ] as $field ) {
				if ( ! is_array( $field ) ) {
					continue;
				}

				$name = (string) ( $field['name'] ?? $field['id'] ?? '' );
				if ( '' === $name ) {
					continue;
				}

				$inputs[] = array(
					'module_input_name' => $name,
					'field_label'       => (string) ( $field['label'] ?? $field['title'] ?? $name ),
					'field_type'        => (string) ( $field['type'] ?? 'text' ),
					'field_unit'        => (string) ( $field['unit'] ?? '' ),
					'required'          => isset( $field['required'] ) ? (int) (bool) $field['required'] : 1,
					'options'           => ! empty( $field['options'] ) && is_array( $field['options'] ) ? array_values( $field['options'] ) : array(),
					'source'            => 'meta_json',
					'confidence'        => 0.98,
				);
			}
		}

		return $inputs;
	}

	public static function extract_inputs_from_calculator_php( $php_content ) {
		if ( '' === trim( $php_content ) ) {
			return array();
		}

		$content = preg_replace( '/<\?(?:php|=)[\s\S]*?\?>/u', ' ', $php_content );

		if ( ! class_exists( 'DOMDocument' ) ) {
			return self::extract_inputs_from_php_regex( $content );
		}

		$internal_errors = libxml_use_internal_errors( true );
		$dom             = new DOMDocument();
		$loaded          = $dom->loadHTML(
			'<?xml encoding="utf-8" ?><div id="hc-scan-root">' . $content . '</div>',
			LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
		);
		libxml_clear_errors();
		libxml_use_internal_errors( $internal_errors );

		if ( ! $loaded ) {
			return self::extract_inputs_from_php_regex( $content );
		}

		$xpath = new DOMXPath( $dom );
		$nodes = $xpath->query( '//*[@id="hc-scan-root"]//*[self::input or self::select or self::textarea]' );
		$rows  = array();

		if ( ! $nodes ) {
			return array();
		}

		foreach ( $nodes as $node ) {
			$tag  = strtolower( $node->nodeName );
			$type = 'input' === $tag ? strtolower( $node->getAttribute( 'type' ) ?: 'text' ) : $tag;

			if ( in_array( $type, array( 'hidden', 'submit', 'button', 'reset' ), true ) ) {
				continue;
			}

			$name = (string) ( $node->getAttribute( 'name' ) ?: $node->getAttribute( 'id' ) );
			if ( '' === $name ) {
				continue;
			}

			$options = array();
			if ( 'select' === $tag ) {
				foreach ( $node->getElementsByTagName( 'option' ) as $option_node ) {
					$option_text = trim( wp_strip_all_tags( $option_node->textContent ) );
					if ( '' !== $option_text ) {
						$options[] = $option_text;
					}
				}
			}

			$rows[] = array(
				'module_input_name' => $name,
				'field_label'       => self::resolve_dom_label( $node, $xpath ),
				'field_type'        => $type,
				'field_unit'        => self::detect_unit_from_text(
					(string) ( self::resolve_dom_label( $node, $xpath ) . ' ' . $node->getAttribute( 'placeholder' ) )
				),
				'required'          => $node->hasAttribute( 'required' ) ? 1 : 1,
				'options'           => array_values( array_unique( $options ) ),
				'source'            => 'calculator_php',
				'confidence'        => 0.94,
			);
		}

		return $rows;
	}

	public static function extract_inputs_from_calculator_js( $js_content ) {
		if ( '' === trim( $js_content ) ) {
			return array();
		}

		$rows = array();

		if ( preg_match_all( '/getElementById\(\s*[\'"]([^\'"]+)[\'"]\s*\)/', $js_content, $matches ) ) {
			foreach ( array_unique( $matches[1] ) as $id ) {
				if ( self::should_ignore_js_dom_id( $id ) ) {
					continue;
				}

				$name = self::infer_name_from_dom_id( $id );
				if ( '' === $name ) {
					continue;
				}

				$rows[] = array(
					'module_input_name' => $name,
					'field_label'       => self::humanize_slug( str_replace( '_', '-', $name ) ),
					'field_type'        => 'text',
					'field_unit'        => '',
					'required'          => 1,
					'options'           => array(),
					'source'            => 'calculator_js_id',
					'confidence'        => 0.56,
				);
			}
		}

		if ( preg_match_all( '/FormData\s*\([^\)]*\)\.get\(\s*[\'"]([^\'"]+)[\'"]\s*\)/', $js_content, $matches ) ) {
			foreach ( array_unique( $matches[1] ) as $name ) {
				$rows[] = array(
					'module_input_name' => $name,
					'field_label'       => self::humanize_slug( str_replace( '_', '-', $name ) ),
					'field_type'        => 'text',
					'field_unit'        => '',
					'required'          => 1,
					'options'           => array(),
					'source'            => 'calculator_js_formdata',
					'confidence'        => 0.72,
				);
			}
		}

		if ( preg_match_all( '/querySelector\(\s*[\'"](?:#|\[name=\\?[\'"])([^\'"\]]+)/', $js_content, $matches ) ) {
			foreach ( array_unique( $matches[1] ) as $selector_name ) {
				if ( self::should_ignore_js_dom_id( $selector_name ) ) {
					continue;
				}

				$name = self::infer_name_from_dom_id( $selector_name );
				if ( '' === $name ) {
					continue;
				}

				$rows[] = array(
					'module_input_name' => $name,
					'field_label'       => self::humanize_slug( str_replace( '_', '-', $name ) ),
					'field_type'        => 'text',
					'field_unit'        => '',
					'required'          => 1,
					'options'           => array(),
					'source'            => 'calculator_js_selector',
					'confidence'        => 0.58,
				);
			}
		}

		return $rows;
	}

	public static function detect_shortcode( $meta, $php_content, $slug ) {
		if ( ! empty( $meta['shortcode'] ) ) {
			return (string) $meta['shortcode'];
		}

		if ( preg_match( '/\[hc_[a-z0-9_]+\]/i', $php_content, $match ) ) {
			return $match[0];
		}

		return '[hc_' . str_replace( '-', '_', $slug ) . ']';
	}

	public static function map_input_to_profile_field( $input, $context = '' ) {
		$context = $context ? $context : self::$current_scan_context;
		$match = HC_Profile_Field_Dictionary::match_profile_field(
			(string) ( $input['module_input_name'] ?? '' ),
			(string) ( $input['field_label'] ?? '' ),
			$context
		);

		$field_info = HC_Profile_Field_Dictionary::get_field( $match['profile_field'] );

		return array(
			'profile_field'      => $match['profile_field'],
			'confidence'         => (float) $match['confidence'],
			'is_sensitive'       => ! empty( $field_info['sensitive'] ),
			'ai_useful'          => ! empty( $field_info['ai_useful'] ),
			'is_custom_field'    => ! empty( $match['is_custom_field'] ),
			'detected_field_key' => (string) ( $match['detected_field_key'] ?? $match['profile_field'] ),
			'field_group'        => (string) ( $match['field_group'] ?? ( $field_info['field_group'] ?? '' ) ),
			'admin_review_status'=> (string) ( $match['admin_review_status'] ?? 'reviewed' ),
		);
	}

	public static function infer_section( $slug, $title, $category ) {
		$source = strtolower(
			(function_exists( 'remove_accents' ) ? remove_accents( $slug . ' ' . $title . ' ' . $category ) : $slug . ' ' . $title . ' ' . $category)
		);

		$map = array(
			'astrology_houses' => array( 'ev-yerlesimi', 'ev-hesaplama' ),
			'moon_sky'         => array( 'ay-burcu', 'ay fazi', 'ay-fazi', 'ay-evresi', 'gezegen' ),
			'astrology'        => array( 'burc', 'astroloji', 'yukselen' ),
			'numerology'       => array( 'numeroloji', 'yasam-yolu', 'kisisel-yil', 'ifade', 'kalp-arzusu' ),
			'health_lifestyle' => array( 'vucut', 'kilo', 'su-ihtiyaci', 'kalori-ihtiyaci', 'bmi', 'ideal-kilo' ),
			'sport_activity'   => array( 'adim', 'kosu', 'yuruyus', 'bisiklet', 'protein', 'spor' ),
			'automotive'       => array( 'arac', 'otomotiv', '0-100', 'beygir', 'cekis', 'drivetrain', 'motor', 'tork' ),
			'tarot'            => array( 'tarot' ),
			'chinese_astrology'=> array( 'cin-burcu', 'yin-yang', 'cin-astrolojisi' ),
			'symbolic'         => array( 'sansli', 'dogum-tasi', 'dogum-cicegi', 'melek', 'cakra' ),
		);

		foreach ( $map as $section => $keywords ) {
			foreach ( $keywords as $keyword ) {
				if ( false !== strpos( $source, $keyword ) ) {
					return $section;
				}
			}
		}

		return 'overview';
	}

	public static function infer_profile_relevance( $slug, $title, $fields ) {
		$source = strtolower( function_exists( 'remove_accents' ) ? remove_accents( $slug . ' ' . $title ) : $slug . ' ' . $title );
		$deny   = array( 'portfoy', 'beta', 'kredi', 'faiz', 'yatirim', 'borsa', 'vergi', 'gelir', 'gider', 'maliyet', 'butce', 'muhasebe', 'kur', 'dosya', 'pdf', 'excel', 'word', 'elektrik', 'kablo', 'akim', 'volt', 'watt', 'beton', 'boru', 'kolon', 'kimya', 'fizik', 'sinav', 'puan', 'yemek', 'tarif', 'porsiyon' );

		foreach ( $deny as $keyword ) {
			if ( false !== strpos( $source, $keyword ) ) {
				return array(
					'score'            => 0,
					'suggested_status' => 'disabled',
					'ai_useful'        => false,
					'sensitive'        => self::rows_have_sensitive_fields( $fields ),
				);
			}
		}

		$profile_fields = array_values( array_unique( array_filter( wp_list_pluck( $fields, 'profile_field' ) ) ) );
		$score          = 0;

		if ( in_array( 'birth_date', $profile_fields, true ) ) {
			$score += 55;
		}
		if ( in_array( 'birth_time', $profile_fields, true ) ) {
			$score += 20;
		}
		if ( in_array( 'birth_place', $profile_fields, true ) ) {
			$score += 18;
		}
		if ( array_intersect( array( 'height', 'weight', 'gender', 'activity_level', 'daily_steps', 'sleep_hours' ), $profile_fields ) ) {
			$score += 48;
		}
		if ( in_array( 'partner_birth_date', $profile_fields, true ) ) {
			$score += 28;
		}

		$section = self::infer_section( $slug, $title, '' );

		if ( in_array( $section, array( 'astrology', 'moon_sky', 'astrology_houses', 'numerology', 'symbolic', 'chinese_astrology', 'tarot' ), true ) && in_array( 'birth_date', $profile_fields, true ) ) {
			$score += 22;
		}

		if ( in_array( $section, array( 'health_lifestyle', 'sport_activity' ), true ) && array_intersect( array( 'height', 'weight', 'activity_level', 'daily_steps' ), $profile_fields ) ) {
			$score += 24;
		}

		if ( empty( $profile_fields ) || ( 1 === count( $profile_fields ) && in_array( 'unknown', $profile_fields, true ) ) ) {
			$score = 0;
		}

		$score = min( 100, max( 0, $score ) );

		if ( $score >= 85 ) {
			$status = 'profile_core';
		} elseif ( $score >= 50 ) {
			$status = 'profile_optional';
		} elseif ( $score >= 1 ) {
			$status = 'tool_only';
		} else {
			$status = 'tool_only';
		}

		return array(
			'score'            => $score,
			'suggested_status' => $status,
			'ai_useful'        => $score >= 50,
			'sensitive'        => self::rows_have_sensitive_fields( $fields ),
		);
	}

	public static function detect_backend_supported( $slug ) {
		return class_exists( 'HC_Calculation_API' ) && HC_Calculation_API::is_supported( $slug );
	}

	public static function save_module_fields( $slug, $module_info, $field_rows ) {
		global $wpdb;

		if ( ! self::table_exists() && ! self::maybe_upgrade_table() ) {
			return new WP_Error( 'table_missing', self::get_last_error() ?: 'wp_hc_module_fields tablosu mevcut değil.' );
		}

		$table_name = self::get_table_name();
		$now        = current_time( 'mysql' );
		$index      = self::get_module_index();

		self::clear_module_fields( $slug );

		foreach ( $field_rows as $row ) {
			$data = array_merge(
				$module_info,
				array(
					'module_input_name' => (string) $row['module_input_name'],
					'profile_field'     => (string) $row['profile_field'],
					'field_label'       => (string) $row['field_label'],
					'field_type'        => (string) $row['field_type'],
					'field_unit'        => (string) $row['field_unit'],
					'required'          => (int) $row['required'],
					'options_json'      => ! empty( $row['options'] ) ? wp_json_encode( array_values( $row['options'] ), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES ) : null,
					'source'            => (string) $row['source'],
					'confidence'        => round( (float) $row['confidence'], 2 ),
					'is_sensitive'      => ! empty( $row['is_sensitive'] ) ? 1 : 0,
					'ai_useful'         => ! empty( $row['ai_useful'] ) ? 1 : 0,
					'is_custom_field'   => ! empty( $row['is_custom_field'] ) ? 1 : 0,
					'detected_field_key'=> ! empty( $row['detected_field_key'] ) ? (string) $row['detected_field_key'] : null,
					'field_group'       => ! empty( $row['field_group'] ) ? (string) $row['field_group'] : null,
					'admin_review_status' => ! empty( $row['admin_review_status'] ) ? (string) $row['admin_review_status'] : 'auto',
					'created_at'        => $now,
					'updated_at'        => $now,
				)
			);

			$inserted = $wpdb->insert( $table_name, $data );

			if ( false === $inserted ) {
				$error = $wpdb->last_error ? $wpdb->last_error : 'Modül alan kaydı veritabanına yazılamadı.';
				update_option( self::LAST_ERROR_OPTION, $error, false );
				return new WP_Error( 'insert_failed', $error );
			}
		}

		$known_fields = array_values(
			array_unique(
				array_filter(
					array_map(
						static function ( $row ) {
							return 'unknown' === $row['profile_field'] ? '' : $row['profile_field'];
						},
						$field_rows
					)
				)
			)
		);

		$index[ $slug ] = array(
			'slug'                    => $slug,
			'title'                   => $module_info['module_title'],
			'shortcode'               => $module_info['shortcode'],
			'category'                => $module_info['category'],
			'section'                 => $module_info['section'],
			'has_meta_json'           => (int) $module_info['has_meta_json'],
			'has_calculator_php'      => (int) $module_info['has_calculator_php'],
			'has_calculator_js'       => (int) $module_info['has_calculator_js'],
			'has_calculator_css'      => (int) $module_info['has_calculator_css'],
			'backend_supported'       => (int) $module_info['backend_supported'],
			'frontend_supported'      => (int) $module_info['frontend_supported'],
			'profile_relevance_score' => (int) $module_info['profile_relevance_score'],
			'suggested_profile_status'=> (string) $module_info['suggested_profile_status'],
			'ai_useful'               => (int) $module_info['ai_useful'],
			'is_sensitive'            => (int) $module_info['is_sensitive'],
			'profile_fields'          => $known_fields,
			'required_fields'         => array_values( array_unique( wp_list_pluck( array_filter( $field_rows, array( __CLASS__, 'filter_required_rows' ) ), 'profile_field' ) ) ),
			'optional_fields'         => array_values( array_unique( wp_list_pluck( array_filter( $field_rows, array( __CLASS__, 'filter_optional_rows' ) ), 'profile_field' ) ) ),
			'total_fields'            => count( $field_rows ),
			'matched_fields'          => count( $known_fields ),
			'custom_fields'           => count( array_filter( $field_rows, static function ( $row ) { return ! empty( $row['is_custom_field'] ); } ) ),
			'low_confidence_fields'   => count( array_filter( $field_rows, array( __CLASS__, 'filter_low_confidence_rows' ) ) ),
			'no_inputs_detected'      => empty( $field_rows ),
			'updated_at'              => $now,
		);

		update_option( self::MODULE_INDEX_OPTION, $index, false );
		delete_option( self::LAST_ERROR_OPTION );

		return true;
	}

	public static function clear_module_fields( $slug ) {
		global $wpdb;

		$wpdb->delete( self::get_table_name(), array( 'module_slug' => $slug ), array( '%s' ) );
	}

	public static function get_scan_summary() {
		$summary = get_option( self::SUMMARY_OPTION, array() );

		if ( ! is_array( $summary ) || empty( $summary ) ) {
			$summary = self::rebuild_summary();
		}

		$summary['table_exists'] = self::table_exists();
		$summary['last_error']   = self::get_last_error();

		return $summary;
	}

	public static function get_admin_report( $args = array() ) {
		$args = wp_parse_args(
			$args,
			array(
				'search'                  => '',
				'profile_field'           => '',
				'section'                 => '',
				'suggested_profile_status'=> '',
				'backend_supported'       => '',
				'confidence_bucket'       => '',
				'no_input_detected'       => '',
				'custom_field_only'       => '',
				'page_num'                => 1,
				'per_page'                => 200,
			)
		);

		$table_exists = self::table_exists();

		return array(
			'summary'             => self::get_scan_summary(),
			'rows'                => $table_exists ? self::get_admin_rows( $args ) : array( 'items' => array(), 'total_items' => 0, 'page_num' => 1, 'per_page' => (int) $args['per_page'], 'total_pages' => 1 ),
			'no_input_modules'    => self::get_no_input_modules( $args ),
			'filter_options'      => $table_exists ? self::get_filter_options() : array( 'profile_fields' => array(), 'sections' => array(), 'statuses' => array(), 'field_groups' => array() ),
			'profile_field_counts'=> $table_exists ? self::get_profile_field_counts() : array(),
			'module_index'        => self::get_module_index(),
			'export_url'          => wp_nonce_url( admin_url( 'admin-post.php?action=hc_module_analysis_export' ), 'hc_module_analysis_export' ),
		);
	}

	public static function build_export_data() {
		global $wpdb;

		$table_name  = self::get_table_name();
		$rows        = self::table_exists() ? $wpdb->get_results( "SELECT * FROM {$table_name} ORDER BY module_slug ASC, id ASC", ARRAY_A ) : array();
		$module_index = self::get_module_index();
		$grouped      = array();

		foreach ( $rows as $row ) {
			$slug = $row['module_slug'];
			if ( ! isset( $grouped[ $slug ] ) ) {
				$summary            = isset( $module_index[ $slug ] ) ? $module_index[ $slug ] : array();
				$grouped[ $slug ]   = array(
					'slug'               => $slug,
					'title'              => $row['module_title'],
					'shortcode'          => $row['shortcode'],
					'category'           => $row['category'],
					'section'            => $row['section'],
					'profile_fields'     => array(),
					'required_fields'    => array(),
					'optional_fields'    => array(),
					'module_inputs'      => array(),
					'files'              => array(
						'meta_json'      => ! empty( $row['has_meta_json'] ),
						'calculator_php' => ! empty( $row['has_calculator_php'] ),
						'calculator_js'  => ! empty( $row['has_calculator_js'] ),
						'calculator_css' => ! empty( $row['has_calculator_css'] ),
					),
					'capabilities'       => array(
						'backend_supported' => ! empty( $row['backend_supported'] ),
						'frontend_supported'=> ! empty( $row['frontend_supported'] ),
					),
					'profile_relevance'  => array(
						'score'            => (int) $row['profile_relevance_score'],
						'suggested_status' => (string) $row['suggested_profile_status'],
						'ai_useful'        => ! empty( $row['ai_useful'] ),
					'sensitive'        => ! empty( $row['is_sensitive'] ) || ! empty( $summary['is_sensitive'] ),
					),
				);
			}

			if ( 'unknown' !== $row['profile_field'] ) {
				$grouped[ $slug ]['profile_fields'][] = $row['profile_field'];
			}

			if ( ! empty( $row['required'] ) && 'unknown' !== $row['profile_field'] ) {
				$grouped[ $slug ]['required_fields'][] = $row['profile_field'];
			} elseif ( 'unknown' !== $row['profile_field'] ) {
				$grouped[ $slug ]['optional_fields'][] = $row['profile_field'];
			}

			$grouped[ $slug ]['module_inputs'][] = array(
				'name'          => $row['module_input_name'],
				'profile_field' => $row['profile_field'],
				'type'          => $row['field_type'],
				'required'      => ! empty( $row['required'] ),
				'label'         => $row['field_label'],
				'unit'          => $row['field_unit'],
			);
		}

		foreach ( $module_index as $slug => $summary ) {
			if ( isset( $grouped[ $slug ] ) ) {
				continue;
			}

			$grouped[ $slug ] = array(
				'slug'               => $slug,
				'title'              => $summary['title'],
				'shortcode'          => $summary['shortcode'],
				'category'           => $summary['category'],
				'section'            => $summary['section'],
				'profile_fields'     => array(),
				'required_fields'    => array(),
				'optional_fields'    => array(),
				'module_inputs'      => array(),
				'files'              => array(
					'meta_json'      => ! empty( $summary['has_meta_json'] ),
					'calculator_php' => ! empty( $summary['has_calculator_php'] ),
					'calculator_js'  => ! empty( $summary['has_calculator_js'] ),
					'calculator_css' => ! empty( $summary['has_calculator_css'] ),
				),
				'capabilities'       => array(
					'backend_supported' => ! empty( $summary['backend_supported'] ),
					'frontend_supported'=> ! empty( $summary['frontend_supported'] ),
				),
				'profile_relevance'  => array(
					'score'            => (int) $summary['profile_relevance_score'],
					'suggested_status' => (string) $summary['suggested_profile_status'],
					'ai_useful'        => ! empty( $summary['ai_useful'] ),
					'sensitive'        => ! empty( $summary['is_sensitive'] ),
				),
			);
		}

		foreach ( $grouped as &$module ) {
			$module['profile_fields']  = array_values( array_unique( array_filter( $module['profile_fields'] ) ) );
			$module['required_fields'] = array_values( array_unique( array_filter( $module['required_fields'] ) ) );
			$module['optional_fields'] = array_values( array_unique( array_filter( $module['optional_fields'] ) ) );
		}
		unset( $module );

		ksort( $grouped, SORT_NATURAL | SORT_FLAG_CASE );

		return array(
			'version'      => '1.0',
			'generated_at' => current_time( 'mysql' ),
			'source'       => 'hesaplama-suite',
			'modules'      => array_values( $grouped ),
		);
	}

	public static function get_custom_field_registry() {
		global $wpdb;

		$table_name   = self::get_table_name();
		$definitions  = HC_Profile_Field_Dictionary::get_custom_fields();
		$db_fields    = $wpdb->get_results(
			"SELECT detected_field_key, profile_field, field_label, field_type, field_unit, field_group, admin_review_status, MAX(confidence) AS max_confidence, COUNT(DISTINCT module_slug) AS module_count
			 FROM {$table_name}
			 WHERE is_custom_field = 1
			 GROUP BY detected_field_key, profile_field, field_label, field_type, field_unit, field_group, admin_review_status
			 ORDER BY module_count DESC, detected_field_key ASC",
			ARRAY_A
		);
		$registry = array();

		foreach ( $db_fields as $row ) {
			$key = HC_Profile_Field_Dictionary::normalize_input_name( (string) ( $row['detected_field_key'] ?: $row['profile_field'] ) );
			if ( '' === $key ) {
				continue;
			}

			$registry[ $key ] = array(
				'field_key'            => $key,
				'label'                => (string) ( $definitions[ $key ]['label'] ?? $row['field_label'] ?? self::humanize_slug( $key ) ),
				'type'                 => (string) ( $definitions[ $key ]['type'] ?? $row['field_type'] ?? 'text' ),
				'unit'                 => (string) ( $definitions[ $key ]['unit'] ?? $row['field_unit'] ?? '' ),
				'field_group'          => (string) ( $definitions[ $key ]['field_group'] ?? $row['field_group'] ?? 'custom' ),
				'admin_review_status'  => (string) ( $definitions[ $key ]['admin_review_status'] ?? $row['admin_review_status'] ?? 'auto' ),
				'aliases'              => (array) ( $definitions[ $key ]['aliases'] ?? array( $key ) ),
				'module_count'         => (int) $row['module_count'],
				'confidence'           => round( (float) $row['max_confidence'], 2 ),
			);
		}

		foreach ( $definitions as $key => $definition ) {
			if ( isset( $registry[ $key ] ) ) {
				continue;
			}

			$registry[ $key ] = array(
				'field_key'            => $key,
				'label'                => (string) ( $definition['label'] ?? self::humanize_slug( $key ) ),
				'type'                 => (string) ( $definition['type'] ?? 'text' ),
				'unit'                 => (string) ( $definition['unit'] ?? '' ),
				'field_group'          => (string) ( $definition['field_group'] ?? 'custom' ),
				'admin_review_status'  => (string) ( $definition['admin_review_status'] ?? 'approved' ),
				'aliases'              => (array) ( $definition['aliases'] ?? array( $key ) ),
				'module_count'         => 0,
				'confidence'           => 1.00,
			);
		}

		ksort( $registry, SORT_NATURAL | SORT_FLAG_CASE );

		return $registry;
	}

	private static function clear_all_data() {
		global $wpdb;

		$wpdb->query( 'TRUNCATE TABLE ' . self::get_table_name() ); // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
		delete_option( self::MODULE_INDEX_OPTION );
		delete_option( self::SUMMARY_OPTION );
		delete_option( self::PROGRESS_OPTION );
	}

	private static function get_all_module_slugs() {
		$slugs = array();

		foreach ( glob( HC_PLUGIN_DIR . 'modules/*', GLOB_ONLYDIR ) ?: array() as $path ) {
			$slugs[] = basename( $path );
		}

		sort( $slugs, SORT_NATURAL | SORT_FLAG_CASE );

		return $slugs;
	}

	private static function prepare_field_rows( $slug, $inputs, $context = '' ) {
		$prepared = array();

		foreach ( $inputs as $input ) {
			$name = HC_Profile_Field_Dictionary::normalize_input_name( (string) ( $input['module_input_name'] ?? '' ) );
			if ( '' === $name ) {
				continue;
			}

			$mapped = self::map_input_to_profile_field( $input, $context );
			$key    = $name . '|' . $mapped['profile_field'];

			$row = array(
				'module_slug'       => $slug,
				'module_input_name' => $name,
				'profile_field'     => $mapped['profile_field'],
				'field_label'       => (string) ( $input['field_label'] ?? self::humanize_slug( str_replace( '_', '-', $name ) ) ),
				'field_type'        => (string) ( $input['field_type'] ?? 'text' ),
				'field_unit'        => (string) ( $input['field_unit'] ?? '' ),
				'required'          => isset( $input['required'] ) ? (int) $input['required'] : 1,
				'options'           => ! empty( $input['options'] ) ? array_values( array_unique( array_filter( (array) $input['options'] ) ) ) : array(),
				'source'            => (string) ( $input['source'] ?? 'auto_scan' ),
				'confidence'        => max( (float) ( $input['confidence'] ?? 0 ), (float) $mapped['confidence'] ),
				'is_sensitive'      => ! empty( $mapped['is_sensitive'] ),
				'ai_useful'         => ! empty( $mapped['ai_useful'] ),
				'is_custom_field'   => ! empty( $mapped['is_custom_field'] ),
				'detected_field_key'=> (string) ( $mapped['detected_field_key'] ?? $mapped['profile_field'] ),
				'field_group'       => (string) ( $mapped['field_group'] ?? '' ),
				'admin_review_status' => (string) ( $mapped['admin_review_status'] ?? 'reviewed' ),
			);

			if ( ! isset( $prepared[ $key ] ) || $row['confidence'] > $prepared[ $key ]['confidence'] ) {
				$prepared[ $key ] = $row;
			}
		}

		return array_values( $prepared );
	}

	private static function get_module_index() {
		$index = get_option( self::MODULE_INDEX_OPTION, array() );
		return is_array( $index ) ? $index : array();
	}

	private static function rebuild_summary() {
		global $wpdb;

		$table_name = self::get_table_name();
		$index      = self::get_module_index();
		$all_slugs  = self::get_all_module_slugs();
		$summary    = array(
			'total_modules'           => count( $all_slugs ),
			'scanned_modules'         => count( $index ),
			'input_modules'           => 0,
			'profile_matched_modules' => 0,
			'backend_supported'       => 0,
			'frontend_only'           => 0,
			'status_counts'           => array(
				'profile_core'     => 0,
				'profile_optional' => 0,
				'tool_only'        => 0,
				'disabled'         => 0,
			),
			'last_scan_at'            => '',
			'no_input_modules'        => 0,
			'row_count'               => self::table_exists() ? (int) $wpdb->get_var( "SELECT COUNT(*) FROM {$table_name}" ) : 0,
		);

		foreach ( $index as $item ) {
			if ( ! empty( $item['total_fields'] ) ) {
				$summary['input_modules']++;
			}
			if ( ! empty( $item['matched_fields'] ) ) {
				$summary['profile_matched_modules']++;
			}
			if ( ! empty( $item['backend_supported'] ) ) {
				$summary['backend_supported']++;
			}
			if ( empty( $item['backend_supported'] ) && ! empty( $item['frontend_supported'] ) ) {
				$summary['frontend_only']++;
			}
			if ( ! empty( $item['no_inputs_detected'] ) ) {
				$summary['no_input_modules']++;
			}

			$status = (string) ( $item['suggested_profile_status'] ?? 'tool_only' );
			if ( isset( $summary['status_counts'][ $status ] ) ) {
				$summary['status_counts'][ $status ]++;
			}

			if ( ! empty( $item['updated_at'] ) && ( '' === $summary['last_scan_at'] || $item['updated_at'] > $summary['last_scan_at'] ) ) {
				$summary['last_scan_at'] = $item['updated_at'];
			}
		}

		update_option( self::SUMMARY_OPTION, $summary, false );

		return $summary;
	}

	private static function get_admin_rows( $args ) {
		global $wpdb;

		$table_name = self::get_table_name();
		$where      = array( '1=1' );
		$params     = array();

		if ( $args['search'] ) {
			$like    = '%' . $wpdb->esc_like( $args['search'] ) . '%';
			$where[] = '(module_slug LIKE %s OR module_title LIKE %s OR field_label LIKE %s OR module_input_name LIKE %s OR category LIKE %s)';
			$params  = array_merge( $params, array( $like, $like, $like, $like, $like ) );
		}
		if ( $args['profile_field'] ) {
			$where[] = 'profile_field = %s';
			$params[] = $args['profile_field'];
		}
		if ( $args['section'] ) {
			$where[] = 'section = %s';
			$params[] = $args['section'];
		}
		if ( $args['suggested_profile_status'] ) {
			$where[] = 'suggested_profile_status = %s';
			$params[] = $args['suggested_profile_status'];
		}
		if ( '' !== $args['backend_supported'] ) {
			$where[] = 'backend_supported = %d';
			$params[] = (int) $args['backend_supported'];
		}
		if ( 'low' === $args['confidence_bucket'] ) {
			$where[] = 'confidence < %f';
			$params[] = 0.60;
		}
		if ( 'known' === $args['confidence_bucket'] ) {
			$where[] = 'profile_field != %s';
			$params[] = 'unknown';
		}
		if ( '' !== $args['custom_field_only'] ) {
			$where[] = 'is_custom_field = %d';
			$params[] = (int) $args['custom_field_only'];
		}

		$where_sql = implode( ' AND ', $where );
		$count_sql = "SELECT COUNT(*) FROM {$table_name} WHERE {$where_sql}";
		$data_sql  = "SELECT * FROM {$table_name} WHERE {$where_sql} ORDER BY suggested_profile_status ASC, section ASC, module_slug ASC, confidence DESC";

		if ( ! empty( $params ) ) {
			$count_sql = $wpdb->prepare( $count_sql, $params );
			$data_sql  = $wpdb->prepare( $data_sql, $params );
		}

		$total    = (int) $wpdb->get_var( $count_sql );
		$page_num = max( 1, (int) $args['page_num'] );
		$per_page = min( 500, max( 20, (int) $args['per_page'] ) );
		$offset   = ( $page_num - 1 ) * $per_page;

		$data_sql .= $wpdb->prepare( ' LIMIT %d OFFSET %d', $per_page, $offset );
		$rows      = $wpdb->get_results( $data_sql, ARRAY_A );

		return array(
			'items'       => $rows,
			'total_items' => $total,
			'page_num'    => $page_num,
			'per_page'    => $per_page,
			'total_pages' => max( 1, (int) ceil( $total / $per_page ) ),
		);
	}

	private static function get_no_input_modules( $args ) {
		$modules = array();
		foreach ( self::get_module_index() as $item ) {
			if ( empty( $item['no_inputs_detected'] ) ) {
				continue;
			}

			if ( $args['search'] ) {
				$haystack = strtolower( $item['slug'] . ' ' . $item['title'] . ' ' . $item['category'] );
				$needle   = strtolower( $args['search'] );
				if ( false === strpos( $haystack, $needle ) ) {
					continue;
				}
			}
			if ( $args['section'] && $args['section'] !== ( $item['section'] ?? '' ) ) {
				continue;
			}
			if ( $args['suggested_profile_status'] && $args['suggested_profile_status'] !== ( $item['suggested_profile_status'] ?? '' ) ) {
				continue;
			}
			if ( '' !== $args['backend_supported'] && (int) $args['backend_supported'] !== (int) ( $item['backend_supported'] ?? 0 ) ) {
				continue;
			}

			$modules[] = $item;
		}

		usort(
			$modules,
			static function ( $a, $b ) {
				return strnatcasecmp( $a['slug'], $b['slug'] );
			}
		);

		return $modules;
	}

	private static function get_filter_options() {
		global $wpdb;

		$table_name = self::get_table_name();

		return array(
			'profile_fields' => $wpdb->get_col( "SELECT DISTINCT profile_field FROM {$table_name} ORDER BY profile_field ASC" ),
			'sections'       => $wpdb->get_col( "SELECT DISTINCT section FROM {$table_name} WHERE section != '' ORDER BY section ASC" ),
			'statuses'       => $wpdb->get_col( "SELECT DISTINCT suggested_profile_status FROM {$table_name} ORDER BY suggested_profile_status ASC" ),
			'field_groups'   => $wpdb->get_col( "SELECT DISTINCT field_group FROM {$table_name} WHERE field_group IS NOT NULL AND field_group != '' ORDER BY field_group ASC" ),
		);
	}

	private static function get_profile_field_counts() {
		global $wpdb;

		$table_name = self::get_table_name();
		$rows       = $wpdb->get_results(
			"SELECT profile_field, COUNT(DISTINCT module_slug) AS module_count
			 FROM {$table_name}
			 WHERE profile_field != 'unknown'
			 GROUP BY profile_field
			 ORDER BY module_count DESC, profile_field ASC",
			ARRAY_A
		);

		return is_array( $rows ) ? $rows : array();
	}

	private static function migrate_legacy_sensitive_column() {
		global $wpdb;

		if ( ! self::table_exists() ) {
			return;
		}

		$table_name = self::get_table_name();
		$columns    = $wpdb->get_col( "SHOW COLUMNS FROM `{$table_name}`", 0 );

		if ( in_array( 'sensitive', $columns, true ) && ! in_array( 'is_sensitive', $columns, true ) ) {
			$wpdb->query( "ALTER TABLE `{$table_name}` CHANGE `sensitive` `is_sensitive` TINYINT(1) DEFAULT 0" );
		}
	}

	private static function sync_custom_field_rows( $field_key, $field ) {
		global $wpdb;

		$table_name = self::get_table_name();

		$wpdb->update(
			$table_name,
			array(
				'profile_field'       => $field_key,
				'field_group'         => (string) ( $field['field_group'] ?? 'custom' ),
				'admin_review_status' => (string) ( $field['admin_review_status'] ?? 'approved' ),
				'is_custom_field'     => 1,
				'updated_at'          => current_time( 'mysql' ),
			),
			array( 'detected_field_key' => $field_key ),
			array( '%s', '%s', '%s', '%d', '%s' ),
			array( '%s' )
		);
	}

	private static function detect_category( $slug, $title, $meta ) {
		if ( ! empty( $meta['category'] ) && is_string( $meta['category'] ) ) {
			return (string) $meta['category'];
		}

		$map = array(
			'Astroloji'             => array( 'burc', 'yukselen', 'gezegen', 'astroloji', 'ev-hesaplama' ),
			'Numeroloji'            => array( 'numeroloji', 'yasam-yolu', 'melek', 'cakra', 'sansli' ),
			'Sağlık'                => array( 'vucut', 'kilo', 'bmi', 'uyku', 'metabolizma', 'kalori' ),
			'Spor'                  => array( 'spor', 'adim', 'kosu', 'yuruyus', 'bisiklet', 'protein' ),
			'Otomotiv'              => array( 'arac', 'otomotiv', '0-100', 'beygir', 'cekis', 'drivetrain', 'motor', 'tork' ),
			'Finans'                => array( 'kredi', 'faiz', 'vergi', 'butce', 'mevduat', 'komisyon' ),
			'Eğitim'                => array( 'sinav', 'puan', 'not', 'tyt', 'ayt', 'ales' ),
			'Mühendislik ve Teknik' => array( 'elektrik', 'kablo', 'akim', 'volt', 'beton', 'boru', 'fizik', 'kimya' ),
			'Genel Araçlar'         => array(),
		);

		$source = strtolower( function_exists( 'remove_accents' ) ? remove_accents( $slug . ' ' . $title ) : $slug . ' ' . $title );

		foreach ( $map as $label => $keywords ) {
			foreach ( $keywords as $keyword ) {
				if ( false !== strpos( $source, $keyword ) ) {
					return $label;
				}
			}
		}

		return 'Genel Araçlar';
	}

	private static function rows_have_sensitive_fields( $fields ) {
		foreach ( $fields as $field ) {
			if ( ! empty( $field['is_sensitive'] ) ) {
				return true;
			}
		}

		return false;
	}

	private static function filter_required_rows( $row ) {
		return ! empty( $row['required'] ) && 'unknown' !== ( $row['profile_field'] ?? '' );
	}

	private static function filter_optional_rows( $row ) {
		return empty( $row['required'] ) && 'unknown' !== ( $row['profile_field'] ?? '' );
	}

	private static function filter_known_profile_field( $profile_field ) {
		return ! empty( $profile_field ) && 'unknown' !== $profile_field;
	}

	private static function filter_low_confidence_rows( $row ) {
		return (float) ( $row['confidence'] ?? 0 ) < 0.60;
	}

	private static function humanize_slug( $slug ) {
		$slug = str_replace( array( '_', '-' ), ' ', (string) $slug );
		$slug = preg_replace( '/\s+/', ' ', $slug );
		$slug = trim( (string) $slug );

		return ucwords( $slug );
	}

	private static function detect_unit_from_text( $text ) {
		$text = strtolower( function_exists( 'remove_accents' ) ? remove_accents( (string) $text ) : (string) $text );

		foreach ( array( 'kg', 'cm', 'm2', 'm3', 'lt', 'l', 'tl', 'km', 'saat', 'dakika', 'gun' ) as $unit ) {
			if ( false !== strpos( $text, $unit ) ) {
				return $unit;
			}
		}

		if ( false !== strpos( $text, '%' ) ) {
			return '%';
		}

		return '';
	}

	private static function infer_name_from_dom_id( $id ) {
		$id = strtolower( (string) $id );
		$id = str_replace( array( '[', ']' ), '_', $id );
		$id = preg_replace( '/[^a-z0-9_-]+/', '_', $id );
		$id = trim( (string) $id, '_' );

		if ( '' === $id ) {
			return '';
		}

		$parts = array_values( array_filter( explode( '-', $id ) ) );
		if ( count( $parts ) >= 2 && 'hc' === $parts[0] ) {
			array_shift( $parts );
		}

		if ( count( $parts ) >= 2 ) {
			$tail = array_slice( $parts, -2 );
			return HC_Profile_Field_Dictionary::normalize_input_name( implode( '_', $tail ) );
		}

		return HC_Profile_Field_Dictionary::normalize_input_name( implode( '_', $parts ) );
	}

	private static function should_ignore_js_dom_id( $id ) {
		$id        = strtolower( (string) $id );
		$blacklist = array( 'result', 'sonuc', 'ozet', 'badge', 'pointer', 'meter', 'bar', 'cat', 'yorum', 'subtitle', 'list', 'table', 'card', 'output', 'value', 'val', 'hero', 'detail' );

		foreach ( $blacklist as $word ) {
			if ( false !== strpos( $id, $word ) ) {
				return true;
			}
		}

		return false;
	}

	private static function extract_inputs_from_php_regex( $content ) {
		$rows = array();
		if ( preg_match_all( '/<(input|select|textarea)\b([^>]*)>/i', $content, $matches, PREG_OFFSET_CAPTURE ) ) {
			foreach ( $matches[1] as $index => $tag_match ) {
				$tag   = strtolower( $tag_match[0] );
				$attrs = $matches[2][ $index ][0];

				if ( ! preg_match( '/\b(?:name|id)\s*=\s*["\']([^"\']+)["\']/i', $attrs, $name_match ) ) {
					continue;
				}

				$type = 'input' === $tag && preg_match( '/\btype\s*=\s*["\']([^"\']+)["\']/i', $attrs, $type_match ) ? strtolower( $type_match[1] ) : $tag;
				if ( in_array( $type, array( 'hidden', 'submit', 'button', 'reset' ), true ) ) {
					continue;
				}

				$offset = $matches[0][ $index ][1];
				$before = substr( $content, max( 0, $offset - 300 ), 300 );
				$label  = '';

				if ( preg_match_all( '/<label\b[^>]*>(.*?)<\/label>/is', $before, $label_matches ) ) {
					$label = trim( wp_strip_all_tags( end( $label_matches[1] ) ) );
				}

				$placeholder = preg_match( '/\bplaceholder\s*=\s*["\']([^"\']+)["\']/i', $attrs, $placeholder_match ) ? $placeholder_match[1] : '';

				$rows[] = array(
					'module_input_name' => $name_match[1],
					'field_label'       => $label ? $label : $placeholder,
					'field_type'        => $type,
					'field_unit'        => self::detect_unit_from_text( $label . ' ' . $placeholder ),
					'required'          => false !== stripos( $attrs, 'required' ) ? 1 : 1,
					'options'           => array(),
					'source'            => 'calculator_php_regex',
					'confidence'        => 0.80,
				);
			}
		}

		return $rows;
	}

	private static function resolve_dom_label( DOMNode $node, DOMXPath $xpath ) {
		$id = trim( $node->attributes && $node->attributes->getNamedItem( 'id' ) ? $node->attributes->getNamedItem( 'id' )->nodeValue : '' );

		if ( $id ) {
			$labels = $xpath->query( '//label[@for="' . str_replace( array( '"', "'" ), '', $id ) . '"]' );
			if ( $labels && $labels->length > 0 ) {
				return trim( wp_strip_all_tags( $labels->item( 0 )->textContent ) );
			}
		}

		$parent = $node->parentNode;
		while ( $parent instanceof DOMNode ) {
			if ( $parent instanceof DOMElement ) {
				$labels = $xpath->query( './/label', $parent );
				if ( $labels && $labels->length > 0 ) {
					return trim( wp_strip_all_tags( $labels->item( 0 )->textContent ) );
				}
			}
			$parent = $parent->parentNode;
		}

		$placeholder = $node->attributes && $node->attributes->getNamedItem( 'placeholder' ) ? $node->attributes->getNamedItem( 'placeholder' )->nodeValue : '';

		return trim( wp_strip_all_tags( (string) $placeholder ) );
	}
}
