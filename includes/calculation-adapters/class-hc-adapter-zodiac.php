<?php
/**
 * Astroloji / burç hesaplama adapterleri.
 * Eğlence ve kişisel farkındalık amaçlıdır.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// -------------------------------------------------------
// Ortak burç yardımcısı
// -------------------------------------------------------

if ( ! function_exists( 'hc_adapter_get_zodiac_data' ) ) {
	function hc_adapter_get_zodiac_data( $birth_date ) {
		$ts = strtotime( $birth_date );
		if ( ! $ts ) {
			return null;
		}
		$m = (int) gmdate( 'n', $ts );
		$d = (int) gmdate( 'j', $ts );

		$signs = array(
			array( 'name' => 'Oğlak',    'start_m' =>  1, 'start_d' =>  1, 'end_m' =>  1, 'end_d' => 19, 'element' => 'Toprak', 'polarity' => 'Negatif', 'period' => 'Kış',      'symbol' => '♑' ),
			array( 'name' => 'Kova',     'start_m' =>  1, 'start_d' => 20, 'end_m' =>  2, 'end_d' => 18, 'element' => 'Hava',   'polarity' => 'Pozitif', 'period' => 'Kış',      'symbol' => '♒' ),
			array( 'name' => 'Balık',    'start_m' =>  2, 'start_d' => 19, 'end_m' =>  3, 'end_d' => 20, 'element' => 'Su',     'polarity' => 'Negatif', 'period' => 'Kış',      'symbol' => '♓' ),
			array( 'name' => 'Koç',      'start_m' =>  3, 'start_d' => 21, 'end_m' =>  4, 'end_d' => 19, 'element' => 'Ateş',   'polarity' => 'Pozitif', 'period' => 'Bahar',    'symbol' => '♈' ),
			array( 'name' => 'Boğa',     'start_m' =>  4, 'start_d' => 20, 'end_m' =>  5, 'end_d' => 20, 'element' => 'Toprak', 'polarity' => 'Negatif', 'period' => 'Bahar',    'symbol' => '♉' ),
			array( 'name' => 'İkizler',  'start_m' =>  5, 'start_d' => 21, 'end_m' =>  6, 'end_d' => 20, 'element' => 'Hava',   'polarity' => 'Pozitif', 'period' => 'Bahar',    'symbol' => '♊' ),
			array( 'name' => 'Yengeç',   'start_m' =>  6, 'start_d' => 21, 'end_m' =>  7, 'end_d' => 22, 'element' => 'Su',     'polarity' => 'Negatif', 'period' => 'Yaz',      'symbol' => '♋' ),
			array( 'name' => 'Aslan',    'start_m' =>  7, 'start_d' => 23, 'end_m' =>  8, 'end_d' => 22, 'element' => 'Ateş',   'polarity' => 'Pozitif', 'period' => 'Yaz',      'symbol' => '♌' ),
			array( 'name' => 'Başak',    'start_m' =>  8, 'start_d' => 23, 'end_m' =>  9, 'end_d' => 22, 'element' => 'Toprak', 'polarity' => 'Negatif', 'period' => 'Yaz',      'symbol' => '♍' ),
			array( 'name' => 'Terazi',   'start_m' =>  9, 'start_d' => 23, 'end_m' => 10, 'end_d' => 22, 'element' => 'Hava',   'polarity' => 'Pozitif', 'period' => 'Sonbahar', 'symbol' => '♎' ),
			array( 'name' => 'Akrep',    'start_m' => 10, 'start_d' => 23, 'end_m' => 11, 'end_d' => 21, 'element' => 'Su',     'polarity' => 'Negatif', 'period' => 'Sonbahar', 'symbol' => '♏' ),
			array( 'name' => 'Yay',      'start_m' => 11, 'start_d' => 22, 'end_m' => 12, 'end_d' => 21, 'element' => 'Ateş',   'polarity' => 'Pozitif', 'period' => 'Sonbahar', 'symbol' => '♐' ),
			array( 'name' => 'Oğlak',    'start_m' => 12, 'start_d' => 22, 'end_m' => 12, 'end_d' => 31, 'element' => 'Toprak', 'polarity' => 'Negatif', 'period' => 'Kış',      'symbol' => '♑' ),
		);

		foreach ( $signs as $sign ) {
			// Aynı ay içi kontrol.
			if ( $sign['start_m'] === $sign['end_m'] ) {
				if ( $m === $sign['start_m'] && $d >= $sign['start_d'] && $d <= $sign['end_d'] ) {
					return $sign;
				}
			} elseif ( ( $m === $sign['start_m'] && $d >= $sign['start_d'] )
				|| ( $m === $sign['end_m'] && $d <= $sign['end_d'] ) ) {
				return $sign;
			}
		}
		return null;
	}
}

// -------------------------------------------------------
// Burç Doğum Aralığı — hangi burç, tarihi
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'burc-dogum-araligi-hesaplama',
	function ( array $p ) {
		$err = HC_Calculation_API::require_fields( 'burc-dogum-araligi-hesaplama', $p, array( 'birth_date' ) );
		if ( $err ) return $err;

		$sign = hc_adapter_get_zodiac_data( $p['birth_date'] );
		if ( ! $sign ) {
			return HC_Calculation_API::error( 'burc-dogum-araligi-hesaplama', 'invalid_date', 'Geçersiz doğum tarihi.' );
		}

		return array(
			'title'       => 'Burç Doğum Aralığı',
			'value'       => $sign['symbol'] . ' ' . $sign['name'],
			'unit'        => '',
			'label'       => $sign['name'] . ' burcu',
			'description' => 'Doğum tarihin (' . $p['birth_date'] . ') ' . $sign['name'] . ' burcu aralığına giriyor.',
			'warnings'    => array( 'Eğlence ve kişisel farkındalık amaçlıdır.' ),
			'raw'         => $sign,
		);
	}
);

// -------------------------------------------------------
// Burç Grubu (element)
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'burc-grubu-hesaplama',
	function ( array $p ) {
		$err = HC_Calculation_API::require_fields( 'burc-grubu-hesaplama', $p, array( 'birth_date' ) );
		if ( $err ) return $err;

		$sign = hc_adapter_get_zodiac_data( $p['birth_date'] );
		if ( ! $sign ) {
			return HC_Calculation_API::error( 'burc-grubu-hesaplama', 'invalid_date', 'Geçersiz doğum tarihi.' );
		}

		$element_desc = array(
			'Ateş'   => 'Ateş grubu burçlar (Koç, Aslan, Yay) enerjik, tutkulu ve girişkendir.',
			'Toprak' => 'Toprak grubu burçlar (Boğa, Başak, Oğlak) pratik, güvenilir ve kararlıdır.',
			'Hava'   => 'Hava grubu burçlar (İkizler, Terazi, Kova) sosyal, analitik ve iletişimcidir.',
			'Su'     => 'Su grubu burçlar (Yengeç, Akrep, Balık) duygusal, sezgisel ve empatiktir.',
		);

		return array(
			'title'       => 'Burç Grubu',
			'value'       => $sign['element'],
			'unit'        => '',
			'label'       => $sign['name'] . ' — ' . $sign['element'] . ' grubu',
			'description' => $element_desc[ $sign['element'] ] ?? '',
			'warnings'    => array( 'Eğlence ve kişisel farkındalık amaçlıdır.' ),
			'raw'         => $sign,
		);
	}
);

// -------------------------------------------------------
// Burç Polaritesi
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'burc-polaritesi-hesaplama',
	function ( array $p ) {
		$err = HC_Calculation_API::require_fields( 'burc-polaritesi-hesaplama', $p, array( 'birth_date' ) );
		if ( $err ) return $err;

		$sign = hc_adapter_get_zodiac_data( $p['birth_date'] );
		if ( ! $sign ) {
			return HC_Calculation_API::error( 'burc-polaritesi-hesaplama', 'invalid_date', 'Geçersiz doğum tarihi.' );
		}

		$desc = 'Pozitif' === $sign['polarity']
			? 'Pozitif (Yang) polarite: dışa dönük, aktif ve ekspresif enerji.'
			: 'Negatif (Yin) polarite: içe dönük, reseptif ve derinlemesine düşünen enerji.';

		return array(
			'title'       => 'Burç Polaritesi',
			'value'       => $sign['polarity'],
			'unit'        => '',
			'label'       => $sign['name'] . ' — ' . $sign['polarity'] . ' polarite',
			'description' => $desc,
			'warnings'    => array( 'Eğlence ve kişisel farkındalık amaçlıdır.' ),
			'raw'         => $sign,
		);
	}
);

// -------------------------------------------------------
// Burç Dönemi
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'burc-donemi-hesaplama',
	function ( array $p ) {
		$err = HC_Calculation_API::require_fields( 'burc-donemi-hesaplama', $p, array( 'birth_date' ) );
		if ( $err ) return $err;

		$sign = hc_adapter_get_zodiac_data( $p['birth_date'] );
		if ( ! $sign ) {
			return HC_Calculation_API::error( 'burc-donemi-hesaplama', 'invalid_date', 'Geçersiz doğum tarihi.' );
		}

		$period_desc = array(
			'Bahar'    => 'Bahar dönemi burçları (Koç, Boğa, İkizler): yenilenme ve başlangıç enerjisi.',
			'Yaz'      => 'Yaz dönemi burçları (Yengeç, Aslan, Başak): büyüme ve ifade enerjisi.',
			'Sonbahar' => 'Sonbahar dönemi burçları (Terazi, Akrep, Yay): denge ve dönüşüm enerjisi.',
			'Kış'      => 'Kış dönemi burçları (Oğlak, Kova, Balık): içe dönüş ve temizlenme enerjisi.',
		);

		return array(
			'title'       => 'Burç Dönemi',
			'value'       => $sign['period'],
			'unit'        => '',
			'label'       => $sign['name'] . ' — ' . $sign['period'] . ' dönemi',
			'description' => $period_desc[ $sign['period'] ] ?? '',
			'warnings'    => array( 'Eğlence ve kişisel farkındalık amaçlıdır.' ),
			'raw'         => $sign,
		);
	}
);

// -------------------------------------------------------
// Gelişmiş astroloji — backend henüz desteklenmiyor
// -------------------------------------------------------

foreach ( array( 'ay-burcu-hesaplama', 'burc-ve-ev-yerlesimi-hesaplama' ) as $unsupported_slug ) {
	HC_Calculation_API::register_adapter(
		$unsupported_slug,
		function ( array $p ) use ( $unsupported_slug ) {
			return array(
				'success'     => false,
				'module_slug' => $unsupported_slug,
				'error_code'  => 'unsupported_backend_calculation',
				'message'     => 'Bu analiz için gelişmiş astroloji hesaplama motoru (yükselen burç, ev yerleşimi, ay haritası) sonraki fazda bağlanacak.',
				'missing_fields' => array(),
			);
		}
	);
}
