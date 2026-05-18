<?php
/**
 * Spor / kalori yakımı hesaplama adapterleri.
 * MET (Metabolic Equivalent of Task) tabanlı tahmin.
 * Tahmini değerdir; kişisel metabolizma ve yoğunluğa göre değişebilir.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// -------------------------------------------------------
// Ortak spor kalori yardımcısı
// -------------------------------------------------------

if ( ! function_exists( 'hc_adapter_sport_calorie' ) ) {
	/**
	 * MET × ağırlık(kg) × süre(saat) = kcal
	 *
	 * @param string $slug          Modül slug'ı (hata mesajı için).
	 * @param array  $p             Payload.
	 * @param float  $met           MET değeri.
	 * @param string $activity_name Aktivite adı (Türkçe).
	 * @return array
	 */
	function hc_adapter_sport_calorie( $slug, array $p, $met, $activity_name ) {
		$err = HC_Calculation_API::require_fields( $slug, $p, array( 'weight' ) );
		if ( $err ) {
			return $err;
		}

		$weight = (float) $p['weight'];
		if ( $weight <= 0 ) {
			return HC_Calculation_API::error( $slug, 'invalid_weight', 'Ağırlık 0\'dan büyük olmalıdır.' );
		}

		// duration_minutes yoksa 30 dakika varsayılan
		$assumed_default = false;
		if ( isset( $p['duration_minutes'] ) && '' !== (string) $p['duration_minutes'] ) {
			$duration_min = (float) $p['duration_minutes'];
		} else {
			$duration_min    = 30.0;
			$assumed_default = true;
		}

		if ( $duration_min <= 0 ) {
			return HC_Calculation_API::error( $slug, 'invalid_duration', 'Süre 0\'dan büyük olmalıdır.' );
		}

		$calories = round( $met * $weight * ( $duration_min / 60.0 ), 0 );

		$label = (int) $duration_min . ' dk ' . $activity_name . ' @ ' . $weight . ' kg';
		$desc  = $weight . ' kg ağırlıkta, ' . (int) $duration_min . ' dakika ' . $activity_name . ' ile yaklaşık ' . (int) $calories . ' kcal yakarsın.';
		if ( $assumed_default ) {
			$desc .= ' (30 dakikalık varsayımla hesaplandı.)';
		}

		return array(
			'title'       => $activity_name . ' Kalori Yakımı',
			'value'       => (int) $calories,
			'unit'        => 'kcal',
			'label'       => $label,
			'description' => $desc,
			'warnings'    => array( 'Tahmini değerdir; kişisel metabolizma ve egzersiz yoğunluğuna göre değişebilir.' ),
			'raw'         => array(
				'met'             => $met,
				'weight_kg'       => $weight,
				'duration_min'    => $duration_min,
				'assumed_default' => $assumed_default,
				'calories'        => (int) $calories,
			),
		);
	}
}

// -------------------------------------------------------
// Yürüyüş — MET 3.5 (orta tempo)
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'yuruyus-kalori-yakimi-hesaplama',
	function ( array $p ) {
		return hc_adapter_sport_calorie( 'yuruyus-kalori-yakimi-hesaplama', $p, 3.5, 'Yürüyüş' );
	}
);

// -------------------------------------------------------
// Koşu — MET 8.0 (orta tempo ~8 km/s)
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'kosu-kalori-yakimi-hesaplama',
	function ( array $p ) {
		return hc_adapter_sport_calorie( 'kosu-kalori-yakimi-hesaplama', $p, 8.0, 'Koşu' );
	}
);

// -------------------------------------------------------
// Bisiklet — MET 6.0 (orta tempo)
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'bisiklet-kalori-yakimi-hesaplama',
	function ( array $p ) {
		return hc_adapter_sport_calorie( 'bisiklet-kalori-yakimi-hesaplama', $p, 6.0, 'Bisiklet' );
	}
);

// -------------------------------------------------------
// Yüzme — MET 6.0 (orta tempo)
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'yuzme-kalori-yakimi-hesaplama',
	function ( array $p ) {
		return hc_adapter_sport_calorie( 'yuzme-kalori-yakimi-hesaplama', $p, 6.0, 'Yüzme' );
	}
);

// -------------------------------------------------------
// İp Atlama — MET 10.0
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'ip-atlama-kalori-yakimi-hesaplama',
	function ( array $p ) {
		return hc_adapter_sport_calorie( 'ip-atlama-kalori-yakimi-hesaplama', $p, 10.0, 'İp Atlama' );
	}
);

// -------------------------------------------------------
// Yoga — MET 2.5
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'yoga-kalori-yakimi-hesaplama',
	function ( array $p ) {
		return hc_adapter_sport_calorie( 'yoga-kalori-yakimi-hesaplama', $p, 2.5, 'Yoga' );
	}
);

// -------------------------------------------------------
// Pilates — MET 3.0
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'pilates-kalori-yakimi-hesaplama',
	function ( array $p ) {
		return hc_adapter_sport_calorie( 'pilates-kalori-yakimi-hesaplama', $p, 3.0, 'Pilates' );
	}
);

// -------------------------------------------------------
// Zumba — MET 6.5
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'zumba-kalori-yakimi-hesaplama',
	function ( array $p ) {
		return hc_adapter_sport_calorie( 'zumba-kalori-yakimi-hesaplama', $p, 6.5, 'Zumba' );
	}
);

// -------------------------------------------------------
// Basketbol — MET 6.5
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'basketbol-kalori-yakimi-hesaplama',
	function ( array $p ) {
		return hc_adapter_sport_calorie( 'basketbol-kalori-yakimi-hesaplama', $p, 6.5, 'Basketbol' );
	}
);

// -------------------------------------------------------
// Futbol — MET 7.0
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'futbol-kalori-yakimi-hesaplama',
	function ( array $p ) {
		return hc_adapter_sport_calorie( 'futbol-kalori-yakimi-hesaplama', $p, 7.0, 'Futbol' );
	}
);
