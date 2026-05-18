<?php
/**
 * Kişisel sembolik / astro / numeroloji adapterleri.
 * Eğlence ve kişisel farkındalık amaçlıdır.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// -------------------------------------------------------
// Çin Burcu yardımcısı
// -------------------------------------------------------

if ( ! function_exists( 'hc_adapter_chinese_zodiac_data' ) ) {
	function hc_adapter_chinese_zodiac_data( $birth_date ) {
		$ts = strtotime( $birth_date );
		if ( ! $ts ) {
			return null;
		}
		$year = (int) gmdate( 'Y', $ts );
		// 1900 = Sıçan yılı referansı; modül 12
		$idx = ( $year - 1900 ) % 12;
		if ( $idx < 0 ) {
			$idx += 12;
		}
		$signs = array(
			array( 'name' => 'Sıçan',   'traits' => 'Zeki, çevik, uyumlu ve fırsatçı.', 'symbol' => '🐀' ),
			array( 'name' => 'Öküz',    'traits' => 'Çalışkan, güvenilir, sabırlı ve kararlı.', 'symbol' => '🐂' ),
			array( 'name' => 'Kaplan',  'traits' => 'Cesur, karizmatik, tuttuğunu koparan.', 'symbol' => '🐅' ),
			array( 'name' => 'Tavşan',  'traits' => 'Zarif, nazik, sezgisel ve barışçıl.', 'symbol' => '🐇' ),
			array( 'name' => 'Ejderha', 'traits' => 'Güçlü, kararlı, şanslı ve hırslı.', 'symbol' => '🐉' ),
			array( 'name' => 'Yılan',   'traits' => 'Bilge, gizemli, sezgisel ve analitik.', 'symbol' => '🐍' ),
			array( 'name' => 'At',      'traits' => 'Özgür ruhlu, enerjik, bağımsız.', 'symbol' => '🐎' ),
			array( 'name' => 'Keçi',    'traits' => 'Sanatçı, empati sahibi, yaratıcı.', 'symbol' => '🐐' ),
			array( 'name' => 'Maymun',  'traits' => 'Zeki, yaratıcı, eğlenceli ve hızlı öğrenen.', 'symbol' => '🐒' ),
			array( 'name' => 'Horoz',   'traits' => 'Dürüst, titiz, güvenilir ve gözlemci.', 'symbol' => '🐓' ),
			array( 'name' => 'Köpek',   'traits' => 'Sadık, dürüst, koruyucu ve adil.', 'symbol' => '🐕' ),
			array( 'name' => 'Domuz',   'traits' => 'Cömert, dürüst, şefkatli ve neşeli.', 'symbol' => '🐖' ),
		);
		return array_merge( $signs[ $idx ], array( 'index' => $idx, 'year' => $year ) );
	}
}

// -------------------------------------------------------
// Çin Elementi yardımcısı
// -------------------------------------------------------

if ( ! function_exists( 'hc_adapter_chinese_element_data' ) ) {
	function hc_adapter_chinese_element_data( $birth_date ) {
		$ts = strtotime( $birth_date );
		if ( ! $ts ) {
			return null;
		}
		$year = (int) gmdate( 'Y', $ts );
		// 1900 = Metal; 5 element × 2 yıl = 10 yıl döngüsü
		$idx = ( $year - 1900 ) % 10;
		if ( $idx < 0 ) {
			$idx += 10;
		}
		$elements = array(
			array( 'name' => 'Metal',  'desc' => 'Kararlı, güçlü, dayanıklı ve disiplinli.' ),
			array( 'name' => 'Metal',  'desc' => 'Kararlı, güçlü, dayanıklı ve disiplinli.' ),
			array( 'name' => 'Su',     'desc' => 'Akışkan, uyumlu, sezgisel ve iletişimci.' ),
			array( 'name' => 'Su',     'desc' => 'Akışkan, uyumlu, sezgisel ve iletişimci.' ),
			array( 'name' => 'Ahşap',  'desc' => 'Yaratıcı, büyüme odaklı, esnek ve nazik.' ),
			array( 'name' => 'Ahşap',  'desc' => 'Yaratıcı, büyüme odaklı, esnek ve nazik.' ),
			array( 'name' => 'Ateş',   'desc' => 'Tutkulu, dinamik, lider ruhlu ve enerjik.' ),
			array( 'name' => 'Ateş',   'desc' => 'Tutkulu, dinamik, lider ruhlu ve enerjik.' ),
			array( 'name' => 'Toprak', 'desc' => 'Güvenilir, besleyici, sabırlı ve pratik.' ),
			array( 'name' => 'Toprak', 'desc' => 'Güvenilir, besleyici, sabırlı ve pratik.' ),
		);
		return array_merge( $elements[ $idx ], array( 'year' => $year ) );
	}
}

// -------------------------------------------------------
// Burç dekan yardımcısı (zodiac sign + day_within_sign)
// -------------------------------------------------------

if ( ! function_exists( 'hc_adapter_get_decan' ) ) {
	function hc_adapter_get_decan( $birth_date ) {
		$ts = strtotime( $birth_date );
		if ( ! $ts ) {
			return null;
		}
		$m    = (int) gmdate( 'n', $ts );
		$d    = (int) gmdate( 'j', $ts );
		$year = (int) gmdate( 'Y', $ts );

		// Her burç için başlangıç ayı ve günü
		$sign_starts = array(
			'Koç'     => array( 3, 21 ),
			'Boğa'    => array( 4, 20 ),
			'İkizler' => array( 5, 21 ),
			'Yengeç'  => array( 6, 21 ),
			'Aslan'   => array( 7, 23 ),
			'Başak'   => array( 8, 23 ),
			'Terazi'  => array( 9, 23 ),
			'Akrep'   => array( 10, 23 ),
			'Yay'     => array( 11, 22 ),
			'Oğlak'   => array( 12, 22 ),
			'Kova'    => array( 1, 20 ),
			'Balık'   => array( 2, 19 ),
		);

		// Burç tespiti (mevcut yardımcı fonksiyondan)
		$sign = hc_adapter_get_zodiac_data( $birth_date );
		if ( ! $sign ) {
			return null;
		}
		$sign_name = $sign['name'];

		list( $sm, $sd ) = $sign_starts[ $sign_name ];

		// Oğlak Ocak-başı doğumları için başlangıç önceki yıl Aralık
		if ( 'Oğlak' === $sign_name && $m <= 1 ) {
			$start_ts = strtotime( ( $year - 1 ) . '-12-22' );
		} else {
			$start_ts = strtotime( $year . '-' . str_pad( $sm, 2, '0', STR_PAD_LEFT ) . '-' . str_pad( $sd, 2, '0', STR_PAD_LEFT ) );
		}

		$day_within = (int) floor( ( $ts - $start_ts ) / 86400 );
		$decan_num  = ( $day_within < 10 ) ? 1 : ( ( $day_within < 20 ) ? 2 : 3 );

		// Her burç için dekan yönetici burçları (aynı element döngüsü)
		$decan_rulers = array(
			'Koç'     => array( 'Koç', 'Aslan', 'Yay' ),
			'Boğa'    => array( 'Boğa', 'Başak', 'Oğlak' ),
			'İkizler' => array( 'İkizler', 'Terazi', 'Kova' ),
			'Yengeç'  => array( 'Yengeç', 'Akrep', 'Balık' ),
			'Aslan'   => array( 'Aslan', 'Yay', 'Koç' ),
			'Başak'   => array( 'Başak', 'Oğlak', 'Boğa' ),
			'Terazi'  => array( 'Terazi', 'Kova', 'İkizler' ),
			'Akrep'   => array( 'Akrep', 'Balık', 'Yengeç' ),
			'Yay'     => array( 'Yay', 'Koç', 'Aslan' ),
			'Oğlak'   => array( 'Oğlak', 'Boğa', 'Başak' ),
			'Kova'    => array( 'Kova', 'İkizler', 'Terazi' ),
			'Balık'   => array( 'Balık', 'Yengeç', 'Akrep' ),
		);

		$ordinals = array( 1 => '1. Dekan', 2 => '2. Dekan', 3 => '3. Dekan' );
		$ruler    = isset( $decan_rulers[ $sign_name ] ) ? $decan_rulers[ $sign_name ][ $decan_num - 1 ] : $sign_name;

		return array(
			'sign'        => $sign_name,
			'decan'       => $decan_num,
			'decan_label' => $ordinals[ $decan_num ],
			'ruler_sign'  => $ruler,
			'day_within'  => $day_within,
		);
	}
}

// -------------------------------------------------------
// Çin Burcu
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'cin-burcu-hesaplama',
	function ( array $p ) {
		$err = HC_Calculation_API::require_fields( 'cin-burcu-hesaplama', $p, array( 'birth_date' ) );
		if ( $err ) {
			return $err;
		}
		$data = hc_adapter_chinese_zodiac_data( $p['birth_date'] );
		if ( ! $data ) {
			return HC_Calculation_API::error( 'cin-burcu-hesaplama', 'invalid_date', 'Geçersiz doğum tarihi.' );
		}
		return array(
			'title'       => 'Çin Burcu',
			'value'       => $data['symbol'] . ' ' . $data['name'],
			'unit'        => '',
			'label'       => $data['year'] . ' — ' . $data['name'],
			'description' => $data['traits'],
			'warnings'    => array( 'Eğlence ve kişisel farkındalık amaçlıdır. Çin yeni yılı Ocak-Şubat arasında olduğundan bu dönemde doğanlarda ±1 yıl fark oluşabilir.' ),
			'raw'         => $data,
		);
	}
);

// -------------------------------------------------------
// Çin Elementi
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'cin-elementi-hesaplama',
	function ( array $p ) {
		$err = HC_Calculation_API::require_fields( 'cin-elementi-hesaplama', $p, array( 'birth_date' ) );
		if ( $err ) {
			return $err;
		}
		$data = hc_adapter_chinese_element_data( $p['birth_date'] );
		if ( ! $data ) {
			return HC_Calculation_API::error( 'cin-elementi-hesaplama', 'invalid_date', 'Geçersiz doğum tarihi.' );
		}
		return array(
			'title'       => 'Çin Elementi',
			'value'       => $data['name'],
			'unit'        => '',
			'label'       => $data['year'] . ' — ' . $data['name'] . ' elementi',
			'description' => $data['desc'],
			'warnings'    => array( 'Eğlence ve kişisel farkındalık amaçlıdır.' ),
			'raw'         => $data,
		);
	}
);

// -------------------------------------------------------
// Doğum Günü Sayısı (Numeroloji)
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'dogum-gunu-sayisi-hesaplama',
	function ( array $p ) {
		$err = HC_Calculation_API::require_fields( 'dogum-gunu-sayisi-hesaplama', $p, array( 'birth_date' ) );
		if ( $err ) {
			return $err;
		}
		$ts = strtotime( $p['birth_date'] );
		if ( ! $ts ) {
			return HC_Calculation_API::error( 'dogum-gunu-sayisi-hesaplama', 'invalid_date', 'Geçersiz doğum tarihi.' );
		}
		$birth_day   = (int) gmdate( 'j', $ts );
		$raw_day_str = (string) $birth_day;

		// Rakamları tek basamağa indir; 11 ve 22 usta sayı olarak koru
		$n = $birth_day;
		while ( $n > 9 && ! in_array( $n, array( 11, 22 ), true ) ) {
			$sum = 0;
			foreach ( str_split( (string) $n ) as $digit ) {
				$sum += (int) $digit;
			}
			$n = $sum;
		}

		$meanings = array(
			1  => 'Doğal lider, öncü ruh. Özgün fikirler ve bağımsız irade.',
			2  => 'Hassas, diplomatik, iş birliğine yatkın. Arabulucu ruhlu.',
			3  => 'Yaratıcı, sosyal, ifade gücü yüksek. Sanata ve iletişime ilgili.',
			4  => 'Güvenilir, çalışkan, pratik. Sağlam temeller atar.',
			5  => 'Maceracı, özgür ruhlu, değişimi sever. Uyumlu ve çevik.',
			6  => 'Şefkatli, koruyucu, aile odaklı. Sorumluluk duygusu güçlü.',
			7  => 'Mistik, analitik, içe dönük. Derin araştırmacı ruh.',
			8  => 'Hırslı, güçlü, maddi başarıya odaklı. Liderlik yeteneği.',
			9  => 'İnsancıl, idealist, evrensel sevgi. Dünyayı daha iyi yapmak ister.',
			11 => 'Usta Sayı 11 — Yüksek sezgi, ilham veren, ruhsal rehber.',
			22 => 'Usta Sayı 22 — Büyük hayalleri hayata geçiren pratik mimar.',
		);

		$is_master = in_array( $n, array( 11, 22 ), true );
		$desc      = $meanings[ $n ] ?? '';

		return array(
			'title'       => 'Doğum Günü Sayısı',
			'value'       => $n,
			'unit'        => '',
			'label'       => ( $is_master ? 'Usta Sayı ' : '' ) . $n . ' (doğum günü: ' . $birth_day . ')',
			'description' => $desc,
			'warnings'    => array( 'Eğlence ve kişisel farkındalık amaçlıdır.' ),
			'raw'         => array(
				'birth_day'  => $birth_day,
				'reduced'    => $n,
				'is_master'  => $is_master,
			),
		);
	}
);

// -------------------------------------------------------
// Doğum Günü Hesaplayıcı (yaş, gün, sonraki doğum günü)
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'dogum-gunu-hesaplayici',
	function ( array $p ) {
		$err = HC_Calculation_API::require_fields( 'dogum-gunu-hesaplayici', $p, array( 'birth_date' ) );
		if ( $err ) {
			return $err;
		}
		$birth_ts = strtotime( $p['birth_date'] );
		if ( ! $birth_ts ) {
			return HC_Calculation_API::error( 'dogum-gunu-hesaplayici', 'invalid_date', 'Geçersiz doğum tarihi.' );
		}

		$today_ts   = strtotime( gmdate( 'Y-m-d' ) );
		$birth_year = (int) gmdate( 'Y', $birth_ts );
		$birth_mon  = (int) gmdate( 'n', $birth_ts );
		$birth_day  = (int) gmdate( 'j', $birth_ts );
		$today_year = (int) gmdate( 'Y' );
		$today_mon  = (int) gmdate( 'n' );
		$today_day  = (int) gmdate( 'j' );

		// Yaş hesaplama
		$age = $today_year - $birth_year;
		if ( $today_mon < $birth_mon || ( $today_mon === $birth_mon && $today_day < $birth_day ) ) {
			$age--;
		}

		// Toplam gün sayısı
		$total_days = (int) round( ( $today_ts - $birth_ts ) / 86400 );

		// Sonraki doğum günü
		$next_bday_year = $today_year;
		$next_bday_ts   = strtotime( $next_bday_year . '-' . str_pad( $birth_mon, 2, '0', STR_PAD_LEFT ) . '-' . str_pad( $birth_day, 2, '0', STR_PAD_LEFT ) );
		if ( $next_bday_ts <= $today_ts ) {
			$next_bday_year++;
			$next_bday_ts = strtotime( $next_bday_year . '-' . str_pad( $birth_mon, 2, '0', STR_PAD_LEFT ) . '-' . str_pad( $birth_day, 2, '0', STR_PAD_LEFT ) );
		}
		$days_until = (int) round( ( $next_bday_ts - $today_ts ) / 86400 );

		// Doğduğu gün haftanın kaçıncı günü
		$tr_days = array( 'Pazar', 'Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi' );
		$dow     = (int) gmdate( 'w', $birth_ts );

		return array(
			'title'       => 'Doğum Günü Bilgileri',
			'value'       => $age,
			'unit'        => 'yaş',
			'label'       => $age . ' yaş — ' . $days_until . ' gün sonra yeni yaş',
			'description' => $total_days . ' gündür bu dünyadasın. ' . $tr_days[ $dow ] . ' günü doğdun. Sonraki doğum günün ' . $days_until . ' gün sonra.',
			'warnings'    => array( 'Eğlence ve kişisel farkındalık amaçlıdır.' ),
			'raw'         => array(
				'age'         => $age,
				'total_days'  => $total_days,
				'days_until'  => $days_until,
				'born_weekday' => $tr_days[ $dow ],
				'next_birthday_year' => $next_bday_year,
			),
		);
	}
);

// -------------------------------------------------------
// Burç Dekanı
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'burc-dekani-hesaplama',
	function ( array $p ) {
		$err = HC_Calculation_API::require_fields( 'burc-dekani-hesaplama', $p, array( 'birth_date' ) );
		if ( $err ) {
			return $err;
		}
		$data = hc_adapter_get_decan( $p['birth_date'] );
		if ( ! $data ) {
			return HC_Calculation_API::error( 'burc-dekani-hesaplama', 'invalid_date', 'Geçersiz doğum tarihi.' );
		}

		$desc = $data['sign'] . ' burcunun ' . $data['decan_label'] . ' aralığında doğdun. '
			. 'Bu dekanda ' . $data['ruler_sign'] . ' enerjisi güçlü biçimde hissedilir.';

		return array(
			'title'       => 'Burç Dekanı',
			'value'       => $data['decan'],
			'unit'        => '. Dekan',
			'label'       => $data['sign'] . ' — ' . $data['decan_label'] . ' (' . $data['ruler_sign'] . ' etkisi)',
			'description' => $desc,
			'warnings'    => array( 'Eğlence ve kişisel farkındalık amaçlıdır.' ),
			'raw'         => $data,
		);
	}
);

// -------------------------------------------------------
// Burç Derecesi
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'burc-derecesi-hesaplama',
	function ( array $p ) {
		$err = HC_Calculation_API::require_fields( 'burc-derecesi-hesaplama', $p, array( 'birth_date' ) );
		if ( $err ) {
			return $err;
		}
		$data = hc_adapter_get_decan( $p['birth_date'] );
		if ( ! $data ) {
			return HC_Calculation_API::error( 'burc-derecesi-hesaplama', 'invalid_date', 'Geçersiz doğum tarihi.' );
		}

		// Derece tahmini: burç içindeki gün sayısı (0-29°)
		$degree = min( 29, $data['day_within'] );

		// Modalite etkisi dereceye göre
		if ( $degree < 10 ) {
			$modality_note = 'Burç enerjisi yoğun ve ham biçimde yaşanır.';
		} elseif ( $degree < 20 ) {
			$modality_note = 'Burç enerjisi olgunlaşmış ve sabitleşmiş haldedir.';
		} else {
			$modality_note = 'Burç enerjisi esnek; bir sonraki burca geçiş rengi taşır.';
		}

		return array(
			'title'       => 'Burç Derecesi',
			'value'       => $degree,
			'unit'        => '°',
			'label'       => $data['sign'] . ' ' . $degree . '° — ' . $data['decan_label'],
			'description' => $modality_note,
			'warnings'    => array( 'Eğlence ve kişisel farkındalık amaçlıdır. Kesin derece hesabı için doğum saati ve yeri gereklidir.' ),
			'raw'         => array_merge( $data, array( 'degree' => $degree ) ),
		);
	}
);

// -------------------------------------------------------
// Güneş Burcu
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'gunes-burcu-hesaplama',
	function ( array $p ) {
		$err = HC_Calculation_API::require_fields( 'gunes-burcu-hesaplama', $p, array( 'birth_date' ) );
		if ( $err ) {
			return $err;
		}
		$sign = hc_adapter_get_zodiac_data( $p['birth_date'] );
		if ( ! $sign ) {
			return HC_Calculation_API::error( 'gunes-burcu-hesaplama', 'invalid_date', 'Geçersiz doğum tarihi.' );
		}

		$element_chars = array(
			'Ateş'   => 'Ateşli, tutkulu, girişken enerji.',
			'Toprak' => 'Pratik, kararlı, güvenilir zemin.',
			'Hava'   => 'Analitik, sosyal, iletişim odaklı.',
			'Su'     => 'Duygusal, sezgisel, derin hisseden.',
		);
		$polarity_note = 'Pozitif' === $sign['polarity'] ? 'Dışa dönük (Yang) enerji.' : 'İçe dönük (Yin) enerji.';

		return array(
			'title'       => 'Güneş Burcu',
			'value'       => $sign['symbol'] . ' ' . $sign['name'],
			'unit'        => '',
			'label'       => $sign['name'] . ' — ' . $sign['element'] . ' grubu',
			'description' => ( $element_chars[ $sign['element'] ] ?? '' ) . ' ' . $polarity_note,
			'warnings'    => array( 'Eğlence ve kişisel farkındalık amaçlıdır.' ),
			'raw'         => $sign,
		);
	}
);

// -------------------------------------------------------
// Aura Rengi (yaşam yolu sayısına göre)
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'aura-rengi-hesaplama',
	function ( array $p ) {
		$err = HC_Calculation_API::require_fields( 'aura-rengi-hesaplama', $p, array( 'birth_date' ) );
		if ( $err ) {
			return $err;
		}
		// Yaşam yolu sayısını hesapla (numeroloji yardımcısından)
		$raw_sum = hc_adapter_date_digit_sum( $p['birth_date'] );
		if ( null === $raw_sum ) {
			return HC_Calculation_API::error( 'aura-rengi-hesaplama', 'invalid_date', 'Geçersiz doğum tarihi.' );
		}
		$life_path = hc_adapter_reduce_to_single( $raw_sum );

		$auras = array(
			1  => array( 'color' => 'Kırmızı',       'desc' => 'Güç, liderlik ve cesaret enerjisi taşır. Hızlı hareket eder, öncülük eder.' ),
			2  => array( 'color' => 'Turuncu',        'desc' => 'Yaratıcılık, duygusallık ve sıcaklık. İlişkilerde güçlü bir bağ kurar.' ),
			3  => array( 'color' => 'Sarı',           'desc' => 'Zeka, neşe ve iletişim. Işıltılı ve enerjik bir kişilik.' ),
			4  => array( 'color' => 'Yeşil',          'desc' => 'Büyüme, denge ve iyileşme. Doğayla güçlü bir bağ vardır.' ),
			5  => array( 'color' => 'Turkuaz Mavi',   'desc' => 'Özgürlük, ifade ve uyum. Değişimi kolayca kucaklar.' ),
			6  => array( 'color' => 'İndigo',         'desc' => 'Sezgi, koruma ve hizmet. Derin bir sevgi ve empati barındırır.' ),
			7  => array( 'color' => 'Mor',            'desc' => 'Ruhsallık, mistisizm ve iç bilgelik. Derin araştırmacı ruh.' ),
			8  => array( 'color' => 'Altın',          'desc' => 'Başarı, güç ve bolluk. Maddi ve manevi zenginlik arayışı.' ),
			9  => array( 'color' => 'Beyaz / Gümüş', 'desc' => 'Evrensel şefkat, saflık ve dönüşüm. İnsanlığa hizmet eder.' ),
			11 => array( 'color' => 'Gümüş',          'desc' => 'Yüksek sezgi ve ruhsal kanal. İlham kaynağı, ışık taşıyıcı.' ),
			22 => array( 'color' => 'Altın / Pembe',  'desc' => 'Büyük hayaller ve somut gerçekleşme. Usta inşaatçı enerjisi.' ),
			33 => array( 'color' => 'Mor / Altın',    'desc' => 'Evrensel öğretmen enerjisi. Sonsuz şefkat ve ilahi hizmet.' ),
		);

		$aura = $auras[ $life_path ] ?? array( 'color' => 'Çok Renkli', 'desc' => 'Kompleks, çok katmanlı enerji.' );

		return array(
			'title'       => 'Aura Rengi',
			'value'       => $aura['color'],
			'unit'        => '',
			'label'       => $aura['color'] . ' (Yaşam Yolu: ' . $life_path . ')',
			'description' => $aura['desc'],
			'warnings'    => array( 'Eğlence ve kişisel farkındalık amaçlıdır.' ),
			'raw'         => array( 'life_path' => $life_path, 'raw_sum' => $raw_sum ),
		);
	}
);

// -------------------------------------------------------
// Doğum Tarot Kartı (Major Arcana)
// -------------------------------------------------------

if ( ! function_exists( 'hc_adapter_major_arcana' ) ) {
	function hc_adapter_major_arcana() {
		return array(
			1  => array( 'name' => 'Büyücü',           'theme' => 'İrade, beceri ve manifestasyon gücü.' ),
			2  => array( 'name' => 'Yüksek Rahibe',    'theme' => 'Sezgi, gizem ve içsel bilgelik.' ),
			3  => array( 'name' => 'İmparatoriçe',     'theme' => 'Bereket, yaratıcılık ve doğa bağı.' ),
			4  => array( 'name' => 'İmparator',        'theme' => 'Otorite, yapı ve kararlılık.' ),
			5  => array( 'name' => 'Hiyerofant',       'theme' => 'Gelenek, rehberlik ve maneviyat.' ),
			6  => array( 'name' => 'Aşıklar',          'theme' => 'Seçimler, bağlantı ve kalp yolu.' ),
			7  => array( 'name' => 'Savaş Arabası',    'theme' => 'Zafer, odak ve ilerleyiş.' ),
			8  => array( 'name' => 'Güç',              'theme' => 'İç güç, sabır ve cesaret.' ),
			9  => array( 'name' => 'Münzevi',          'theme' => 'İçe dönüş, arayış ve bilgelik.' ),
			10 => array( 'name' => 'Kader Çarkı',      'theme' => 'Döngüler, şans ve değişim.' ),
			11 => array( 'name' => 'Adalet',           'theme' => 'Denge, hakikat ve sorumluluk.' ),
			12 => array( 'name' => 'Asılı Adam',       'theme' => 'Bırakma, bakış açısı ve fedakarlık.' ),
			13 => array( 'name' => 'Ölüm',             'theme' => 'Dönüşüm, son ve yeni başlangıç.' ),
			14 => array( 'name' => 'Denge',            'theme' => 'Sabır, uyum ve orta yol.' ),
			15 => array( 'name' => 'Şeytan',           'theme' => 'Bağımlılık, zincirler ve özgürleşme.' ),
			16 => array( 'name' => 'Kule',             'theme' => 'Ani değişim, yıkım ve aydınlanma.' ),
			17 => array( 'name' => 'Yıldız',           'theme' => 'Umut, ilham ve ruhsal yenilenme.' ),
			18 => array( 'name' => 'Ay',               'theme' => 'Bilinçdışı, yanılsama ve sezgi.' ),
			19 => array( 'name' => 'Güneş',            'theme' => 'Neşe, enerji ve başarı.' ),
			20 => array( 'name' => 'Yargı',            'theme' => 'Uyanış, yenilenme ve çağrı.' ),
			21 => array( 'name' => 'Dünya',            'theme' => 'Tamamlanma, bütünlük ve başarı.' ),
			22 => array( 'name' => 'Deli',             'theme' => 'Yeni yolculuk, özgürlük ve sonsuz potansiyel.' ),
		);
	}
}

HC_Calculation_API::register_adapter(
	'dogum-tarot-karti-hesaplama',
	function ( array $p ) {
		$err = HC_Calculation_API::require_fields( 'dogum-tarot-karti-hesaplama', $p, array( 'birth_date' ) );
		if ( $err ) {
			return $err;
		}
		$ts = strtotime( $p['birth_date'] );
		if ( ! $ts ) {
			return HC_Calculation_API::error( 'dogum-tarot-karti-hesaplama', 'invalid_date', 'Geçersiz doğum tarihi.' );
		}

		// Tüm rakamları topla (YYYYMMDD)
		$digits_str = preg_replace( '/\D/', '', gmdate( 'Ymd', $ts ) );
		$sum        = 0;
		foreach ( str_split( $digits_str ) as $d ) {
			$sum += (int) $d;
		}

		// 1-22 aralığına indir
		while ( $sum > 22 ) {
			$new = 0;
			foreach ( str_split( (string) $sum ) as $d ) {
				$new += (int) $d;
			}
			$sum = $new;
		}
		if ( 0 === $sum ) {
			$sum = 22; // Deli
		}

		$arcana = hc_adapter_major_arcana();
		$card   = $arcana[ $sum ] ?? array( 'name' => 'Deli', 'theme' => 'Yeni yolculuk ve sonsuz potansiyel.' );

		return array(
			'title'       => 'Doğum Tarot Kartı',
			'value'       => $card['name'],
			'unit'        => '',
			'label'       => 'Major Arcana #' . $sum . ' — ' . $card['name'],
			'description' => $card['theme'],
			'warnings'    => array( 'Eğlence ve kişisel farkındalık amaçlıdır.' ),
			'raw'         => array( 'card_number' => $sum, 'card_name' => $card['name'] ),
		);
	}
);

// -------------------------------------------------------
// Aşk Tarot Kartı (ay + gün toplamı tabanlı)
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'ask-tarot-karti-hesaplama',
	function ( array $p ) {
		$err = HC_Calculation_API::require_fields( 'ask-tarot-karti-hesaplama', $p, array( 'birth_date' ) );
		if ( $err ) {
			return $err;
		}
		$ts = strtotime( $p['birth_date'] );
		if ( ! $ts ) {
			return HC_Calculation_API::error( 'ask-tarot-karti-hesaplama', 'invalid_date', 'Geçersiz doğum tarihi.' );
		}

		// Aşk sayısı: doğum ayı + doğum günü rakamları toplamı → 1-22
		$month = (int) gmdate( 'n', $ts );
		$day   = (int) gmdate( 'j', $ts );
		$sum   = 0;
		foreach ( str_split( (string) $month . (string) $day ) as $d ) {
			$sum += (int) $d;
		}

		while ( $sum > 22 ) {
			$new = 0;
			foreach ( str_split( (string) $sum ) as $d ) {
				$new += (int) $d;
			}
			$sum = $new;
		}
		if ( 0 === $sum ) {
			$sum = 22;
		}

		$arcana = hc_adapter_major_arcana();
		$card   = $arcana[ $sum ] ?? array( 'name' => 'Deli', 'theme' => 'Yeni yolculuk ve sonsuz potansiyel.' );

		return array(
			'title'       => 'Aşk Tarot Kartı',
			'value'       => $card['name'],
			'unit'        => '',
			'label'       => 'Aşk Kartı — ' . $card['name'],
			'description' => 'Aşk ve ilişki enerjin: ' . $card['theme'],
			'warnings'    => array( 'Eğlence ve kişisel farkındalık amaçlıdır.' ),
			'raw'         => array( 'card_number' => $sum, 'card_name' => $card['name'], 'month' => $month, 'day' => $day ),
		);
	}
);
