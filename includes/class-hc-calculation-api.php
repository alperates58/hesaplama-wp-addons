<?php
/**
 * HC_Calculation_API — Hesaplama Suite backend hesaplama API'si.
 *
 * Kullanım (herhangi bir eklentiden):
 *   $result = apply_filters( 'hc_calculate_module', null, 'vucut-kitle-indeksi-hesaplama', [
 *       'height' => 180,
 *       'weight' => 80,
 *   ] );
 *
 * Veya doğrudan:
 *   $result = HC_Calculation_API::calculate( 'vucut-kitle-indeksi-hesaplama', $payload );
 *
 * Başarı dönüş formatı:
 *   [ 'success'=>true, 'module_slug'=>'...', 'title'=>'...', 'value'=>...,
 *     'unit'=>'...', 'label'=>'...', 'description'=>'...', 'warnings'=>[...], 'raw'=>[...] ]
 *
 * Hata dönüş formatı:
 *   [ 'success'=>false, 'module_slug'=>'...', 'error_code'=>'...', 'message'=>'...', 'missing_fields'=>[...] ]
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class HC_Calculation_API {

	/** @var array slug => callable */
	private static $adapters = array();

	private static $initialized = false;

	// -------------------------------------------------------
	// Bootstrap
	// -------------------------------------------------------

	public static function init() {
		if ( self::$initialized ) {
			return;
		}
		self::$initialized = true;

		// Adapter dosyalarını yükle.
		$adapter_dir = HC_PLUGIN_DIR . 'includes/calculation-adapters/';
		foreach ( glob( $adapter_dir . 'class-hc-adapter-*.php' ) ?: array() as $file ) {
			require_once $file;
		}

		// WordPress filter hook — herhangi bir eklenti apply_filters() ile çağırabilir.
		add_filter( 'hc_calculate_module', array( __CLASS__, 'filter_calculate_module' ), 10, 3 );
	}

	// -------------------------------------------------------
	// Adapter kaydı
	// -------------------------------------------------------

	/**
	 * Adapter ekle.
	 *
	 * @param string   $module_slug  Modül slug'ı (örn. 'vucut-kitle-indeksi-hesaplama').
	 * @param callable $callback     function( array $payload ) : array result
	 */
	public static function register_adapter( $module_slug, $callback ) {
		self::$adapters[ $module_slug ] = $callback;
	}

	public static function get_adapter( $module_slug ) {
		return self::$adapters[ $module_slug ] ?? null;
	}

	public static function is_supported( $module_slug ) {
		return isset( self::$adapters[ $module_slug ] );
	}

	public static function get_supported_modules() {
		return array_keys( self::$adapters );
	}

	// -------------------------------------------------------
	// Hesaplama
	// -------------------------------------------------------

	/**
	 * Modülü hesapla.
	 *
	 * @param string $module_slug
	 * @param array  $payload  profil_field => value
	 * @return array result array
	 */
	public static function calculate( $module_slug, array $payload ) {
		if ( ! self::is_supported( $module_slug ) ) {
			return self::error( $module_slug, 'unsupported_backend_calculation',
				'Bu analiz için backend hesaplama motoru henüz bağlanmadı. Sonraki fazda eklenecek.' );
		}

		$callback = self::$adapters[ $module_slug ];
		try {
			$payload = self::normalize_payload( $module_slug, $payload );
			$raw     = call_user_func( $callback, $payload );
			if ( ! is_array( $raw ) ) {
				return self::error( $module_slug, 'adapter_invalid_return', 'Adapter geçersiz sonuç döndürdü.' );
			}
			if ( isset( $raw['success'] ) && false === $raw['success'] ) {
				// Adapter zaten hata döndürdü.
				$raw['module_slug'] = $module_slug;
				return $raw;
			}
			return self::normalize_result( $module_slug, $raw );
		} catch ( Exception $e ) {
			return self::error( $module_slug, 'adapter_exception', $e->getMessage() );
		}
	}

	// -------------------------------------------------------
	// WordPress filter handler
	// -------------------------------------------------------

	/**
	 * @param mixed  $result   Önceki filtre değeri (null başlangıç).
	 * @param string $module_slug
	 * @param array  $payload
	 * @return array
	 */
	public static function filter_calculate_module( $result, $module_slug, $payload ) {
		// Başka bir filtre zaten doldurmuşsa dokunma.
		if ( null !== $result ) {
			return $result;
		}
		return self::calculate( $module_slug, (array) $payload );
	}

	// -------------------------------------------------------
	// Normalize
	// -------------------------------------------------------

	public static function normalize_payload( $module_slug, array $payload ) {
		// Sayısal alanları cast et.
		$numeric = array( 'height', 'weight', 'daily_steps', 'sleep_hours', 'exercise_minutes' );
		foreach ( $numeric as $key ) {
			if ( isset( $payload[ $key ] ) ) {
				$payload[ $key ] = (float) $payload[ $key ];
			}
		}
		return $payload;
	}

	public static function normalize_result( $module_slug, array $raw ) {
		return array_merge(
			array(
				'success'     => true,
				'module_slug' => $module_slug,
				'title'       => '',
				'value'       => null,
				'unit'        => '',
				'label'       => '',
				'description' => '',
				'warnings'    => array(),
				'raw'         => $raw,
			),
			$raw,
			array( 'success' => true, 'module_slug' => $module_slug )
		);
	}

	// -------------------------------------------------------
	// Hata yardımcısı
	// -------------------------------------------------------

	public static function error( $module_slug, $error_code, $message, $missing_fields = array() ) {
		return array(
			'success'        => false,
			'module_slug'    => $module_slug,
			'error_code'     => $error_code,
			'message'        => $message,
			'missing_fields' => $missing_fields,
		);
	}

	// -------------------------------------------------------
	// Zorunlu alan kontrol yardımcısı (adapterlar kullanır)
	// -------------------------------------------------------

	public static function require_fields( $module_slug, array $payload, array $required ) {
		$missing = array();
		foreach ( $required as $field ) {
			if ( ! isset( $payload[ $field ] ) || '' === (string) $payload[ $field ] ) {
				$missing[] = $field;
			}
		}
		if ( ! empty( $missing ) ) {
			return self::error( $module_slug, 'missing_input',
				'Hesaplama için gerekli bilgiler eksik: ' . implode( ', ', $missing ),
				$missing );
		}
		return null; // Hata yok.
	}
}
