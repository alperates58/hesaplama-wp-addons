<?php
/**
 * Sağlık hesaplama adapterleri.
 * Bilgilendirme amaçlıdır; tıbbi teşhis veya tedavi önerisi değildir.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// -------------------------------------------------------
// VKİ — Vücut Kitle İndeksi
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'vucut-kitle-indeksi-hesaplama',
	function ( array $p ) {
		$err = HC_Calculation_API::require_fields( 'vucut-kitle-indeksi-hesaplama', $p, array( 'height', 'weight' ) );
		if ( $err ) return $err;

		$h_m  = (float) $p['height'] / 100.0;
		$bmi  = round( (float) $p['weight'] / ( $h_m * $h_m ), 1 );

		if ( $bmi < 18.5 )      { $label = 'Zayıf';         $desc = 'Kilonuz yaş ve boya göre normalin altında görünüyor.'; }
		elseif ( $bmi < 25.0 )  { $label = 'Normal';         $desc = 'Kilonuz sağlıklı aralıkta.'; }
		elseif ( $bmi < 30.0 )  { $label = 'Fazla Kilolu';   $desc = 'Kilonuz normalin biraz üstünde.'; }
		elseif ( $bmi < 35.0 )  { $label = 'Obez (Sınıf I)'; $desc = 'Yüksek kilo sağlık riskini artırıyor.'; }
		elseif ( $bmi < 40.0 )  { $label = 'Obez (Sınıf II)'; $desc = 'Ciddi kilo fazlası; uzman görüşü önerilir.'; }
		else                    { $label = 'Morbid Obez';     $desc = 'Tıbbi değerlendirme gerektirir.'; }

		return array(
			'title'       => 'Vücut Kitle İndeksi (VKİ)',
			'value'       => $bmi,
			'unit'        => 'kg/m²',
			'label'       => $label,
			'description' => $desc . ' (' . $p['height'] . ' cm boy, ' . $p['weight'] . ' kg kilo)',
			'warnings'    => array( 'Bilgilendirme amaçlıdır; tıbbi teşhis veya tedavi önerisi değildir.' ),
		);
	}
);

// -------------------------------------------------------
// Günlük Su İhtiyacı
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'gunluk-su-ihtiyaci-hesaplama',
	function ( array $p ) {
		$err = HC_Calculation_API::require_fields( 'gunluk-su-ihtiyaci-hesaplama', $p, array( 'weight' ) );
		if ( $err ) return $err;

		$base = round( (float) $p['weight'] * 0.033, 1 );

		// Aktivite eklentisi (profil'den daily_steps varsa tahmini dakika hesapla).
		$exercise_min = (float) ( $p['exercise_minutes'] ?? 0 );
		if ( empty( $exercise_min ) && ! empty( $p['activity_level'] ) ) {
			$exercise_min = match ( $p['activity_level'] ) {
				'sedentary'   => 0,
				'light'       => 20,
				'moderate'    => 35,
				'active'      => 50,
				'very_active' => 75,
				default       => 0,
			};
		}
		$activity_add = round( $exercise_min * 0.012, 2 );

		// Hava/ortam (opsiyonel).
		$weather_add = match ( $p['weather'] ?? 'normal' ) {
			'sicak'      => 0.3,
			'cok-sicak'  => 0.5,
			default      => 0.0,
		};

		$total    = round( $base + $activity_add + $weather_add, 1 );
		$low_end  = round( $total * 0.9, 1 );
		$high_end = round( $total * 1.1, 1 );

		return array(
			'title'       => 'Günlük Su İhtiyacı',
			'value'       => $total,
			'unit'        => 'litre',
			'label'       => $low_end . ' – ' . $high_end . ' L aralığı',
			'description' => 'Kilo bilgine göre tahmini günlük su ihtiyacın. Aktivite ve iklim koşullarına göre değişebilir.',
			'warnings'    => array( 'Bilgilendirme amaçlıdır; tıbbi teşhis veya tedavi önerisi değildir.' ),
			'raw'         => array(
				'base'         => $base,
				'activity_add' => $activity_add,
				'weather_add'  => $weather_add,
			),
		);
	}
);

// -------------------------------------------------------
// İdeal Kilo (Devine formülü)
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'ideal-kilo-hesaplama',
	function ( array $p ) {
		$err = HC_Calculation_API::require_fields( 'ideal-kilo-hesaplama', $p, array( 'height', 'gender' ) );
		if ( $err ) return $err;

		$h_cm  = (float) $p['height'];
		$over  = max( 0, ( $h_cm - 152.4 ) / 2.54 );

		if ( in_array( $p['gender'], array( 'male' ), true ) ) {
			$ideal = 50.0 + 2.3 * $over;
			$label = 'Erkek ideal kilo (Devine)';
		} else {
			$ideal = 45.5 + 2.3 * $over;
			$label = 'Kadın ideal kilo (Devine)';
		}

		$ideal = round( max( 40.0, $ideal ), 1 );
		$low   = round( $ideal * 0.90, 1 );
		$high  = round( $ideal * 1.10, 1 );

		return array(
			'title'       => 'İdeal Kilo',
			'value'       => $ideal,
			'unit'        => 'kg',
			'label'       => $label . ': ' . $low . ' – ' . $high . ' kg',
			'description' => 'Boy ve cinsiyete göre Devine formülüyle hesaplanan yaklaşık ideal kilo aralığı.',
			'warnings'    => array( 'Bilgilendirme amaçlıdır; tıbbi teşhis veya tedavi önerisi değildir.' ),
		);
	}
);

// -------------------------------------------------------
// Adımdan Kaloriye
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'adimdan-kaloriye-hesaplama',
	function ( array $p ) {
		$err = HC_Calculation_API::require_fields( 'adimdan-kaloriye-hesaplama', $p, array( 'weight', 'daily_steps' ) );
		if ( $err ) return $err;

		$steps    = (float) $p['daily_steps'];
		$weight   = (float) $p['weight'];
		$calories = round( $steps * 0.0005 * $weight, 0 );

		return array(
			'title'       => 'Günlük Adım Kalori Tahmini',
			'value'       => $calories,
			'unit'        => 'kcal',
			'label'       => number_format( (int) $steps, 0, ',', '.' ) . ' adım',
			'description' => 'Kilo ve adım sayısına göre yaklaşık günlük yürüyüş kalori harcaması.',
			'warnings'    => array( 'Bilgilendirme amaçlıdır; tıbbi teşhis veya tedavi önerisi değildir.' ),
		);
	}
);

// -------------------------------------------------------
// Günlük Adım Hedefi
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'gunluk-adim-hedefi-hesaplama',
	function ( array $p ) {
		$err = HC_Calculation_API::require_fields( 'gunluk-adim-hedefi-hesaplama', $p, array( 'activity_level' ) );
		if ( $err ) return $err;

		$goals = array(
			'sedentary'   => array( 'goal' => 8000,  'label' => 'Hareketsiz için başlangıç hedefi' ),
			'light'       => array( 'goal' => 8000,  'label' => 'Hafif aktif için önerilen hedef' ),
			'moderate'    => array( 'goal' => 10000, 'label' => 'Orta aktif için önerilen hedef' ),
			'active'      => array( 'goal' => 12000, 'label' => 'Aktif yaşam için hedef' ),
			'very_active' => array( 'goal' => 15000, 'label' => 'Çok aktif yaşam için hedef' ),
		);

		$level = $p['activity_level'];
		$data  = $goals[ $level ] ?? $goals['moderate'];

		return array(
			'title'       => 'Günlük Adım Hedefi',
			'value'       => $data['goal'],
			'unit'        => 'adım',
			'label'       => $data['label'],
			'description' => 'Aktivite düzeyine göre önerilen günlük adım hedefi.',
			'warnings'    => array( 'Bilgilendirme amaçlıdır; tıbbi teşhis veya tedavi önerisi değildir.' ),
		);
	}
);

// -------------------------------------------------------
// Spor Protein İhtiyacı
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'spor-protein-ihtiyaci-hesaplama',
	function ( array $p ) {
		$err = HC_Calculation_API::require_fields( 'spor-protein-ihtiyaci-hesaplama', $p, array( 'weight', 'activity_level' ) );
		if ( $err ) return $err;

		$factors = array(
			'sedentary'   => 0.8,
			'light'       => 1.2,
			'moderate'    => 1.4,
			'active'      => 1.6,
			'very_active' => 2.0,
		);

		$factor  = $factors[ $p['activity_level'] ] ?? 1.2;
		$protein = round( (float) $p['weight'] * $factor, 1 );

		return array(
			'title'       => 'Günlük Protein İhtiyacı',
			'value'       => $protein,
			'unit'        => 'gram',
			'label'       => 'Aktivite: ' . ( $p['activity_level'] ?? '-' ) . ' | ' . $factor . ' g/kg',
			'description' => 'Vücut ağırlığı ve aktivite düzeyine göre tahmini günlük protein ihtiyacı.',
			'warnings'    => array( 'Bilgilendirme amaçlıdır; tıbbi teşhis veya tedavi önerisi değildir.' ),
		);
	}
);
