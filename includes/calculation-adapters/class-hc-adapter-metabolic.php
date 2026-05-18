<?php
/**
 * Metabolik hız ve kalori hesaplama adapterleri.
 * Mifflin-St Jeor formülü kullanılır.
 * Tahmini değerdir; klinik değerlendirme yerine geçmez.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// -------------------------------------------------------
// Yardımcı: payload'dan yaş çıkar (age veya birth_date)
// -------------------------------------------------------

if ( ! function_exists( 'hc_adapter_age_from_payload' ) ) {
	/**
	 * Payload'da 'age' varsa döner; yoksa 'birth_date'den hesaplar.
	 * Geçerli değer bulunamazsa null döner.
	 *
	 * @param array $p Payload.
	 * @return int|null
	 */
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
// Bazal Metabolizma Hızı (BMR) — Mifflin-St Jeor
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'bazal-metabolizma-hizi-hesaplama',
	function ( array $p ) {
		$slug = 'bazal-metabolizma-hizi-hesaplama';
		$err  = HC_Calculation_API::require_fields( $slug, $p, array( 'weight', 'height', 'gender' ) );
		if ( $err ) {
			return $err;
		}

		$age = hc_adapter_age_from_payload( $p );
		if ( null === $age ) {
			return HC_Calculation_API::error( $slug, 'missing_age', 'Yaş veya doğum tarihi gereklidir.', array( 'age' ) );
		}

		$weight = (float) $p['weight'];
		$height = (float) $p['height'];
		$gender = strtolower( trim( (string) $p['gender'] ) );

		if ( $weight <= 0 || $height <= 0 ) {
			return HC_Calculation_API::error( $slug, 'invalid_input', 'Ağırlık ve boy 0\'dan büyük olmalıdır.' );
		}

		$constant = in_array( $gender, array( 'male', 'erkek', 'm' ), true ) ? 5.0 : -161.0;
		$bmr      = round( ( 10.0 * $weight ) + ( 6.25 * $height ) - ( 5.0 * $age ) + $constant );

		$gender_label = $constant > 0 ? 'Erkek' : 'Kadın';
		$desc         = $gender_label . ', ' . $weight . ' kg, ' . $height . ' cm, ' . $age . ' yaş için bazal metabolizma hızı günde ' . (int) $bmr . ' kcal olarak hesaplanmıştır.';

		return array(
			'title'       => 'Bazal Metabolizma Hızı',
			'value'       => (int) $bmr,
			'unit'        => 'kcal/gün',
			'label'       => 'BMH: ' . (int) $bmr . ' kcal/gün',
			'description' => $desc,
			'warnings'    => array( 'Mifflin-St Jeor formülüdür. Bilgilendirme amaçlıdır; klinik değerlendirme yerine geçmez.' ),
			'raw'         => array(
				'weight_kg' => $weight,
				'height_cm' => $height,
				'age'       => $age,
				'gender'    => $gender,
				'bmr'       => (int) $bmr,
				'hourly'    => round( $bmr / 24.0, 1 ),
				'weekly'    => (int) round( $bmr * 7 ),
			),
		);
	}
);

// -------------------------------------------------------
// Dinlenme Metabolizma Hızı (RMR) — Mifflin-St Jeor
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'dinlenme-metabolizma-hizi',
	function ( array $p ) {
		$slug = 'dinlenme-metabolizma-hizi';
		$err  = HC_Calculation_API::require_fields( $slug, $p, array( 'weight', 'height', 'gender' ) );
		if ( $err ) {
			return $err;
		}

		$age = hc_adapter_age_from_payload( $p );
		if ( null === $age ) {
			return HC_Calculation_API::error( $slug, 'missing_age', 'Yaş veya doğum tarihi gereklidir.', array( 'age' ) );
		}

		$weight = (float) $p['weight'];
		$height = (float) $p['height'];
		$gender = strtolower( trim( (string) $p['gender'] ) );

		if ( $weight <= 0 || $height <= 0 ) {
			return HC_Calculation_API::error( $slug, 'invalid_input', 'Ağırlık ve boy 0\'dan büyük olmalıdır.' );
		}

		$constant = in_array( $gender, array( 'male', 'erkek', 'm' ), true ) ? 5.0 : -161.0;
		$rmr      = round( ( 10.0 * $weight ) + ( 6.25 * $height ) - ( 5.0 * $age ) + $constant );

		$gender_label = $constant > 0 ? 'Erkek' : 'Kadın';
		$desc         = $gender_label . ', ' . $weight . ' kg, ' . $height . ' cm, ' . $age . ' yaş için dinlenme metabolizma hızı günde ' . (int) $rmr . ' kcal olarak hesaplanmıştır.';

		return array(
			'title'       => 'Dinlenme Metabolizma Hızı',
			'value'       => (int) $rmr,
			'unit'        => 'kcal/gün',
			'label'       => 'RMH: ' . (int) $rmr . ' kcal/gün',
			'description' => $desc,
			'warnings'    => array( 'Mifflin-St Jeor formülüdür. Bilgilendirme amaçlıdır; klinik değerlendirme yerine geçmez.' ),
			'raw'         => array(
				'weight_kg' => $weight,
				'height_cm' => $height,
				'age'       => $age,
				'gender'    => $gender,
				'rmr'       => (int) $rmr,
			),
		);
	}
);

// -------------------------------------------------------
// Basit Kalori İhtiyacı
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'basit-kalori-ihtiyaci-hesaplama',
	function ( array $p ) {
		$slug = 'basit-kalori-ihtiyaci-hesaplama';
		$err  = HC_Calculation_API::require_fields( $slug, $p, array( 'weight' ) );
		if ( $err ) {
			return $err;
		}

		$weight = (float) $p['weight'];
		if ( $weight <= 0 ) {
			return HC_Calculation_API::error( $slug, 'invalid_weight', 'Ağırlık 0\'dan büyük olmalıdır.' );
		}

		$goal = strtolower( trim( (string) ( $p['goal'] ?? '' ) ) );
		if ( in_array( $goal, array( 'kilo_verme', 'weight_loss', 'lose', 'zayifla' ), true ) ) {
			$coeff      = 26.0;
			$goal_label = 'kilo vermek';
		} elseif ( in_array( $goal, array( 'kilo_alma', 'weight_gain', 'gain', 'kilo_al' ), true ) ) {
			$coeff      = 36.0;
			$goal_label = 'kilo almak';
		} else {
			$coeff      = 31.0;
			$goal_label = 'kilo korumak';
		}

		$low  = (int) round( $weight * $coeff );
		$high = (int) round( $weight * ( $coeff + 4.0 ) );

		$desc = $weight . ' kg için ' . $goal_label . ' hedefiyle tahmini günlük kalori ihtiyacı ' . $low . ' – ' . $high . ' kcal aralığındadır.';

		return array(
			'title'       => 'Basit Kalori İhtiyacı',
			'value'       => $low,
			'unit'        => 'kcal/gün',
			'label'       => $low . ' – ' . $high . ' kcal/gün',
			'description' => $desc,
			'warnings'    => array( 'Ağırlık-tabanlı kaba tahmindir. Bilgilendirme amaçlıdır; klinik değerlendirme yerine geçmez.' ),
			'raw'         => array(
				'weight_kg' => $weight,
				'goal'      => $goal ?: 'maintenance',
				'coeff'     => $coeff,
				'low_kcal'  => $low,
				'high_kcal' => $high,
			),
		);
	}
);

// -------------------------------------------------------
// Aktivite Katsayısı (PAL)
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'aktivite-katsayisi',
	function ( array $p ) {
		$slug = 'aktivite-katsayisi';
		$err  = HC_Calculation_API::require_fields( $slug, $p, array( 'activity_level' ) );
		if ( $err ) {
			return $err;
		}

		$level = strtolower( trim( (string) $p['activity_level'] ) );

		$pal_map = array(
			'sedentary'    => array( 'pal' => 1.2,   'label' => 'Hareketsiz',             'desc' => 'Masa başı iş, çok az veya hiç egzersiz yok.' ),
			'light'        => array( 'pal' => 1.375,  'label' => 'Hafif Aktif',             'desc' => 'Haftada 1-3 gün hafif egzersiz veya yürüyüş.' ),
			'moderate'     => array( 'pal' => 1.55,   'label' => 'Orta Aktif',              'desc' => 'Haftada 3-5 gün orta yoğunlukta egzersiz.' ),
			'active'       => array( 'pal' => 1.725,  'label' => 'Aktif',                   'desc' => 'Haftada 6-7 gün yoğun egzersiz veya fiziksel iş.' ),
			'very_active'  => array( 'pal' => 1.9,    'label' => 'Çok Aktif',               'desc' => 'Günde iki kez antrenman veya çok ağır fiziksel iş.' ),
		);

		if ( ! isset( $pal_map[ $level ] ) ) {
			return HC_Calculation_API::error( $slug, 'invalid_activity_level', 'Geçersiz aktivite seviyesi. Geçerli değerler: sedentary, light, moderate, active, very_active.', array( 'activity_level' ) );
		}

		$entry = $pal_map[ $level ];
		$pal   = $entry['pal'];

		return array(
			'title'       => 'Aktivite Katsayısı (PAL)',
			'value'       => $pal,
			'unit'        => 'PAL',
			'label'       => $entry['label'] . ' — PAL: ' . $pal,
			'description' => $entry['desc'] . ' Fiziksel Aktivite Düzeyi (PAL) katsayısı: ' . $pal . '.',
			'warnings'    => array( 'PAL katsayısı Mifflin-St Jeor BMR\'ı ile çarpılarak TDEE hesaplanır. Bireysel faktörlere göre değişkenlik gösterebilir.' ),
			'raw'         => array(
				'activity_level' => $level,
				'pal'            => $pal,
				'label'          => $entry['label'],
			),
		);
	}
);

// -------------------------------------------------------
// Günlük Kalori İhtiyacı (TDEE) — Mifflin-St Jeor × PAL
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'gunluk-kalori-ihtiyaci-hesaplama',
	function ( array $p ) {
		$slug = 'gunluk-kalori-ihtiyaci-hesaplama';
		$err  = HC_Calculation_API::require_fields( $slug, $p, array( 'weight', 'height', 'gender', 'activity_level' ) );
		if ( $err ) {
			return $err;
		}

		$age = hc_adapter_age_from_payload( $p );
		if ( null === $age ) {
			return HC_Calculation_API::error( $slug, 'missing_age', 'Yaş veya doğum tarihi gereklidir.', array( 'age' ) );
		}

		$weight = (float) $p['weight'];
		$height = (float) $p['height'];
		$gender = strtolower( trim( (string) $p['gender'] ) );
		$level  = strtolower( trim( (string) $p['activity_level'] ) );

		if ( $weight <= 0 || $height <= 0 ) {
			return HC_Calculation_API::error( $slug, 'invalid_input', 'Ağırlık ve boy 0\'dan büyük olmalıdır.' );
		}

		$pal_map = array(
			'sedentary'   => array( 'pal' => 1.2,   'label' => 'Hareketsiz' ),
			'light'       => array( 'pal' => 1.375,  'label' => 'Hafif Aktif' ),
			'moderate'    => array( 'pal' => 1.55,   'label' => 'Orta Aktif' ),
			'active'      => array( 'pal' => 1.725,  'label' => 'Aktif' ),
			'very_active' => array( 'pal' => 1.9,    'label' => 'Çok Aktif' ),
		);

		if ( ! isset( $pal_map[ $level ] ) ) {
			return HC_Calculation_API::error( $slug, 'invalid_activity_level', 'Geçersiz aktivite seviyesi.', array( 'activity_level' ) );
		}

		$pal          = $pal_map[ $level ]['pal'];
		$level_label  = $pal_map[ $level ]['label'];
		$constant     = in_array( $gender, array( 'male', 'erkek', 'm' ), true ) ? 5.0 : -161.0;
		$gender_label = $constant > 0 ? 'Erkek' : 'Kadın';

		$bmr  = ( 10.0 * $weight ) + ( 6.25 * $height ) - ( 5.0 * $age ) + $constant;
		$tdee = (int) round( $bmr * $pal );

		// Hedef kırılımı
		$lose    = (int) round( $tdee * 0.80 );
		$gain    = (int) round( $tdee * 1.15 );

		$desc = $gender_label . ', ' . $weight . ' kg, ' . $height . ' cm, ' . $age . ' yaş, aktivite: ' . $level_label
			. '. Tahmini günlük toplam enerji harcaması (TDEE): ' . $tdee . ' kcal/gün. '
			. 'Kilo vermek için: ~' . $lose . ' kcal, kilo almak için: ~' . $gain . ' kcal önerilir.';

		return array(
			'title'       => 'Günlük Kalori İhtiyacı',
			'value'       => $tdee,
			'unit'        => 'kcal/gün',
			'label'       => 'TDEE: ' . $tdee . ' kcal/gün (' . $level_label . ')',
			'description' => $desc,
			'warnings'    => array( 'Mifflin-St Jeor × PAL formülüdür. Bilgilendirme amaçlıdır; klinik değerlendirme yerine geçmez.' ),
			'raw'         => array(
				'weight_kg'      => $weight,
				'height_cm'      => $height,
				'age'            => $age,
				'gender'         => $gender,
				'activity_level' => $level,
				'pal'            => $pal,
				'bmr'            => (int) round( $bmr ),
				'tdee'           => $tdee,
				'lose_kcal'      => $lose,
				'gain_kcal'      => $gain,
			),
		);
	}
);
