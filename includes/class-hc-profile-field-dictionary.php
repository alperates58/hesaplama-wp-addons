<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class HC_Profile_Field_Dictionary {

	const CUSTOM_OPTION = 'hc_profile_field_dictionary_custom_v1';

	public static function get_default_fields() {
		return array(
			'nickname'           => array(
				'label'     => 'Takma Ad',
				'type'      => 'text',
				'aliases'   => array( 'nickname', 'takma_ad', 'rumuz', 'nick' ),
				'unit'      => '',
				'sensitive' => false,
				'ai_useful' => true,
			),
			'first_name'         => array(
				'label'     => 'Ad',
				'type'      => 'text',
				'aliases'   => array( 'ad', 'isim', 'first_name', 'name' ),
				'unit'      => '',
				'sensitive' => false,
				'ai_useful' => true,
			),
			'last_name'          => array(
				'label'     => 'Soyad',
				'type'      => 'text',
				'aliases'   => array( 'soyad', 'soyisim', 'last_name', 'surname' ),
				'unit'      => '',
				'sensitive' => false,
				'ai_useful' => true,
			),
			'birth_date'         => array(
				'label'     => 'Doğum Tarihi',
				'type'      => 'date',
				'aliases'   => array( 'dogum_tarihi', 'doğum_tarihi', 'dogumtarihi', 'birthdate', 'birth_date', 'tarih', 'date' ),
				'unit'      => '',
				'sensitive' => true,
				'ai_useful' => true,
			),
			'birth_time'         => array(
				'label'     => 'Doğum Saati',
				'type'      => 'time',
				'aliases'   => array( 'dogum_saati', 'doğum_saati', 'saat', 'birth_time', 'time' ),
				'unit'      => '',
				'sensitive' => true,
				'ai_useful' => true,
			),
			'birth_place'        => array(
				'label'     => 'Doğum Yeri',
				'type'      => 'text',
				'aliases'   => array( 'dogum_yeri', 'doğum_yeri', 'dogum_ili', 'sehir', 'şehir', 'city', 'place', 'location' ),
				'unit'      => '',
				'sensitive' => true,
				'ai_useful' => true,
			),
			'gender'             => array(
				'label'     => 'Cinsiyet',
				'type'      => 'select',
				'aliases'   => array( 'cinsiyet', 'gender', 'sex' ),
				'unit'      => '',
				'sensitive' => true,
				'ai_useful' => true,
			),
			'city'               => array(
				'label'     => 'Şehir',
				'type'      => 'text',
				'aliases'   => array( 'sehir', 'şehir', 'city', 'yasadigi_sehir', 'ikamet_sehri' ),
				'unit'      => '',
				'sensitive' => false,
				'ai_useful' => true,
			),
			'height'             => array(
				'label'     => 'Boy',
				'type'      => 'number',
				'aliases'   => array( 'boy', 'boy_cm', 'height', 'height_cm', 'uzunluk' ),
				'unit'      => 'cm',
				'sensitive' => false,
				'ai_useful' => true,
			),
			'weight'             => array(
				'label'     => 'Kilo',
				'type'      => 'number',
				'aliases'   => array( 'kilo', 'agirlik', 'ağırlık', 'weight', 'weight_kg' ),
				'unit'      => 'kg',
				'sensitive' => false,
				'ai_useful' => true,
			),
			'activity_level'     => array(
				'label'     => 'Aktivite Düzeyi',
				'type'      => 'select',
				'aliases'   => array( 'aktivite', 'aktivite_duzeyi', 'hareket', 'activity', 'activity_level' ),
				'unit'      => '',
				'sensitive' => false,
				'ai_useful' => true,
			),
			'sleep_hours'        => array(
				'label'     => 'Uyku Süresi',
				'type'      => 'number',
				'aliases'   => array( 'uyku', 'uyku_suresi', 'sleep', 'sleep_hours' ),
				'unit'      => 'saat',
				'sensitive' => false,
				'ai_useful' => true,
			),
			'daily_steps'        => array(
				'label'     => 'Günlük Adım',
				'type'      => 'number',
				'aliases'   => array( 'adim', 'adım', 'gunluk_adim', 'günlük_adım', 'steps', 'daily_steps' ),
				'unit'      => 'adım',
				'sensitive' => false,
				'ai_useful' => true,
			),
			'relationship_status' => array(
				'label'     => 'İlişki Durumu',
				'type'      => 'select',
				'aliases'   => array( 'iliski_durumu', 'ilişki_durumu', 'relationship_status', 'medeni_hal' ),
				'unit'      => '',
				'sensitive' => false,
				'ai_useful' => true,
			),
			'partner_birth_date' => array(
				'label'     => 'Partner Doğum Tarihi',
				'type'      => 'date',
				'aliases'   => array( 'partner_dogum_tarihi', 'es_dogum_tarihi', 'sevgili_dogum_tarihi', 'partner_birth_date' ),
				'unit'      => '',
				'sensitive' => true,
				'ai_useful' => true,
			),
			'home_number'        => array(
				'label'     => 'Ev Numarası',
				'type'      => 'text',
				'aliases'   => array( 'ev_numarasi', 'ev_no', 'home_number' ),
				'unit'      => '',
				'sensitive' => false,
				'ai_useful' => true,
			),
			'phone_number'       => array(
				'label'     => 'Telefon Numarası',
				'type'      => 'tel',
				'aliases'   => array( 'telefon', 'telefon_numarasi', 'phone', 'phone_number' ),
				'unit'      => '',
				'sensitive' => true,
				'ai_useful' => false,
			),
			'plate_number'       => array(
				'label'     => 'Plaka',
				'type'      => 'text',
				'aliases'   => array( 'plaka', 'plate', 'plate_number' ),
				'unit'      => '',
				'sensitive' => false,
				'ai_useful' => true,
			),
			'company_name'       => array(
				'label'     => 'Şirket Adı',
				'type'      => 'text',
				'aliases'   => array( 'sirket', 'şirket', 'sirket_adi', 'company', 'company_name' ),
				'unit'      => '',
				'sensitive' => false,
				'ai_useful' => true,
			),
			'baby_name'          => array(
				'label'     => 'Bebek Adı',
				'type'      => 'text',
				'aliases'   => array( 'bebek_adi', 'baby_name' ),
				'unit'      => '',
				'sensitive' => false,
				'ai_useful' => true,
			),
			'career_goal'        => array(
				'label'     => 'Kariyer Hedefi',
				'type'      => 'text',
				'aliases'   => array( 'kariyer', 'meslek', 'hedef', 'career_goal' ),
				'unit'      => '',
				'sensitive' => false,
				'ai_useful' => true,
			),
		);
	}

	public static function get_custom_fields() {
		$fields = get_option( self::CUSTOM_OPTION, array() );
		return is_array( $fields ) ? $fields : array();
	}

	public static function get_fields() {
		return array_merge( self::get_default_fields(), self::get_custom_fields() );
	}

	public static function get_field( $field_key ) {
		$fields = self::get_fields();
		return isset( $fields[ $field_key ] ) ? $fields[ $field_key ] : null;
	}

	public static function get_aliases( $field_key ) {
		$field = self::get_field( $field_key );
		return ! empty( $field['aliases'] ) ? $field['aliases'] : array();
	}

	public static function normalize_input_name( $name ) {
		$name = (string) $name;
		$name = function_exists( 'remove_accents' ) ? remove_accents( $name ) : $name;
		$name = strtolower( $name );
		$name = preg_replace( '/[^a-z0-9]+/i', '_', $name );
		$name = trim( (string) $name, '_' );

		return $name;
	}

	public static function detect_profile_field( $input_name, $label = '', $context = '' ) {
		$match = self::match_profile_field( $input_name, $label, $context );
		return $match['profile_field'];
	}

	public static function match_profile_field( $input_name, $label = '', $context = '' ) {
		$input_name = self::normalize_input_name( $input_name );
		$label      = self::normalize_input_name( $label );
		$context    = self::normalize_input_name( $context );
		$haystack   = trim( implode( ' ', array_filter( array( $input_name, $label, $context ) ) ) );

		$best = array(
			'profile_field' => 'unknown',
			'confidence'    => 0.00,
			'matched_alias' => '',
			'match_source'  => 'none',
		);

		foreach ( self::get_fields() as $field_key => $field ) {
			$aliases = array_unique(
				array_filter(
					array_map(
						array( __CLASS__, 'normalize_input_name' ),
						array_merge( array( $field_key ), (array) $field['aliases'] )
					)
				)
			);

			foreach ( $aliases as $alias ) {
				if ( '' === $alias ) {
					continue;
				}

				if ( $input_name && $input_name === $alias ) {
					return array(
						'profile_field' => $field_key,
						'confidence'    => 0.99,
						'matched_alias' => $alias,
						'match_source'  => 'exact_input',
					);
				}

				if ( $label && $label === $alias ) {
					$best = self::pick_better_match( $best, $field_key, 0.95, $alias, 'exact_label' );
					continue;
				}

				if ( $label && preg_match( '/(^|_)' . preg_quote( $alias, '/' ) . '(_|$)/', $label ) ) {
					$best = self::pick_better_match( $best, $field_key, 0.91, $alias, 'label_boundary' );
					continue;
				}

				if ( $label && false !== strpos( $label, $alias ) ) {
					$best = self::pick_better_match( $best, $field_key, 0.88, $alias, 'label_contains' );
					continue;
				}

				if ( $haystack && preg_match( '/(^|_)' . preg_quote( $alias, '/' ) . '(_|$)/', $haystack ) ) {
					$best = self::pick_better_match( $best, $field_key, 0.82, $alias, 'word_boundary' );
					continue;
				}

				if ( $haystack && false !== strpos( $haystack, $alias ) ) {
					$best = self::pick_better_match( $best, $field_key, 0.64, $alias, 'contains' );
				}
			}
		}

		if ( 'unknown' === $best['profile_field'] ) {
			$suggested_key = self::suggest_field_key( $input_name, $label, $context );
			$group         = self::suggest_field_group( $suggested_key, $context );

			return array(
				'profile_field'      => $suggested_key,
				'confidence'         => 0.55,
				'matched_alias'      => '',
				'match_source'       => 'suggested',
				'is_custom_field'    => 1,
				'detected_field_key' => $suggested_key,
				'field_group'        => $group,
				'admin_review_status'=> 'auto',
			);
		}

		$custom_fields = self::get_custom_fields();
		$is_custom     = isset( $custom_fields[ $best['profile_field'] ] );
		$field_group   = '';
		$review_status = 'reviewed';

		if ( $is_custom ) {
			$field_group   = (string) ( $custom_fields[ $best['profile_field'] ]['field_group'] ?? 'custom' );
			$review_status = (string) ( $custom_fields[ $best['profile_field'] ]['admin_review_status'] ?? 'approved' );
		}

		$best['is_custom_field']     = $is_custom ? 1 : 0;
		$best['detected_field_key']  = $best['profile_field'];
		$best['field_group']         = $field_group;
		$best['admin_review_status'] = $is_custom ? $review_status : 'reviewed';

		return $best;
	}

	public static function suggest_field_key( $input_name, $label = '', $context = '' ) {
		$normalized_input = self::normalize_input_name( $input_name );
		$normalized_label = self::normalize_input_name( $label );
		$normalized_ctx   = self::normalize_input_name( $context );
		$haystack         = trim( implode( '_', array_filter( array( $normalized_input, $normalized_label, $normalized_ctx ) ) ) );

		$special_map = array(
			'bel_cevresi'       => 'waist_circumference',
			'waist'             => 'waist_circumference',
			'kalca_cevresi'     => 'hip_circumference',
			'hip'               => 'hip_circumference',
			'gogus_cevresi'     => 'chest_circumference',
			'boyun_cevresi'     => 'neck_circumference',
			'vucut_yag_orani'   => 'body_fat_ratio',
			'vucut_su_orani'    => 'body_water_ratio',
			'hedef_kilo'        => 'target_weight',
			'mevcut_kilo'       => 'current_weight',
			'partner_adi'       => 'partner_name',
			'anne_adi'          => 'mother_name',
			'baba_adi'          => 'father_name',
		);

		foreach ( $special_map as $keyword => $field_key ) {
			if ( false !== strpos( $haystack, $keyword ) ) {
				return $field_key;
			}
		}

		if ( $normalized_input ) {
			return $normalized_input;
		}

		if ( $normalized_label ) {
			return $normalized_label;
		}

		return 'custom_field';
	}

	private static function pick_better_match( $current, $field_key, $confidence, $alias, $source ) {
		if ( $confidence <= (float) $current['confidence'] ) {
			return $current;
		}

		return array(
			'profile_field' => $field_key,
			'confidence'    => (float) $confidence,
			'matched_alias' => $alias,
			'match_source'  => $source,
		);
	}

	public static function suggest_field_group( $field_key, $context = '' ) {
		$source = self::normalize_input_name( $field_key . '_' . $context );
		$map    = array(
			'basic_profile'     => array( 'name', 'ad', 'soyad', 'city', 'sehir', 'nickname' ),
			'health_lifestyle'  => array( 'weight', 'kilo', 'boy', 'height', 'waist', 'hip', 'fat', 'sleep', 'steps', 'adim' ),
			'astrology_details' => array( 'birth', 'dogum', 'moon', 'yukselen', 'gezegen', 'house', 'ev' ),
			'numerology'        => array( 'numerology', 'yasam', 'kisisel', 'sayi' ),
			'relationship'      => array( 'partner', 'iliski', 'uyum', 'es', 'sevgili' ),
			'optional_details'  => array( 'career', 'meslek', 'goal', 'company', 'plate', 'phone' ),
		);

		foreach ( $map as $group => $keywords ) {
			foreach ( $keywords as $keyword ) {
				if ( false !== strpos( $source, $keyword ) ) {
					return $group;
				}
			}
		}

		return 'custom';
	}

	public static function save_custom_fields( $fields ) {
		update_option( self::CUSTOM_OPTION, $fields, false );
	}

	public static function upsert_custom_field( $field_key, $data ) {
		$field_key = self::normalize_input_name( $field_key );
		if ( '' === $field_key ) {
			return false;
		}

		$fields              = self::get_custom_fields();
		$current             = isset( $fields[ $field_key ] ) && is_array( $fields[ $field_key ] ) ? $fields[ $field_key ] : array();
		$fields[ $field_key ] = array_merge(
			array(
				'label'               => self::humanize_key( $field_key ),
				'type'                => 'text',
				'aliases'             => array( $field_key ),
				'unit'                => '',
				'sensitive'           => false,
				'ai_useful'           => true,
				'field_group'         => 'custom',
				'admin_review_status' => 'approved',
				'is_custom_field'     => 1,
			),
			$current,
			$data
		);

		$fields[ $field_key ]['aliases'] = array_values(
			array_unique(
				array_filter(
					array_map(
						array( __CLASS__, 'normalize_input_name' ),
						(array) $fields[ $field_key ]['aliases']
					)
				)
			)
		);

		update_option( self::CUSTOM_OPTION, $fields, false );

		return $fields[ $field_key ];
	}

	private static function humanize_key( $field_key ) {
		return ucwords( str_replace( '_', ' ', (string) $field_key ) );
	}
}
