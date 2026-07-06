<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HC_Calculator_Loader {

	// shortcode_tag => dosya yolu — render sırasında require edilir
	private $shortcode_map = [];

	// Bu request'te lazy mod aktif mi?
	private $lazy_mode = false;

	// Bu request'te register edilen hc_* tag sayısı (debug için)
	private $lazy_registered_count = 0;

	// Modül kayıt defteri verisi
	private $module_registry = null;

	public function __construct() {
		$this->lazy_mode = $this->should_use_lazy_mode();

		if ( $this->lazy_mode ) {
			// Frontend: WP sorgusu hazır olunca sadece gerekli shortcode'ları register et
			add_action( 'wp', [ $this, 'register_shortcodes_for_current_post' ], 1 );
		} else {
			// Admin / AJAX / cron / REST / CLI: tüm modülleri register et (eski davranış)
			add_action( 'init', [ $this, 'register_shortcodes' ] );
		}

		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_assets' ] );

		// Debug shortcode — sadece yöneticilere gösterilir
		add_shortcode( 'hc_lazy_debug', [ $this, 'render_debug_shortcode' ] );
	}

	// ── Registry Yükleyici ───────────────────────────────────────────────

	private function load_module_registry() {
		if ( $this->module_registry !== null ) {
			return $this->module_registry;
		}

		$file = HC_PLUGIN_DIR . 'assets/data/module-registry.json';
		if ( ! file_exists( $file ) ) {
			$this->module_registry = [];
			if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
				error_log( 'HC Warning: module-registry.json bulunamadı! Geriye uyumlu mod aktif.' );
			}
			return $this->module_registry;
		}

		$content = file_get_contents( $file );
		$data = json_decode( $content, true );
		if ( ! is_array( $data ) || ! isset( $data['modules'] ) || ! is_array( $data['modules'] ) ) {
			$this->module_registry = [];
			if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
				error_log( 'HC Warning: module-registry.json bozuk veya boş! Geriye uyumlu mod aktif.' );
			}
			return $this->module_registry;
		}

		$this->module_registry = [];
		foreach ( $data['modules'] as $module ) {
			if ( isset( $module['module_slug'] ) ) {
				$this->module_registry[ $module['module_slug'] ] = $module;
			}
		}

		return $this->module_registry;
	}

	// ── Lazy mod kararı ─────────────────────────────────────────────────

	private function should_use_lazy_mode() {
		// Admin, AJAX, cron bağlamlarında tam mod
		if ( is_admin() )      return false;
		if ( wp_doing_ajax() ) return false;
		if ( wp_doing_cron() ) return false;

		// REST API bağlamında tam mod
		if ( defined( 'REST_REQUEST' ) && REST_REQUEST ) return false;

		// WP-CLI bağlamında tam mod
		if ( defined( 'WP_CLI' ) && WP_CLI ) return false;

		// Option ile kapatılabilir — varsayılan: aktif (1)
		return (bool) get_option( 'hc_lazy_shortcode_registration', 1 );
	}

	// ── Tam kayıt (admin / AJAX / cron / REST / CLI) ─────────────────────

	public function register_shortcodes() {
		$modules_dir = HC_PLUGIN_DIR . 'modules/';
		if ( ! is_dir( $modules_dir ) ) return;

		$loaded_module_keys  = [];
		$loaded_render_names = [];
		$registry = $this->load_module_registry();

		foreach ( glob( $modules_dir . '*', GLOB_ONLYDIR ) as $module_path ) {
			if ( $this->should_skip_module_directory( $module_path ) ) {
				continue;
			}

			$slug           = basename( $module_path );
			$normalized_key = $this->normalize_module_key( $slug );
			$file           = $module_path . '/calculator.php';
			$render_name    = $this->extract_render_function_name( $file );

			if ( isset( $loaded_module_keys[ $normalized_key ] ) ) {
				error_log( sprintf( 'HC duplicate module skipped: %s (duplicate of %s)', $slug, $loaded_module_keys[ $normalized_key ] ) );
				continue;
			}

			if ( $render_name && isset( $loaded_render_names[ $render_name ] ) ) {
				error_log( sprintf( 'HC duplicate render function skipped: %s (%s already provided by %s)', $slug, $render_name, $loaded_render_names[ $render_name ] ) );
				continue;
			}

			// Geriye uyumluluk uyarısı: registry'de yoksa uyar ama yükle
			if ( ! isset( $registry[ $slug ] ) ) {
				if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
					error_log( sprintf( 'HC Registry Warning: "%s" modülü module-registry.json dosyasında kayıtlı değil!', $slug ) );
				}
			}

			if ( file_exists( $file ) ) {
				$first_bytes = file_get_contents( $file, false, null, 0, 100 );
				if ( false !== strpos( $first_bytes, '<?php' ) ) {
					$loaded_module_keys[ $normalized_key ] = $slug;
					if ( $render_name ) {
						$loaded_render_names[ $render_name ] = $slug;
					}
					$tag = 'hc_' . str_replace( '-', '_', $slug );
					$this->shortcode_map[ $tag ] = $file;
					add_shortcode( $tag, [ $this, 'render_shortcode' ] );
				}
			}
		}
	}

	// ── Lazy kayıt (frontend) ────────────────────────────────────────────

	/**
	 * 'wp' hook'unda çalışır — WP sorgusu hazır, template henüz yüklenmedi.
	 * Mevcut post içeriğindeki hc_* shortcode tag'lerini tarar ve yalnızca
	 * bulunanları register eder. 2672 add_shortcode() yerine genellikle 1-3.
	 */
	public function register_shortcodes_for_current_post() {
		// Tekil sayfa/yazı dışında (arşiv, ana sayfa, arama) hc_* render edilmez
		if ( ! is_singular() ) {
			return;
		}

		global $post;
		if ( ! $post instanceof WP_Post || '' === $post->post_content ) {
			return;
		}

		$tags = $this->extract_hc_tags_from_content( $post->post_content );
		if ( empty( $tags ) ) {
			return;
		}

		$modules_dir = HC_PLUGIN_DIR . 'modules/';
		foreach ( $tags as $tag ) {
			$this->maybe_register_single_tag( $tag, $modules_dir );
		}
	}

	/**
	 * Tek bir hc_* tag'ini register eder.
	 * Tag adından modül slug'ını ve dosya yolunu doğrudan hesaplar.
	 */
	private function maybe_register_single_tag( $tag, $modules_dir ) {
		if ( isset( $this->shortcode_map[ $tag ] ) ) {
			return; // zaten register edilmiş
		}

		// hc_foo_bar_hesaplama → foo-bar-hesaplama (modül dizin adı)
		$slug = str_replace( '_', '-', substr( $tag, 3 ) );
		$file = $modules_dir . $slug . '/calculator.php';

		if ( ! file_exists( $file ) ) {
			return;
		}

		$registry = $this->load_module_registry();
		if ( ! isset( $registry[ $slug ] ) ) {
			if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
				error_log( sprintf( 'HC Registry Warning: "%s" modülü module-registry.json dosyasında kayıtlı değil!', $slug ) );
			}
		}

		$this->shortcode_map[ $tag ] = $file;
		add_shortcode( $tag, [ $this, 'render_shortcode' ] );
		$this->lazy_registered_count++;
	}

	/**
	 * Post içeriğinden tüm benzersiz hc_* shortcode tag adlarını çıkarır.
	 */
	private function extract_hc_tags_from_content( $content ) {
		if ( ! preg_match_all( '/\[(hc_[a-zA-Z0-9_]+)/', $content, $matches ) ) {
			return [];
		}
		return array_unique( $matches[1] );
	}

	// ── Render (değişmedi) ───────────────────────────────────────────────

	public function render_shortcode( $atts, $content, $tag ) {
		// Lazy load: calculator.php sadece bu shortcode render edilirken yüklenir
		if ( isset( $this->shortcode_map[ $tag ] ) ) {
			$level = ob_get_level();
			try {
				require_once $this->shortcode_map[ $tag ];
			} catch ( Throwable $e ) {
				while ( ob_get_level() > $level ) {
					ob_end_clean();
				}
				error_log( 'HC loader error [' . $tag . ']: ' . $e->getMessage() );
				return '<!-- HC modül yüklenemedi: ' . esc_html( $tag ) . ' -->';
			}
		}

		$slug     = str_replace( [ 'hc_', '_' ], [ '', '-' ], $tag );
		$function = 'hc_render_' . str_replace( '-', '_', $slug );

		if ( function_exists( $function ) ) {
			$level = ob_get_level();
			try {
				ob_start();
				$result = $function( $atts );
				$output = ob_get_clean();

				$html = '';
				if ( is_string( $result ) && '' !== $result ) {
					$html = $output . $result;
				} else {
					$html = $output;
				}

				// Otomatik disclaimer placeholder yerleştirme (Registry onaylıysa)
				$registry = $this->load_module_registry();
				if ( isset( $registry[ $slug ] ) ) {
					$meta = $registry[ $slug ];
					if ( ! empty( $meta['requires_disclaimer'] ) && ! empty( $meta['disclaimer_type'] ) ) {
						$html .= sprintf(
							'<div class="hc-disclaimer-box" data-hc-disclaimer-type="%s"></div>',
							esc_attr( $meta['disclaimer_type'] )
						);
					}
				}

				return $html;
			} catch ( Throwable $e ) {
				while ( ob_get_level() > $level ) {
					ob_end_clean();
				}
				error_log( 'HC render error [' . $tag . ']: ' . $e->getMessage() );
				return '<!-- HC render hatası: ' . esc_html( $tag ) . ' -->';
			}
		}

		return '<!-- Hesap makinesi bulunamadı: ' . esc_html( $slug ) . ' -->';
	}

	// ── Assets (değişmedi) ───────────────────────────────────────────────

	public function enqueue_assets() {
		global $post;
		if ( ! $post ) return;

		// Sadece shortcode kullanan sayfalarda yükle
		if ( has_shortcode( $post->post_content, 'hc_' ) || $this->page_has_hc_shortcode( $post->post_content ) ) {
			wp_enqueue_style(
				'hesaplama-suite',
				HC_PLUGIN_URL . 'assets/style.css',
				[],
				HC_VERSION
			);
			wp_enqueue_style(
				'hesaplama-suite-result-template',
				HC_PLUGIN_URL . 'assets/result-template.css',
				[ 'hesaplama-suite' ],
				HC_VERSION
			);
			wp_enqueue_script(
				'hesaplama-suite',
				HC_PLUGIN_URL . 'assets/main.js',
				[],
				HC_VERSION,
				true
			);

			// Katsayı sözlüğü, template, registry, sources ve disclaimer verileri
			$dict_file = HC_PLUGIN_DIR . 'assets/data/formula-dictionary.json';
			$disc_file = HC_PLUGIN_DIR . 'assets/data/category-disclaimers.json';
			$tpl_file  = HC_PLUGIN_DIR . 'assets/data/result-template-registry.json';
			$src_file  = HC_PLUGIN_DIR . 'assets/data/source-registry.json';

			$dict_data = file_exists( $dict_file ) ? json_decode( file_get_contents( $dict_file ), true ) : [];
			$disc_data = file_exists( $disc_file ) ? json_decode( file_get_contents( $disc_file ), true ) : [];
			$tpl_data  = file_exists( $tpl_file ) ? json_decode( file_get_contents( $tpl_file ), true ) : [];
			$src_data  = file_exists( $src_file ) ? json_decode( file_get_contents( $src_file ), true ) : [];

			$client_dict = [];
			if ( is_array( $dict_data ) ) {
				foreach ( $dict_data as $cat => $items ) {
					if ( is_array( $items ) ) {
						foreach ( $items as $item ) {
							if ( isset( $item['key'] ) && isset( $item['value'] ) ) {
								$client_dict[ $item['key'] ] = $item['value'];
							}
						}
					}
				}
			}

			$client_disclaimers = isset( $disc_data['disclaimers'] ) ? $disc_data['disclaimers'] : [];
			$client_tpl         = isset( $tpl_data['templates'] ) ? $tpl_data['templates'] : [];
			$client_src         = isset( $src_data['sources'] ) ? $src_data['sources'] : [];
			$client_reg         = $this->load_module_registry();

			$content_reg_file = HC_PLUGIN_DIR . 'assets/data/result-content-registry.json';
			$client_content   = [];
			if ( file_exists( $content_reg_file ) ) {
				$content_reg_data = json_decode( file_get_contents( $content_reg_file ), true );
				if ( is_array( $content_reg_data ) && isset( $content_reg_data['modules'] ) ) {
					$client_content = $content_reg_data['modules'];
				}
			}

			$central_data = [
				'dictionary'  => $client_dict,
				'disclaimers' => $client_disclaimers,
				'templates'   => $client_tpl,
				'sources'     => $client_src,
				'registry'    => $client_reg,
				'content'     => $client_content,
			];

			$inline_js  = 'window.hcCentralData = ' . json_encode( $central_data, JSON_UNESCAPED_UNICODE ) . ';';
			$inline_js .= 'window.hcRegistry = ' . json_encode( $client_reg, JSON_UNESCAPED_UNICODE ) . ';';
			$inline_js .= 'window.hcTemplates = ' . json_encode( $client_tpl, JSON_UNESCAPED_UNICODE ) . ';';
			$inline_js .= 'window.hcSources = ' . json_encode( $client_src, JSON_UNESCAPED_UNICODE ) . ';';
			$inline_js .= 'window.hcDisclaimers = ' . json_encode( $client_disclaimers, JSON_UNESCAPED_UNICODE ) . ';';
			$inline_js .= 'window.hcContentRegistry = ' . json_encode( $client_content, JSON_UNESCAPED_UNICODE ) . ';';
			$inline_js .= 'window.hcConfig = { "resultEngineEnabled": true };';

			wp_add_inline_script( 'hesaplama-suite', $inline_js, 'before' );
		}
	}

	// ── Debug shortcode ──────────────────────────────────────────────────

	public function render_debug_shortcode( $atts ) {
		if ( ! current_user_can( 'manage_options' ) ) {
			return '';
		}

		global $shortcode_tags;
		$all_count = count( $shortcode_tags );
		$hc_keys   = array_filter( array_keys( $shortcode_tags ), static function ( $k ) {
			return 0 === strpos( $k, 'hc_' ) && 'hc_lazy_debug' !== $k;
		} );
		$hc_count  = count( $hc_keys );

		$lines = [
			'HC Lazy Debug',
			'─────────────────────────────────',
			'Lazy mode         : ' . ( $this->lazy_mode ? 'ON' : 'OFF' ),
			'Option value      : ' . ( (bool) get_option( 'hc_lazy_shortcode_registration', 1 ) ? '1 (aktif)' : '0 (kapalı)' ),
			'Total shortcodes  : ' . $all_count,
			'hc_* registered   : ' . $hc_count,
			'Lazy-registered   : ' . $this->lazy_registered_count,
			'─────────────────────────────────',
		];

		if ( $hc_count > 0 && $hc_count <= 20 ) {
			$lines[] = 'hc_* tags: ' . implode( ', ', $hc_keys );
		}

		return '<pre style="background:#f6f8fb;border:1px solid #e2e8f0;padding:16px;border-radius:8px;font-size:13px;line-height:1.6;overflow:auto">'
			. esc_html( implode( "\n", $lines ) )
			. '</pre>';
	}

	// ── Yardımcılar (değişmedi) ──────────────────────────────────────────

	private function page_has_hc_shortcode( $content ) {
		return preg_match( '/\[hc_[a-z0-9_]+/', $content );
	}

	private function normalize_module_key( $slug ) {
		$slug = remove_accents( wp_strip_all_tags( (string) $slug ) );
		$slug = function_exists( 'mb_strtolower' ) ? mb_strtolower( $slug, 'UTF-8' ) : strtolower( $slug );
		$slug = str_replace( [ '_', '-' ], ' ', $slug );
		$slug = preg_replace( '/[^\p{L}\p{N}]+/u', ' ', $slug );

		return trim( preg_replace( '/\s+/', ' ', $slug ) );
	}

	private function should_skip_module_directory( $module_path ) {
		$slug = basename( (string) $module_path );
		$slug = function_exists( 'mb_strtolower' ) ? mb_strtolower( $slug, 'UTF-8' ) : strtolower( $slug );

		return false !== strpos( $slug, '.disabled' ) || false !== strpos( $slug, '.off' );
	}

	private function extract_render_function_name( $file ) {
		if ( ! file_exists( $file ) ) {
			return '';
		}

		$contents = file_get_contents( $file );
		if ( false === $contents ) {
			return '';
		}

		if ( ! preg_match( '/function\s+(hc_render_[a-z0-9_]+)\s*\(/i', $contents, $matches ) ) {
			return '';
		}

		return strtolower( $matches[1] );
	}
}
