<?php
/**
 * Numeroloji hesaplama adapterleri.
 * Eğlence ve kişisel farkındalık amaçlıdır.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// -------------------------------------------------------
// Ortak numeroloji yardımcıları
// -------------------------------------------------------

if ( ! function_exists( 'hc_adapter_reduce_to_single' ) ) {
	/**
	 * Sayıyı tek basamağa indirir; 11, 22, 33 usta sayıları korunur.
	 */
	function hc_adapter_reduce_to_single( $n ) {
		$n = (int) $n;
		while ( $n > 9 && ! in_array( $n, array( 11, 22, 33 ), true ) ) {
			$digit_sum = 0;
			foreach ( str_split( (string) $n ) as $d ) {
				$digit_sum += (int) $d;
			}
			$n = $digit_sum;
		}
		return $n;
	}
}

if ( ! function_exists( 'hc_adapter_date_digit_sum' ) ) {
	/**
	 * Doğum tarihinden tüm rakamları toplar (YYYYMMDD üzerinden).
	 */
	function hc_adapter_date_digit_sum( $birth_date ) {
		$ts = strtotime( $birth_date );
		if ( ! $ts ) {
			return null;
		}
		$digits_only = preg_replace( '/\D/', '', gmdate( 'Ymd', $ts ) );
		$sum         = 0;
		foreach ( str_split( $digits_only ) as $d ) {
			$sum += (int) $d;
		}
		return $sum;
	}
}

// -------------------------------------------------------
// Yaşam Yolu Sayısı
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'yasam-yolu-sayisi-hesaplama',
	function ( array $p ) {
		$err = HC_Calculation_API::require_fields( 'yasam-yolu-sayisi-hesaplama', $p, array( 'birth_date' ) );
		if ( $err ) return $err;

		$raw_sum = hc_adapter_date_digit_sum( $p['birth_date'] );
		if ( null === $raw_sum ) {
			return HC_Calculation_API::error( 'yasam-yolu-sayisi-hesaplama', 'invalid_date', 'Geçersiz doğum tarihi.' );
		}

		$life_path = hc_adapter_reduce_to_single( $raw_sum );

		$meanings = array(
			1  => 'Lider, öncü, bağımsız ruh. Kendi yolunu çizmek için doğmuşsun.',
			2  => 'Barışçıl, iş birlikçi, sezgisel. İlişkiler ve denge senin güçlü yönün.',
			3  => 'Yaratıcı, sosyal, ifade gücü yüksek. Sanat ve iletişimde parlar.',
			4  => 'Disiplinli, pratik, güvenilir. Sağlam temeller inşa eder.',
			5  => 'Özgürlük seven, maceracı, uyumlu. Değişim ve çeşitlilik seni besler.',
			6  => 'Şefkatli, sorumlu, aile odaklı. Başkalarına hizmet eder.',
			7  => 'Analitik, mistik, içe dönük. Derin bilgi ve manevi arayış içinde.',
			8  => 'Güçlü, hırslı, maddi başarı odaklı. Liderlik ve güç dinamikleri alanı.',
			9  => 'İnsancıl, idealist, evrensel sevgi. Dünyayı iyileştirmek ister.',
			11 => 'Usta Sayı 11 — Yüksek sezgi, ruhsal farkındalık, ilham veren lider.',
			22 => 'Usta Sayı 22 — Usta inşaatçı, büyük hayaller, pratik gerçekleştirme.',
			33 => 'Usta Sayı 33 — Usta öğretmen, sonsuz şefkat, ilahi hizmet.',
		);

		$desc = $meanings[ $life_path ] ?? 'Yaşam yolu sayın hesaplandı.';
		$is_master = in_array( $life_path, array( 11, 22, 33 ), true );

		return array(
			'title'       => 'Yaşam Yolu Sayısı',
			'value'       => $life_path,
			'unit'        => '',
			'label'       => ( $is_master ? 'Usta Sayı ' : '' ) . $life_path,
			'description' => $desc,
			'warnings'    => array( 'Eğlence ve kişisel farkındalık amaçlıdır.' ),
			'raw'         => array(
				'raw_sum'   => $raw_sum,
				'life_path' => $life_path,
				'is_master' => $is_master,
			),
		);
	}
);

// -------------------------------------------------------
// Kişisel Yıl Sayısı
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'kisisel-yil-sayisi-hesaplama',
	function ( array $p ) {
		$err = HC_Calculation_API::require_fields( 'kisisel-yil-sayisi-hesaplama', $p, array( 'birth_date' ) );
		if ( $err ) return $err;

		$ts = strtotime( $p['birth_date'] );
		if ( ! $ts ) {
			return HC_Calculation_API::error( 'kisisel-yil-sayisi-hesaplama', 'invalid_date', 'Geçersiz doğum tarihi.' );
		}

		$current_year = (int) gmdate( 'Y' );
		$birth_month  = (int) gmdate( 'n', $ts );
		$birth_day    = (int) gmdate( 'j', $ts );

		// Kişisel yıl: doğum ayı + doğum günü + mevcut yıl rakamları toplamı → indirge.
		$year_digits = 0;
		foreach ( str_split( (string) $current_year ) as $d ) {
			$year_digits += (int) $d;
		}
		$month_digits = 0;
		foreach ( str_split( (string) $birth_month ) as $d ) {
			$month_digits += (int) $d;
		}
		$day_digits = 0;
		foreach ( str_split( (string) $birth_day ) as $d ) {
			$day_digits += (int) $d;
		}

		$personal_year = hc_adapter_reduce_to_single( $year_digits + $month_digits + $day_digits );

		$themes = array(
			1  => 'Yeni başlangıçlar, bağımsızlık ve liderlik yılı.',
			2  => 'İş birliği, ilişkiler ve sabır yılı.',
			3  => 'Yaratıcılık, sosyal bağlar ve ifade yılı.',
			4  => 'Çalışma, düzen ve sağlam temeller yılı.',
			5  => 'Değişim, özgürlük ve macera yılı.',
			6  => 'Sorumluluk, aile ve hizmet yılı.',
			7  => 'İç gözlem, manevi gelişim ve analiz yılı.',
			8  => 'Güç, maddi kazanım ve başarı yılı.',
			9  => 'Tamamlanma, bırakma ve dönüşüm yılı.',
			11 => 'Ruhsal uyanış ve ilham yılı (Usta 11).',
			22 => 'Büyük hayallerin gerçekleşme yılı (Usta 22).',
			33 => 'Evrensel sevgi ve hizmet yılı (Usta 33).',
		);

		$desc = $themes[ $personal_year ] ?? '';

		return array(
			'title'       => 'Kişisel Yıl Sayısı',
			'value'       => $personal_year,
			'unit'        => '',
			'label'       => $current_year . ' kişisel yılı: ' . $personal_year,
			'description' => $desc,
			'warnings'    => array( 'Eğlence ve kişisel farkındalık amaçlıdır.' ),
			'raw'         => array(
				'birth_month'   => $birth_month,
				'birth_day'     => $birth_day,
				'current_year'  => $current_year,
				'personal_year' => $personal_year,
			),
		);
	}
);

// -------------------------------------------------------
// Ay Fazı (doğum günündeki / bugünkü)
// -------------------------------------------------------

if ( ! function_exists( 'hc_adapter_moon_phase' ) ) {
	/**
	 * Verilen tarihin sinodik ay içindeki fazını hesaplar.
	 * Referans yeni ay: 2000-01-06 (Julian day tabanlı basit yaklaşım).
	 * Kesin astronomik hesap değil; ±1 gün hata payı olabilir.
	 *
	 * @return array { age_days, phase_index 0-7, phase_name, illumination_pct, symbol }
	 */
	function hc_adapter_moon_phase( $date_str ) {
		$ts = strtotime( $date_str );
		if ( ! $ts ) {
			return null;
		}

		$reference_new_moon = strtotime( '2000-01-06' ); // bilinen yeni ay
		$synodic            = 29.53058867;                // sinodik periyot (gün)

		$diff_days  = ( $ts - $reference_new_moon ) / 86400.0;
		$age_days   = fmod( $diff_days, $synodic );
		if ( $age_days < 0 ) {
			$age_days += $synodic;
		}

		// 8 faz dilimi.
		$phase_names = array(
			array( 'name' => 'Yeni Ay',             'symbol' => '🌑', 'illumination' => 0   ),
			array( 'name' => 'Hilal (Büyüyen)',      'symbol' => '🌒', 'illumination' => 12  ),
			array( 'name' => 'İlk Dördün',           'symbol' => '🌓', 'illumination' => 50  ),
			array( 'name' => 'Şişen Ay (Büyüyen)',   'symbol' => '🌔', 'illumination' => 75  ),
			array( 'name' => 'Dolunay',              'symbol' => '🌕', 'illumination' => 100 ),
			array( 'name' => 'Şişen Ay (Küçülen)',   'symbol' => '🌖', 'illumination' => 75  ),
			array( 'name' => 'Son Dördün',           'symbol' => '🌗', 'illumination' => 50  ),
			array( 'name' => 'Hilal (Küçülen)',      'symbol' => '🌘', 'illumination' => 12  ),
		);

		$phase_index  = (int) floor( $age_days / ( $synodic / 8 ) ) % 8;
		$phase        = $phase_names[ $phase_index ];
		// Daha hassas aydınlanma oranı.
		$illumination = round( ( 1 - cos( 2 * M_PI * $age_days / $synodic ) ) / 2 * 100, 0 );

		return array(
			'age_days'       => round( $age_days, 2 ),
			'phase_index'    => $phase_index,
			'phase_name'     => $phase['name'],
			'symbol'         => $phase['symbol'],
			'illumination'   => (int) $illumination,
		);
	}
}

HC_Calculation_API::register_adapter(
	'ay-fazi-hesaplama',
	function ( array $p ) {
		$err = HC_Calculation_API::require_fields( 'ay-fazi-hesaplama', $p, array( 'birth_date' ) );
		if ( $err ) return $err;

		// Eğer target_date verilmişse onu kullan; yoksa doğum tarihini kullan.
		$target = ! empty( $p['target_date'] ) ? $p['target_date'] : $p['birth_date'];
		$phase  = hc_adapter_moon_phase( $target );

		if ( ! $phase ) {
			return HC_Calculation_API::error( 'ay-fazi-hesaplama', 'invalid_date', 'Geçersiz tarih.' );
		}

		$energies = array(
			'Yeni Ay'             => 'Yeni başlangıçlar, niyet belirleme ve içe dönüş zamanı.',
			'Hilal (Büyüyen)'     => 'Tohumlar atılıyor, ilk adımlar ve umut dönemi.',
			'İlk Dördün'          => 'Karar alma, eylem ve meydan okuma zamanı.',
			'Şişen Ay (Büyüyen)'  => 'Momentum kazanılıyor, enerji yükseliyor ve hedefler netleşiyor.',
			'Dolunay'             => 'Doruk nokta, tamamlanma ve aydınlanma. Duygular yoğunlaşır.',
			'Şişen Ay (Küçülen)'  => 'Minnettarlık, paylaşım ve bilgeliği aktarma zamanı.',
			'Son Dördün'          => 'Bırakma, temizlenme ve eski kalıpları kırma zamanı.',
			'Hilal (Küçülen)'     => 'Dinlenme, yeniden yapılanma ve içe çekilme dönemi.',
		);

		$energy = $energies[ $phase['phase_name'] ] ?? '';

		return array(
			'title'       => 'Ay Fazı',
			'value'       => $phase['phase_name'],
			'unit'        => '',
			'label'       => $phase['symbol'] . ' ' . $phase['phase_name'] . ' — %' . $phase['illumination'] . ' aydınlanma',
			'description' => $energy,
			'warnings'    => array( 'Eğlence ve kişisel farkındalık amaçlıdır. Astronomik kesinlik ±1 gün hata payı içerebilir.' ),
			'raw'         => $phase,
		);
	}
);
