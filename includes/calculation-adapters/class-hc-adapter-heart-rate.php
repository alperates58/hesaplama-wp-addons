<?php
/**
 * Nabız / kalp hızı hesaplama adapterleri.
 * Fox (220-yaş) ve Karvonen formülü tabanlı.
 * Tahmini değerdir; tıbbi değerlendirme yerine geçmez.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// -------------------------------------------------------
// Yardımcı: maksimum nabız (Fox formülü)
// -------------------------------------------------------

if ( ! function_exists( 'hc_adapter_max_hr' ) ) {
	function hc_adapter_max_hr( $age ) {
		return 220 - (int) $age;
	}
}

// Yaş çıkarma yardımcısı — class-hc-adapter-metabolic.php tanımlamışsa tekrar tanımlanmaz
if ( ! function_exists( 'hc_adapter_age_from_payload' ) ) {
	function hc_adapter_age_from_payload( array $p ) {
		if ( isset( $p['age'] ) && '' !== (string) $p['age'] && (int) $p['age'] > 0 ) {
			return (int) $p['age'];
		}
		if ( ! empty( $p['birth_date'] ) ) {
			$ts = strtotime( $p['birth_date'] );
			if ( $ts ) {
				$dob  = new DateTime( '@' . $ts );
				$now  = new DateTime();
				$diff = $now->diff( $dob );
				$age  = (int) $diff->y;
				return $age > 0 && $age < 150 ? $age : null;
			}
		}
		return null;
	}
}

// -------------------------------------------------------
// Maksimum Nabız — Fox (220-yaş)
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'maksimum-nabiz-hesaplama',
	function ( array $p ) {
		$slug = 'maksimum-nabiz-hesaplama';
		$err  = HC_Calculation_API::require_fields( $slug, $p, array( 'birth_date' ) );
		if ( $err ) {
			return $err;
		}

		$age = hc_adapter_age_from_payload( $p );
		if ( null === $age || $age <= 0 || $age > 120 ) {
			return HC_Calculation_API::error( $slug, 'invalid_age', 'Geçerli doğum tarihi veya yaş gereklidir.' );
		}

		$max_hr = hc_adapter_max_hr( $age );

		return array(
			'title'       => 'Maksimum Nabız',
			'value'       => $max_hr,
			'unit'        => 'bpm',
			'label'       => $age . ' yaş için maks. nabız: ' . $max_hr . ' bpm',
			'description' => $age . ' yaşında Fox formülüne (220 − yaş) göre tahmini maksimum nabız ' . $max_hr . ' bpm\'dir.',
			'warnings'    => array( 'Tahmini değerdir; bireysel kondisyona göre önemli ölçüde değişebilir. Bilgilendirme amaçlıdır.' ),
			'raw'         => array(
				'age'    => $age,
				'max_hr' => $max_hr,
			),
		);
	}
);

// -------------------------------------------------------
// Hedef Nabız Bölgesi — %MHR bazlı 5 zon
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'hedef-nabiz-bolgesi-hesaplama',
	function ( array $p ) {
		$slug = 'hedef-nabiz-bolgesi-hesaplama';
		$err  = HC_Calculation_API::require_fields( $slug, $p, array( 'birth_date' ) );
		if ( $err ) {
			return $err;
		}

		$age = hc_adapter_age_from_payload( $p );
		if ( null === $age || $age <= 0 || $age > 120 ) {
			return HC_Calculation_API::error( $slug, 'invalid_age', 'Geçerli doğum tarihi veya yaş gereklidir.' );
		}

		$mhr = hc_adapter_max_hr( $age );

		$zones = array(
			array( 'name' => 'Isınma (%50-60)',         'low' => 0.50, 'high' => 0.60 ),
			array( 'name' => 'Yağ Yakımı (%60-70)',      'low' => 0.60, 'high' => 0.70 ),
			array( 'name' => 'Aerobik (%70-80)',         'low' => 0.70, 'high' => 0.80 ),
			array( 'name' => 'Anaerobik (%80-90)',       'low' => 0.80, 'high' => 0.90 ),
			array( 'name' => 'Maksimum Efor (%90-100)', 'low' => 0.90, 'high' => 1.00 ),
		);

		$zone_results = array();
		foreach ( $zones as $z ) {
			$zone_results[] = array(
				'name' => $z['name'],
				'low'  => (int) round( $mhr * $z['low'] ),
				'high' => (int) round( $mhr * $z['high'] ),
			);
		}

		$fat_burn   = $zone_results[1];
		$label      = 'Yağ yakımı: ' . $fat_burn['low'] . '–' . $fat_burn['high'] . ' bpm';
		$desc_parts = array();
		foreach ( $zone_results as $z ) {
			$desc_parts[] = $z['name'] . ': ' . $z['low'] . '–' . $z['high'] . ' bpm';
		}
		$desc = $age . ' yaş, MHR ' . $mhr . ' bpm. ' . implode( '; ', $desc_parts ) . '.';

		return array(
			'title'       => 'Hedef Nabız Bölgesi',
			'value'       => $fat_burn['low'] . '–' . $fat_burn['high'],
			'unit'        => 'bpm',
			'label'       => $label,
			'description' => $desc,
			'warnings'    => array( 'Tahmini değerdir; bireysel kondisyona göre değişebilir. Bilgilendirme amaçlıdır.' ),
			'raw'         => array(
				'age'   => $age,
				'mhr'   => $mhr,
				'zones' => $zone_results,
			),
		);
	}
);

// -------------------------------------------------------
// Hedef Nabız — Karvonen formülü
// rest_hr yoksa 60 bpm varsayılan, intensity yoksa %70
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'hedef-nabiz-hesaplama',
	function ( array $p ) {
		$slug = 'hedef-nabiz-hesaplama';
		$err  = HC_Calculation_API::require_fields( $slug, $p, array( 'birth_date' ) );
		if ( $err ) {
			return $err;
		}

		$age = hc_adapter_age_from_payload( $p );
		if ( null === $age || $age <= 0 || $age > 120 ) {
			return HC_Calculation_API::error( $slug, 'invalid_age', 'Geçerli doğum tarihi veya yaş gereklidir.' );
		}

		$rest_hr_assumed = false;
		if ( isset( $p['rest_hr'] ) && '' !== (string) $p['rest_hr'] && (int) $p['rest_hr'] > 0 ) {
			$rest_hr = (int) $p['rest_hr'];
		} else {
			$rest_hr          = 60;
			$rest_hr_assumed  = true;
		}

		$intensity_assumed = false;
		if ( isset( $p['intensity'] ) && '' !== (string) $p['intensity'] && (float) $p['intensity'] > 0 ) {
			$intensity = (float) $p['intensity'];
		} else {
			$intensity          = 70.0;
			$intensity_assumed  = true;
		}

		$max_hr = hc_adapter_max_hr( $age );
		$hrr    = $max_hr - $rest_hr;
		$target = (int) round( ( $hrr * ( $intensity / 100.0 ) ) + $rest_hr );

		$assumed_notes = array();
		if ( $rest_hr_assumed ) {
			$assumed_notes[] = 'Dinlenme nabzı varsayılan 60 bpm ile hesaplandı.';
		}
		if ( $intensity_assumed ) {
			$assumed_notes[] = 'Yoğunluk varsayılan %70 ile hesaplandı.';
		}

		$desc = $age . ' yaş, dinlenme nabzı ' . $rest_hr . ' bpm, %' . (int) $intensity . ' yoğunlukta Karvonen formülüyle hedef nabız ' . $target . ' bpm.';

		return array(
			'title'       => 'Hedef Nabız (Karvonen)',
			'value'       => $target,
			'unit'        => 'bpm',
			'label'       => (int) $intensity . '% yoğunlukta hedef nabız: ' . $target . ' bpm',
			'description' => $desc,
			'warnings'    => array_merge(
				array( 'Tahmini değerdir; tıbbi değerlendirme yerine geçmez. Bilgilendirme amaçlıdır.' ),
				$assumed_notes
			),
			'raw'         => array(
				'age'               => $age,
				'rest_hr'           => $rest_hr,
				'max_hr'            => $max_hr,
				'hrr'               => $hrr,
				'intensity_pct'     => $intensity,
				'target_hr'         => $target,
				'rest_hr_assumed'   => $rest_hr_assumed,
				'intensity_assumed' => $intensity_assumed,
			),
		);
	}
);

// -------------------------------------------------------
// Nabız Bölgesi (Karvonen) — 5 zon
// rest_hr yoksa 60 bpm varsayılan
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'nabiz-bolgesi-hesaplama',
	function ( array $p ) {
		$slug = 'nabiz-bolgesi-hesaplama';
		$err  = HC_Calculation_API::require_fields( $slug, $p, array( 'birth_date' ) );
		if ( $err ) {
			return $err;
		}

		$age = hc_adapter_age_from_payload( $p );
		if ( null === $age || $age <= 0 || $age > 120 ) {
			return HC_Calculation_API::error( $slug, 'invalid_age', 'Geçerli doğum tarihi veya yaş gereklidir.' );
		}

		$rest_hr_assumed = false;
		if ( isset( $p['rest_hr'] ) && '' !== (string) $p['rest_hr'] && (int) $p['rest_hr'] > 0 ) {
			$rest_hr = (int) $p['rest_hr'];
		} else {
			$rest_hr          = 60;
			$rest_hr_assumed  = true;
		}

		$max_hr = hc_adapter_max_hr( $age );
		$hrr    = $max_hr - $rest_hr;

		$zones = array(
			array( 'name' => 'Z1 — Isınma / Toparlanma', 'low' => 0.50, 'high' => 0.60 ),
			array( 'name' => 'Z2 — Aerobik / Yağ Yakımı', 'low' => 0.60, 'high' => 0.70 ),
			array( 'name' => 'Z3 — Dayanıklılık / Tempo',  'low' => 0.70, 'high' => 0.80 ),
			array( 'name' => 'Z4 — Laktat Eşiği',          'low' => 0.80, 'high' => 0.90 ),
			array( 'name' => 'Z5 — Maksimum Performans',   'low' => 0.90, 'high' => 1.00 ),
		);

		$zone_results = array();
		foreach ( $zones as $z ) {
			$zone_results[] = array(
				'name' => $z['name'],
				'low'  => (int) round( ( $hrr * $z['low'] ) + $rest_hr ),
				'high' => (int) round( ( $hrr * $z['high'] ) + $rest_hr ),
			);
		}

		$z2         = $zone_results[1];
		$label      = 'Z2 yağ yakımı: ' . $z2['low'] . '–' . $z2['high'] . ' bpm';
		$desc_parts = array();
		foreach ( $zone_results as $z ) {
			$desc_parts[] = $z['name'] . ': ' . $z['low'] . '–' . $z['high'] . ' bpm';
		}
		$desc = $age . ' yaş, dinlenme nabzı ' . $rest_hr . ' bpm (Karvonen). ' . implode( '; ', $desc_parts ) . '.';

		$warnings = array( 'Tahmini değerdir; tıbbi değerlendirme yerine geçmez. Bilgilendirme amaçlıdır.' );
		if ( $rest_hr_assumed ) {
			$warnings[] = 'Dinlenme nabzı varsayılan 60 bpm ile hesaplandı.';
		}

		return array(
			'title'       => 'Nabız Bölgesi (Karvonen)',
			'value'       => $z2['low'] . '–' . $z2['high'],
			'unit'        => 'bpm',
			'label'       => $label,
			'description' => $desc,
			'warnings'    => $warnings,
			'raw'         => array(
				'age'             => $age,
				'rest_hr'         => $rest_hr,
				'max_hr'          => $max_hr,
				'hrr'             => $hrr,
				'zones'           => $zone_results,
				'rest_hr_assumed' => $rest_hr_assumed,
			),
		);
	}
);
