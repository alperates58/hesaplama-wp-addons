<?php
/**
 * Genişletilmiş astroloji adapterleri.
 * Çin burcu, yıllık Çin burcu ve sidereal burç hesaplamaları.
 * Eğlence ve kişisel farkındalık amaçlıdır.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// -------------------------------------------------------
// Çin Burcu (Yıl Burcu) — CNY tablosu + (yıl-1900) % 12
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'cin-burcu-yili-hesaplama',
	function ( array $p ) {
		$slug = 'cin-burcu-yili-hesaplama';
		$err  = HC_Calculation_API::require_fields( $slug, $p, array( 'birth_date' ) );
		if ( $err ) {
			return $err;
		}

		$ts = strtotime( $p['birth_date'] );
		if ( ! $ts ) {
			return HC_Calculation_API::error( $slug, 'invalid_date', 'Geçersiz doğum tarihi.' );
		}

		$year  = (int) gmdate( 'Y', $ts );
		$month = (int) gmdate( 'n', $ts );
		$day   = (int) gmdate( 'j', $ts );

		// Çin Yeni Yılı başlangıç tarihleri (1920-2030)
		$cny_dates = array(
			1920 => '1920-02-20', 1921 => '1921-02-08', 1922 => '1922-01-28', 1923 => '1923-02-16', 1924 => '1924-02-05',
			1925 => '1925-01-24', 1926 => '1926-02-13', 1927 => '1927-02-02', 1928 => '1928-01-23', 1929 => '1929-02-10',
			1930 => '1930-01-30', 1931 => '1931-02-17', 1932 => '1932-02-06', 1933 => '1933-01-26', 1934 => '1934-02-14',
			1935 => '1935-02-04', 1936 => '1936-01-24', 1937 => '1937-02-11', 1938 => '1938-01-31', 1939 => '1939-02-19',
			1940 => '1940-02-08', 1941 => '1941-01-27', 1942 => '1942-02-15', 1943 => '1943-02-05', 1944 => '1944-01-25',
			1945 => '1945-02-13', 1946 => '1946-02-02', 1947 => '1947-01-22', 1948 => '1948-02-10', 1949 => '1949-01-29',
			1950 => '1950-02-17', 1951 => '1951-02-06', 1952 => '1952-01-27', 1953 => '1953-02-14', 1954 => '1954-02-03',
			1955 => '1955-01-24', 1956 => '1956-02-12', 1957 => '1957-01-31', 1958 => '1958-02-18', 1959 => '1959-02-08',
			1960 => '1960-01-28', 1961 => '1961-02-15', 1962 => '1962-02-05', 1963 => '1963-01-25', 1964 => '1964-02-13',
			1965 => '1965-02-02', 1966 => '1966-01-21', 1967 => '1967-02-09', 1968 => '1968-01-30', 1969 => '1969-02-17',
			1970 => '1970-02-06', 1971 => '1971-01-27', 1972 => '1972-02-15', 1973 => '1973-02-03', 1974 => '1974-01-23',
			1975 => '1975-02-11', 1976 => '1976-01-31', 1977 => '1977-02-18', 1978 => '1978-02-07', 1979 => '1979-01-28',
			1980 => '1980-02-16', 1981 => '1981-02-05', 1982 => '1982-01-25', 1983 => '1983-02-13', 1984 => '1984-02-02',
			1985 => '1985-02-20', 1986 => '1986-02-09', 1987 => '1987-01-29', 1988 => '1988-02-17', 1989 => '1989-02-06',
			1990 => '1990-01-27', 1991 => '1991-02-15', 1992 => '1992-02-04', 1993 => '1993-01-23', 1994 => '1994-02-10',
			1995 => '1995-01-31', 1996 => '1996-02-19', 1997 => '1997-02-07', 1998 => '1998-01-28', 1999 => '1999-02-16',
			2000 => '2000-02-05', 2001 => '2001-01-24', 2002 => '2002-02-12', 2003 => '2003-02-01', 2004 => '2004-01-22',
			2005 => '2005-02-09', 2006 => '2006-01-29', 2007 => '2007-02-18', 2008 => '2008-02-07', 2009 => '2009-01-26',
			2010 => '2010-02-14', 2011 => '2011-02-03', 2012 => '2012-01-23', 2013 => '2013-02-10', 2014 => '2014-01-31',
			2015 => '2015-02-19', 2016 => '2016-02-08', 2017 => '2017-01-28', 2018 => '2018-02-16', 2019 => '2019-02-05',
			2020 => '2020-01-25', 2021 => '2021-02-12', 2022 => '2022-02-01', 2023 => '2023-01-22', 2024 => '2024-02-10',
			2025 => '2025-01-29', 2026 => '2026-02-17', 2027 => '2027-02-06', 2028 => '2028-01-26', 2029 => '2029-02-13',
			2030 => '2030-02-03',
		);

		// Doğum CNY'den önce mi? → bir önceki yılın hayvanı
		$effective_year = $year;
		if ( isset( $cny_dates[ $year ] ) ) {
			$cny_ts = strtotime( $cny_dates[ $year ] );
			if ( $ts < $cny_ts ) {
				$effective_year = $year - 1;
			}
		} else {
			// Tablo dışı tarihler için 30 Ocak fallback
			$cny_fallback = strtotime( $year . '-01-30' );
			if ( $ts < $cny_fallback ) {
				$effective_year = $year - 1;
			}
		}

		// Fare 1900 → index 0 (1900 % 12 = 4, Fare = index 0 → offset = (year - 1900) % 12)
		$animals = array(
			array( 'name' => 'Fare',    'traits' => 'Akıllı, uyumlu ve cana yakın. Zekaları ve fırsatları değerlendirme yetenekleriyle tanınırlar.' ),
			array( 'name' => 'Öküz',    'traits' => 'Güvenilir, sabırlı ve çalışkan. Azimli ve kararlı yapılarıyla her türlü zorluğun üstesinden gelirler.' ),
			array( 'name' => 'Kaplan',  'traits' => 'Cesur, enerjik ve lider ruhlu. Macerayı severler ve girdikleri her ortamda dikkatleri üzerine çekerler.' ),
			array( 'name' => 'Tavşan',  'traits' => 'Zarif, nazik ve hassas. Barışçıl doğaları ve sanata olan yatkınlıklarıyla bilinirler.' ),
			array( 'name' => 'Ejderha', 'traits' => 'Güçlü, gururlu ve karizmatik. Çin astrolojisinin en şanslı burcu kabul edilir, büyük idealleri vardır.' ),
			array( 'name' => 'Yılan',   'traits' => 'Bilge, gizemli ve sezgisel. Derin düşünürler ve çevrelerindeki olayları çok iyi analiz ederler.' ),
			array( 'name' => 'At',      'traits' => 'Özgür ruhlu, enerjik ve bağımsız. Gezmeyi severler ve bitmek bilmeyen bir yaşam enerjisine sahiptirler.' ),
			array( 'name' => 'Keçi',    'traits' => 'Yaratıcı, şefkatli ve zarif. Duygusal derinlikleri ve estetik bakış açılarıyla öne çıkarlar.' ),
			array( 'name' => 'Maymun',  'traits' => 'Eğlenceli, zeki ve meraklı. Problem çözme yetenekleri ve neşeli tavırlarıyla sosyal ortamlarda çok sevilirler.' ),
			array( 'name' => 'Horoz',   'traits' => 'Dürüst, titiz ve yetenekli. Planlı yaşamayı severler ve kendilerine güvenleri oldukça yüksektir.' ),
			array( 'name' => 'Köpek',   'traits' => 'Sadık, koruyucu ve adil. Dürüstlükleri ve sevdiklerine olan bağlılıklarıyla tanınırlar.' ),
			array( 'name' => 'Domuz',   'traits' => 'Cömert, hoşgörülü ve dürüst. Yaşamdan keyif almayı bilirler ve çok iyi birer dostturlar.' ),
		);

		$index  = ( $effective_year - 1900 ) % 12;
		if ( $index < 0 ) {
			$index += 12;
		}
		$animal = $animals[ $index ];

		$desc = $effective_year . ' yılı Çin Takvimine göre ' . $animal['name'] . ' yılıdır. ' . $animal['traits'];

		return array(
			'title'       => 'Çin Burcu (Yıl)',
			'value'       => $animal['name'],
			'unit'        => '',
			'label'       => $animal['name'] . ' yılı (' . $effective_year . ')',
			'description' => $desc,
			'warnings'    => array( 'Eğlence ve kişisel farkındalık amaçlıdır.' ),
			'raw'         => array(
				'birth_date'     => $p['birth_date'],
				'birth_year'     => $year,
				'effective_year' => $effective_year,
				'animal'         => $animal['name'],
				'animal_index'   => $index,
			),
		);
	}
);

// -------------------------------------------------------
// Çin Burcu — basit (yıl-4) % 12 yöntemi
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'cin-burcu-hesaplama',
	function ( array $p ) {
		$slug = 'cin-burcu-hesaplama';
		$err  = HC_Calculation_API::require_fields( $slug, $p, array( 'birth_date' ) );
		if ( $err ) {
			return $err;
		}

		$ts = strtotime( $p['birth_date'] );
		if ( ! $ts ) {
			return HC_Calculation_API::error( $slug, 'invalid_date', 'Geçersiz doğum tarihi.' );
		}

		$year  = (int) gmdate( 'Y', $ts );
		$month = (int) gmdate( 'n', $ts );
		$day   = (int) gmdate( 'j', $ts );

		// Yaklaşık eşik: 4-5 Şubat
		if ( $month < 2 || ( 2 === $month && $day < 5 ) ) {
			$year--;
		}

		$animals = array(
			array( 'name' => 'Maymun',  'desc' => 'Çin burcu Maymun olanlar, inanılmaz derecede zeki, kıvrak fikirli ve esprilidirler. Problem çözme yetenekleri çok gelişmiştir.' ),
			array( 'name' => 'Horoz',   'desc' => 'Horoz burcu bireyleri, dürüst, çalışkan ve kendinden emin kişilikleriyle tanınırlar. Detaylara çok önem verirler.' ),
			array( 'name' => 'Köpek',   'desc' => 'Çin burcu Köpek olanlar, Zodyak\'ın en sadık, dürüst ve güvenilir kişileridir. Adalet duyguları çok gelişmiştir.' ),
			array( 'name' => 'Domuz',   'desc' => 'Domuz burcu bireyleri, hoşgörülü, nazik ve cömert ruhlu insanlardır. Hayatın tadını çıkarmayı bilirler.' ),
			array( 'name' => 'Fare',    'desc' => 'Fare burcu olanlar, son derece zeki, becerikli ve uyum sağlama yeteneği yüksek bireylerdir. Fırsatları önceden sezerler.' ),
			array( 'name' => 'Öküz',    'desc' => 'Öküz burcu bireyleri, sabır, dayanıklılık ve dürüstlüğün simgesidirler. Sessiz ama sarsılmaz bir kararlılığa sahiptirler.' ),
			array( 'name' => 'Kaplan',  'desc' => 'Kaplan burcu olanlar, cesur, tutkulu ve bağımsız bir ruha sahiptirler. Risk almaktan çekinmezler.' ),
			array( 'name' => 'Tavşan',  'desc' => 'Tavşan burcu bireyleri, nazik, zarif ve barışçıl bir yapıya sahiptirler. Sanatsal yönleri çok gelişmiştir.' ),
			array( 'name' => 'Ejderha', 'desc' => 'Ejderha burcu, Çin Zodyak\'ının en güçlü ve görkemli burcudur. Özgüvenli, enerjik ve vizyoner bireylerdir.' ),
			array( 'name' => 'Yılan',   'desc' => 'Yılan burcu bireyleri, derin düşünen, gizemli ve bilge kişilerdir. Sessizce gözlemler ve en doğru zamanda harekete geçerler.' ),
			array( 'name' => 'At',      'desc' => 'At burcu olanlar, özgür ruhlu, enerjik ve bağımsızlıklarına düşkün bireylerdir. Yeni yerler keşfetmekten büyük keyif alırlar.' ),
			array( 'name' => 'Keçi',    'desc' => 'Keçi burcu bireyleri, sanatçı ruhlu, merhametli ve nazik insanlardır. Yaratıcı yetenekleri çok gelişmiştir.' ),
		);

		$index = ( $year - 4 ) % 12;
		if ( $index < 0 ) {
			$index += 12;
		}
		$animal = $animals[ $index ];

		return array(
			'title'       => 'Çin Burcu',
			'value'       => $animal['name'],
			'unit'        => '',
			'label'       => 'Çin Burcu: ' . $animal['name'],
			'description' => $animal['desc'],
			'warnings'    => array( 'Eğlence ve kişisel farkındalık amaçlıdır. Yaklaşık hesaplama yöntemi kullanılmıştır.' ),
			'raw'         => array(
				'birth_date'   => $p['birth_date'],
				'effective_yr' => $year,
				'animal'       => $animal['name'],
				'animal_index' => $index,
			),
		);
	}
);

// -------------------------------------------------------
// Sidereal Burç — Lahiri Ayanamsa
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'sidereal-burc-hesaplama',
	function ( array $p ) {
		$slug = 'sidereal-burc-hesaplama';
		$err  = HC_Calculation_API::require_fields( $slug, $p, array( 'birth_date' ) );
		if ( $err ) {
			return $err;
		}

		$ts = strtotime( $p['birth_date'] );
		if ( ! $ts ) {
			return HC_Calculation_API::error( $slug, 'invalid_date', 'Geçersiz doğum tarihi.' );
		}

		$year  = (int) gmdate( 'Y', $ts );
		$month = (int) gmdate( 'n', $ts );
		$day   = (int) gmdate( 'j', $ts );

		// Tropikal derece tahmini (Koç başlangıcı = 21 Mart)
		$start_of_aries  = mktime( 0, 0, 0, 3, 21, $year );
		$diff_days       = ( $ts - $start_of_aries ) / 86400.0;
		if ( $diff_days < 0 ) {
			$diff_days += 365.0;
		}
		$tropical_deg = $diff_days * ( 360.0 / 365.0 );

		// Lahiri Ayanamsa yaklaşımı: 1900'de ~22.5°, yılda ~0.0135° artış
		$ayanamsa     = 22.5 + ( $year - 1900 ) * 0.0135;
		$sidereal_deg = fmod( $tropical_deg - $ayanamsa + 360.0, 360.0 );

		$signs = array( 'Koç', 'Boğa', 'İkizler', 'Yengeç', 'Aslan', 'Başak', 'Terazi', 'Akrep', 'Yay', 'Oğlak', 'Kova', 'Balık' );
		$idx   = (int) floor( $sidereal_deg / 30.0 );
		$sign  = $signs[ $idx ];

		$desc = 'Doğum tarihine (' . $p['birth_date'] . ') göre Lahiri Ayanamsa (~' . round( $ayanamsa, 2 ) . '°) uygulandığında '
			. 'Sidereal (Yıldızıl) burcunuz ' . $sign . ' olarak hesaplanmıştır. '
			. 'Batı astrolojisindeki burcunuzdan farklı olabilir — bu sistem Hint/Vedik geleneğinde kullanılır.';

		return array(
			'title'       => 'Sidereal Burç',
			'value'       => $sign,
			'unit'        => '',
			'label'       => 'Sidereal Burç: ' . $sign,
			'description' => $desc,
			'warnings'    => array(
				'Eğlence ve kişisel farkındalık amaçlıdır.',
				'Ayanamsa yaklaşık değerdir; kesin hesap için doğum saati ve tam harita gerekir.',
			),
			'raw'         => array(
				'birth_date'    => $p['birth_date'],
				'tropical_deg'  => round( $tropical_deg, 4 ),
				'ayanamsa'      => round( $ayanamsa, 4 ),
				'sidereal_deg'  => round( $sidereal_deg, 4 ),
				'sign'          => $sign,
				'sign_index'    => $idx,
			),
		);
	}
);

// -------------------------------------------------------
// Yardımcı: tropikal güneş burcu anahtarı (ASCII-safe)
// -------------------------------------------------------

if ( ! function_exists( 'hc_adapter_sun_sign_key' ) ) {
	function hc_adapter_sun_sign_key( $month, $day ) {
		if ( ( 3 === $month && $day >= 21 ) || ( 4 === $month && $day <= 19 ) )  { return 'koc'; }
		if ( ( 4 === $month && $day >= 20 ) || ( 5 === $month && $day <= 20 ) )  { return 'boga'; }
		if ( ( 5 === $month && $day >= 21 ) || ( 6 === $month && $day <= 20 ) )  { return 'ikizler'; }
		if ( ( 6 === $month && $day >= 21 ) || ( 7 === $month && $day <= 22 ) )  { return 'yengec'; }
		if ( ( 7 === $month && $day >= 23 ) || ( 8 === $month && $day <= 22 ) )  { return 'aslan'; }
		if ( ( 8 === $month && $day >= 23 ) || ( 9 === $month && $day <= 22 ) )  { return 'basak'; }
		if ( ( 9 === $month && $day >= 23 ) || ( 10 === $month && $day <= 22 ) ) { return 'terazi'; }
		if ( ( 10 === $month && $day >= 23 ) || ( 11 === $month && $day <= 21 ) ) { return 'akrep'; }
		if ( ( 11 === $month && $day >= 22 ) || ( 12 === $month && $day <= 21 ) ) { return 'yay'; }
		if ( ( 12 === $month && $day >= 22 ) || ( 1 === $month && $day <= 19 ) ) { return 'oglak'; }
		if ( ( 1 === $month && $day >= 20 ) || ( 2 === $month && $day <= 18 ) )  { return 'kova'; }
		return 'balik';
	}
}

// -------------------------------------------------------
// Uranüs Burcu — dönem tablosu (~7 yıl/burç)
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'uranus-burcu-hesaplama',
	function ( array $p ) {
		$slug = 'uranus-burcu-hesaplama';
		$err  = HC_Calculation_API::require_fields( $slug, $p, array( 'birth_date' ) );
		if ( $err ) { return $err; }
		$ts = strtotime( $p['birth_date'] );
		if ( ! $ts ) { return HC_Calculation_API::error( $slug, 'invalid_date', 'Geçersiz doğum tarihi.' ); }

		$periods = array(
			array( 'start' => '1897-12-20', 'sign' => 'Yay' ),
			array( 'start' => '1904-12-20', 'sign' => 'Oğlak' ),
			array( 'start' => '1912-01-31', 'sign' => 'Kova' ),
			array( 'start' => '1919-12-01', 'sign' => 'Balık' ),
			array( 'start' => '1927-04-18', 'sign' => 'Koç' ),
			array( 'start' => '1934-06-06', 'sign' => 'Boğa' ),
			array( 'start' => '1941-08-07', 'sign' => 'İkizler' ),
			array( 'start' => '1948-08-30', 'sign' => 'Yengeç' ),
			array( 'start' => '1955-08-24', 'sign' => 'Aslan' ),
			array( 'start' => '1961-11-01', 'sign' => 'Başak' ),
			array( 'start' => '1968-09-28', 'sign' => 'Terazi' ),
			array( 'start' => '1974-11-21', 'sign' => 'Akrep' ),
			array( 'start' => '1981-02-17', 'sign' => 'Yay' ),
			array( 'start' => '1988-02-15', 'sign' => 'Oğlak' ),
			array( 'start' => '1995-04-01', 'sign' => 'Kova' ),
			array( 'start' => '2003-03-10', 'sign' => 'Balık' ),
			array( 'start' => '2010-05-28', 'sign' => 'Koç' ),
			array( 'start' => '2018-05-15', 'sign' => 'Boğa' ),
			array( 'start' => '2025-07-07', 'sign' => 'İkizler' ),
		);

		$sign = null;
		foreach ( array_reverse( $periods ) as $period ) {
			if ( $ts >= strtotime( $period['start'] ) ) {
				$sign = $period['sign'];
				break;
			}
		}
		if ( null === $sign ) { return HC_Calculation_API::error( $slug, 'out_of_range', 'Doğum tarihi Uranüs tablosu dışında.' ); }

		$descs = array(
			'Koç'     => 'Uranüs Koç burcunda olanlar özgürlük, bireysel yenilik ve cesur öncülük enerjisi taşıyan bir neslin parçasıdır.',
			'Boğa'    => 'Uranüs Boğa burcunda olanlar maddi değerleri, doğa ilişkisini ve ekonomiyi yeniden tanımlayan nesil enerjisi taşır.',
			'İkizler' => 'Uranüs İkizler burcunda olanlar iletişim ve bilgi teknolojilerinde devrimci fikirler üreten nesil enerjisi taşır.',
			'Yengeç'  => 'Uranüs Yengeç burcunda olanlar aile ve duygusal güvenlik anlayışını köklü biçimde yeniden şekillendiren nesil enerjisi taşır.',
			'Aslan'   => 'Uranüs Aslan burcunda olanlar yaratıcılık ve bireysel ifade biçimlerinde çarpıcı yenilikler getiren nesil enerjisi taşır.',
			'Başak'   => 'Uranüs Başak burcunda olanlar iş hayatı, sağlık ve teknoloji entegrasyonunda dönüşümcü bakış açısı taşır.',
			'Terazi'  => 'Uranüs Terazi burcunda olanlar ilişkiler, adalet ve toplumsal dengede köklü değişimler öncülüğü yapan nesil enerjisi taşır.',
			'Akrep'   => 'Uranüs Akrep burcunda olanlar psikoloji, dönüşüm ve ortak kaynaklar konusunda tabuları yıkan enerji taşır.',
			'Yay'     => 'Uranüs Yay burcunda olanlar inanç, felsefe ve küresel özgürlük alanında yenilikçi bir vizyon taşır.',
			'Oğlak'   => 'Uranüs Oğlak burcunda olanlar kurumsal yapıları ve gelenekleri teknolojiyle dönüştürme potansiyeli taşıyan nesil enerjisine sahiptir.',
			'Kova'    => 'Uranüs Kova burcunda olanlar (doğal yönetici) kolektif bilinç ve teknolojik devrimi simgeleyen güçlü bir nesil enerjisi taşır.',
			'Balık'   => 'Uranüs Balık burcunda olanlar ruhsal uyanış, sanattaki yenilikler ve evrensel empati temalarını taşıyan nesil enerjisine sahiptir.',
		);

		return array(
			'title'       => 'Uranüs Burcu',
			'value'       => $sign,
			'unit'        => '',
			'label'       => 'Uranüs: ' . $sign,
			'description' => $descs[ $sign ] ?? $sign,
			'warnings'    => array( 'Uranüs bir burçta ~7 yıl geçirir; nesil temasını gösterir. Eğlence ve kişisel farkındalık amaçlıdır.' ),
			'raw'         => array( 'birth_date' => $p['birth_date'], 'sign' => $sign ),
		);
	}
);

// -------------------------------------------------------
// Neptün Burcu — dönem tablosu (~14 yıl/burç)
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'neptun-burcu-hesaplama',
	function ( array $p ) {
		$slug = 'neptun-burcu-hesaplama';
		$err  = HC_Calculation_API::require_fields( $slug, $p, array( 'birth_date' ) );
		if ( $err ) { return $err; }
		$ts = strtotime( $p['birth_date'] );
		if ( ! $ts ) { return HC_Calculation_API::error( $slug, 'invalid_date', 'Geçersiz doğum tarihi.' ); }

		$periods = array(
			array( 'start' => '1901-01-01', 'sign' => 'İkizler' ),
			array( 'start' => '1915-07-19', 'sign' => 'Yengeç' ),
			array( 'start' => '1929-09-21', 'sign' => 'Aslan' ),
			array( 'start' => '1943-10-03', 'sign' => 'Başak' ),
			array( 'start' => '1956-10-19', 'sign' => 'Terazi' ),
			array( 'start' => '1970-11-06', 'sign' => 'Akrep' ),
			array( 'start' => '1984-11-21', 'sign' => 'Yay' ),
			array( 'start' => '1998-01-29', 'sign' => 'Oğlak' ),
			array( 'start' => '2012-02-03', 'sign' => 'Balık' ),
			array( 'start' => '2025-03-30', 'sign' => 'Koç' ),
		);

		$sign = null;
		foreach ( array_reverse( $periods ) as $period ) {
			if ( $ts >= strtotime( $period['start'] ) ) {
				$sign = $period['sign'];
				break;
			}
		}
		if ( null === $sign ) { return HC_Calculation_API::error( $slug, 'out_of_range', 'Doğum tarihi Neptün tablosu dışında.' ); }

		$descs = array(
			'İkizler' => 'Neptün İkizler\'de: zihinsel düzeyde yüksek hayal gücü ve sezgisel bilgi arayışı bu nesil temasını renklendirir.',
			'Yengeç'  => 'Neptün Yengeç\'te: vatan, aile ve duygusal köklere yönelik ruhsal bir bağ bu nesil temasında öne çıkar.',
			'Aslan'   => 'Neptün Aslan\'da: sanat, yaratıcılık ve kendini ifadede ilahi ilham arayışı bu nesil enerjisini belirler.',
			'Başak'   => 'Neptün Başak\'ta: detaylarda gizlenen kutsallığı fark etme ve hizmet yoluyla anlam arama bu nesil temasını oluşturur.',
			'Terazi'  => 'Neptün Terazi\'de: güzellik, uyum ve ilişkilerdeki evrensel idealler bu neslin ruhsal arayışını şekillendirmiştir.',
			'Akrep'   => 'Neptün Akrep\'te: yaşamın gizemli ve dönüştürücü boyutlarına yönelik derin ruhsal merak bu nesil enerjisinde kendini gösterir.',
			'Yay'     => 'Neptün Yay\'da: farklı kültürler ve inançlar arasında evrensel gerçeği arama isteği bu neslin ruhsal yolculuğunu simgeler.',
			'Oğlak'   => 'Neptün Oğlak\'ta: hayalleri somut gerçekliğe dönüştürme azmi ve ruhsal olgunluğu disiplinle arama bu neslin temasıdır.',
			'Balık'   => 'Neptün Balık\'ta (yönetici): sınırsız empati, ruhsal uyanış ve sanatın en saf hali bu neslin kolektif enerjisinde zirveye ulaşır.',
			'Koç'     => 'Neptün Koç\'ta: ruhsal cesaret, bireysel uyanış ve yeni inançların öncülüğü bu neslin kolektif temasını oluşturur.',
		);

		return array(
			'title'       => 'Neptün Burcu',
			'value'       => $sign,
			'unit'        => '',
			'label'       => 'Neptün: ' . $sign,
			'description' => $descs[ $sign ] ?? $sign,
			'warnings'    => array( 'Neptün bir burçta ~14 yıl geçirir; nesil temasını gösterir. Eğlence ve kişisel farkındalık amaçlıdır.' ),
			'raw'         => array( 'birth_date' => $p['birth_date'], 'sign' => $sign ),
		);
	}
);

// -------------------------------------------------------
// Plüton Burcu — dönem tablosu (12-30 yıl/burç)
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'pluton-burcu-hesaplama',
	function ( array $p ) {
		$slug = 'pluton-burcu-hesaplama';
		$err  = HC_Calculation_API::require_fields( $slug, $p, array( 'birth_date' ) );
		if ( $err ) { return $err; }
		$ts = strtotime( $p['birth_date'] );
		if ( ! $ts ) { return HC_Calculation_API::error( $slug, 'invalid_date', 'Geçersiz doğum tarihi.' ); }

		$periods = array(
			array( 'start' => '1884-01-01', 'sign' => 'İkizler' ),
			array( 'start' => '1913-09-10', 'sign' => 'Yengeç' ),
			array( 'start' => '1939-06-14', 'sign' => 'Aslan' ),
			array( 'start' => '1958-06-10', 'sign' => 'Başak' ),
			array( 'start' => '1972-04-17', 'sign' => 'Terazi' ),
			array( 'start' => '1984-08-28', 'sign' => 'Akrep' ),
			array( 'start' => '1995-11-10', 'sign' => 'Yay' ),
			array( 'start' => '2008-01-26', 'sign' => 'Oğlak' ),
			array( 'start' => '2024-01-21', 'sign' => 'Kova' ),
		);

		$sign = null;
		foreach ( array_reverse( $periods ) as $period ) {
			if ( $ts >= strtotime( $period['start'] ) ) {
				$sign = $period['sign'];
				break;
			}
		}
		if ( null === $sign ) { return HC_Calculation_API::error( $slug, 'out_of_range', 'Doğum tarihi Plüton tablosu dışında.' ); }

		$descs = array(
			'İkizler' => 'Plüton İkizler\'de: zihinsel güç ve iletişimin dönüştürücü bir araca dönüştüğü nesil enerjisi.',
			'Yengeç'  => 'Plüton Yengeç\'te: vatan ve aile kavramlarının köklü biçimde yeniden yapılandığı nesil enerjisi.',
			'Aslan'   => 'Plüton Aslan\'da: bireysel güç, ihtişam ve "ben" merkezli liderliğin dönüştürücü biçimde yükseldiği nesil enerjisi.',
			'Başak'   => 'Plüton Başak\'ta: iş dünyası, sağlık sistemleri ve teknolojinin kökten dönüştüğü; verimlilik ve mükemmeliyetin simgesi nesil enerjisi.',
			'Terazi'  => 'Plüton Terazi\'de: ilişkiler, adalet ve toplumsal cinsiyet dengelerinde derin dönüşümler getiren nesil enerjisi.',
			'Akrep'   => 'Plüton Akrep\'te (yönetici): psikoloji ve güç kavramlarında en yoğun dönüşümleri yaşayan simyacı enerji.',
			'Yay'     => 'Plüton Yay\'da: inançların ve küreselleşmenin sınır tanımadan yayıldığı; gerçek arayışındaki özgürlük tutkusuyla tanınan nesil enerjisi.',
			'Oğlak'   => 'Plüton Oğlak\'ta: ekonomik krizler ve sistemlerin yeniden inşasıyla şekillenen kurumsal dönüşüm nesil enerjisi.',
			'Kova'    => 'Plüton Kova\'da: yapay zeka ve toplumsal devrimlerle insanlığın geleceğini şekillendiren yeni nesil enerjisi.',
		);

		return array(
			'title'       => 'Plüton Burcu',
			'value'       => $sign,
			'unit'        => '',
			'label'       => 'Plüton: ' . $sign,
			'description' => $descs[ $sign ] ?? $sign,
			'warnings'    => array( 'Plüton bir burçta 12-30 yıl geçirir; nesil temasını gösterir. Eğlence ve kişisel farkındalık amaçlıdır.' ),
			'raw'         => array( 'birth_date' => $p['birth_date'], 'sign' => $sign ),
		);
	}
);

// -------------------------------------------------------
// Vedik Burç — Lahiri Ayanamsa, Sanskrit isimler
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'vedik-burc-hesaplama',
	function ( array $p ) {
		$slug = 'vedik-burc-hesaplama';
		$err  = HC_Calculation_API::require_fields( $slug, $p, array( 'birth_date' ) );
		if ( $err ) { return $err; }
		$ts = strtotime( $p['birth_date'] );
		if ( ! $ts ) { return HC_Calculation_API::error( $slug, 'invalid_date', 'Geçersiz doğum tarihi.' ); }

		$year           = (int) gmdate( 'Y', $ts );
		$start_of_aries = mktime( 0, 0, 0, 3, 21, $year );
		$diff_days      = ( $ts - $start_of_aries ) / 86400.0;
		if ( $diff_days < 0.0 ) { $diff_days += 365.0; }
		$tropical_deg = $diff_days * ( 360.0 / 365.0 );
		$ayanamsa     = 22.5 + ( $year - 1900 ) * 0.0135;
		$sidereal_deg = fmod( $tropical_deg - $ayanamsa + 360.0, 360.0 );

		$vedic_signs = array(
			array( 'sk' => 'Mesha',      'tr' => 'Koç' ),
			array( 'sk' => 'Vrishabha',  'tr' => 'Boğa' ),
			array( 'sk' => 'Mithuna',    'tr' => 'İkizler' ),
			array( 'sk' => 'Karka',      'tr' => 'Yengeç' ),
			array( 'sk' => 'Simha',      'tr' => 'Aslan' ),
			array( 'sk' => 'Kanya',      'tr' => 'Başak' ),
			array( 'sk' => 'Tula',       'tr' => 'Terazi' ),
			array( 'sk' => 'Vrishchika', 'tr' => 'Akrep' ),
			array( 'sk' => 'Dhanu',      'tr' => 'Yay' ),
			array( 'sk' => 'Makara',     'tr' => 'Oğlak' ),
			array( 'sk' => 'Kumbha',     'tr' => 'Kova' ),
			array( 'sk' => 'Meena',      'tr' => 'Balık' ),
		);
		$idx   = (int) floor( $sidereal_deg / 30.0 );
		$sign  = $vedic_signs[ $idx ];
		$value = $sign['sk'] . ' (' . $sign['tr'] . ')';
		$desc  = 'Vedik Jyotish astrolojisinde Lahiri Ayanamsa (~' . round( $ayanamsa, 1 ) . '°) uygulandığında '
			. 'Rasi burcunuz ' . $value . ' olarak hesaplanmıştır. '
			. 'Batı burcunuzdan farklı olması normaldir; bu sistem gerçek takımyıldız konumlarını esas alır.';

		return array(
			'title'       => 'Vedik Burç',
			'value'       => $value,
			'unit'        => '',
			'label'       => 'Rasi: ' . $value,
			'description' => $desc,
			'warnings'    => array( 'Vedik/Jyotish geleneğine dayalı sembolik göstergedir. Ayanamsa yaklaşık değerdir.' ),
			'raw'         => array(
				'birth_date'   => $p['birth_date'],
				'tropical_deg' => round( $tropical_deg, 4 ),
				'ayanamsa'     => round( $ayanamsa, 4 ),
				'sidereal_deg' => round( $sidereal_deg, 4 ),
				'sign_sk'      => $sign['sk'],
				'sign_tr'      => $sign['tr'],
				'sign_index'   => $idx,
			),
		);
	}
);

// -------------------------------------------------------
// Kuzey Ay Düğümü — ortalama düğüm formülü
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'kuzey-ay-dugumu-hesaplama',
	function ( array $p ) {
		$slug = 'kuzey-ay-dugumu-hesaplama';
		$err  = HC_Calculation_API::require_fields( $slug, $p, array( 'birth_date' ) );
		if ( $err ) { return $err; }
		$ts = strtotime( $p['birth_date'] );
		if ( ! $ts ) { return HC_Calculation_API::error( $slug, 'invalid_date', 'Geçersiz doğum tarihi.' ); }

		// Ortalama yükselen düğüm (Mean Ascending Node of Moon)
		$jd    = ( $ts / 86400.0 ) + 2440587.5;
		$T     = ( $jd - 2451545.0 ) / 36525.0;
		$omega = fmod( 125.0445 - 1934.1363 * $T, 360.0 );
		if ( $omega < 0.0 ) { $omega += 360.0; }

		$signs = array( 'Koç', 'Boğa', 'İkizler', 'Yengeç', 'Aslan', 'Başak', 'Terazi', 'Akrep', 'Yay', 'Oğlak', 'Kova', 'Balık' );
		$idx   = (int) floor( $omega / 30.0 );
		$sign  = $signs[ $idx ];

		$purposes = array(
			'Koç'     => 'Bireyselliği geliştirmek, cesaret göstermek ve özgün bir yol çizmek.',
			'Boğa'    => 'Maddi güvenliği sağlamak, sabır geliştirmek ve kalıcı değerler üretmek.',
			'İkizler' => 'Bilgiyi paylaşmak, iletişim becerilerini geliştirmek ve meraklı kalmak.',
			'Yengeç'  => 'Duygusal bağlar kurmak, şefkat göstermek ve aile değerlerini anlamak.',
			'Aslan'   => 'Yaratıcılığını ifade etmek, özgüven geliştirmek ve liderlik etmek.',
			'Başak'   => 'Hizmet etmek, pratik beceriler geliştirmek ve günlük hayatta düzen kurmak.',
			'Terazi'  => 'İlişkilerde denge bulmak, diplomasi ve adil ortaklıklar geliştirmek.',
			'Akrep'   => 'Dönüşümü benimsemek, derinlik kazanmak ve güçlü sezgiler geliştirmek.',
			'Yay'     => 'Bilgelik aramak, özgürleşmek ve geniş bir vizyon kazanmak.',
			'Oğlak'   => 'Sorumluluk almak, disiplinli çalışmak ve toplumsal katkı sunmak.',
			'Kova'    => 'Toplumsal fayda sağlamak, özgün olmak ve insancıl idealler peşinde koşmak.',
			'Balık'   => 'Ruhsallığa yönelmek, bırakmayı öğrenmek ve evrensel empati geliştirmek.',
		);

		$desc = 'Doğum tarihindeki Kuzey Ay Düğümü ' . $sign . ' burcundadır. '
			. 'KAD bu yaşamdaki evrimsel amacı simgeler: ' . ( $purposes[ $sign ] ?? '' );

		return array(
			'title'       => 'Kuzey Ay Düğümü',
			'value'       => $sign,
			'unit'        => '',
			'label'       => 'KAD: ' . $sign,
			'description' => $desc,
			'warnings'    => array( 'Eğlence ve kişisel farkındalık amaçlıdır; ortalama Ay Düğümü hesabıdır.' ),
			'raw'         => array(
				'birth_date' => $p['birth_date'],
				'omega_deg'  => round( $omega, 4 ),
				'sign'       => $sign,
				'sign_index' => $idx,
			),
		);
	}
);

// -------------------------------------------------------
// Çin Burcu Döngüsü — 60 yıllık Gök Sapı + Yer Dalı
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'cin-burcu-dongusu-hesaplama',
	function ( array $p ) {
		$slug = 'cin-burcu-dongusu-hesaplama';
		$err  = HC_Calculation_API::require_fields( $slug, $p, array( 'birth_date' ) );
		if ( $err ) { return $err; }
		$ts = strtotime( $p['birth_date'] );
		if ( ! $ts ) { return HC_Calculation_API::error( $slug, 'invalid_date', 'Geçersiz doğum tarihi.' ); }
		$year = (int) gmdate( 'Y', $ts );

		// 1984 = referans yıl (Yang Ağaç Fare)
		$stems    = array( 'Yang Ağaç', 'Yin Ağaç', 'Yang Ateş', 'Yin Ateş', 'Yang Toprak', 'Yin Toprak', 'Yang Metal', 'Yin Metal', 'Yang Su', 'Yin Su' );
		$branches = array( 'Fare', 'Öküz', 'Kaplan', 'Tavşan', 'Ejderha', 'Yılan', 'At', 'Keçi', 'Maymun', 'Horoz', 'Köpek', 'Domuz' );

		$stem_idx   = ( ( $year - 1984 ) % 10 + 10 ) % 10;
		$branch_idx = ( ( $year - 1984 ) % 12 + 12 ) % 12;
		$stem       = $stems[ $stem_idx ];
		$branch     = $branches[ $branch_idx ];
		$value      = $stem . ' ' . $branch;
		$cycle_pos  = ( ( $year - 1984 ) % 60 + 60 ) % 60 + 1;

		$desc = $year . ' yılı 60 yıllık Çin döngüsünün ' . $cycle_pos . '. yılıdır. '
			. $stem . ' elementi ruhsal yönünüzü, ' . $branch . ' burcu ise sosyal ve fiziksel yönünüzü temsil eder.';

		return array(
			'title'       => 'Çin Burcu Döngüsü',
			'value'       => $value,
			'unit'        => '',
			'label'       => $value . ' (' . $year . ')',
			'description' => $desc,
			'warnings'    => array( 'Eğlence ve kişisel farkındalık amaçlıdır; takvim yılı baz alınmıştır.' ),
			'raw'         => array(
				'birth_year' => $year,
				'stem'       => $stem,
				'branch'     => $branch,
				'cycle_pos'  => $cycle_pos,
			),
		);
	}
);

// -------------------------------------------------------
// Burç Elementi — doğum tarihinden element
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'burc-elementi-hesaplama',
	function ( array $p ) {
		$slug = 'burc-elementi-hesaplama';
		$err  = HC_Calculation_API::require_fields( $slug, $p, array( 'birth_date' ) );
		if ( $err ) { return $err; }
		$ts = strtotime( $p['birth_date'] );
		if ( ! $ts ) { return HC_Calculation_API::error( $slug, 'invalid_date', 'Geçersiz doğum tarihi.' ); }

		$month = (int) gmdate( 'n', $ts );
		$day   = (int) gmdate( 'j', $ts );
		$key   = hc_adapter_sun_sign_key( $month, $day );

		if ( in_array( $key, array( 'koc', 'aslan', 'yay' ), true ) ) {
			$element = 'Ateş';
			$signs   = 'Koç, Aslan, Yay';
			$desc    = 'Ateş burçları (Koç, Aslan, Yay) enerjik, tutkulu ve öncü ruha sahiptir. İlham verici liderlik ve cesaret bu elementin temel nitelikleridir. Yaratıcı güç ve girişimci ruh bu elementle özdeşleşir.';
		} elseif ( in_array( $key, array( 'boga', 'basak', 'oglak' ), true ) ) {
			$element = 'Toprak';
			$signs   = 'Boğa, Başak, Oğlak';
			$desc    = 'Toprak burçları (Boğa, Başak, Oğlak) pratik, güvenilir ve sabırlıdır. Somut sonuçlar, maddi güvenlik ve kalıcı değerler üretme bu elementin güçlü yönüdür.';
		} elseif ( in_array( $key, array( 'ikizler', 'terazi', 'kova' ), true ) ) {
			$element = 'Hava';
			$signs   = 'İkizler, Terazi, Kova';
			$desc    = 'Hava burçları (İkizler, Terazi, Kova) entelektüel, sosyal ve iletişim odaklıdır. Fikirlerin paylaşımı, denge arayışı ve toplumsal bağlar bu elementin gücünü oluşturur.';
		} else {
			$element = 'Su';
			$signs   = 'Yengeç, Akrep, Balık';
			$desc    = 'Su burçları (Yengeç, Akrep, Balık) derin duygusallık, sezgi ve empatinin temsilcisidir. Ruhsal bağlar, içsel bilgelik ve şifa bu elementin özüdür.';
		}

		return array(
			'title'       => 'Burç Elementi',
			'value'       => $element,
			'unit'        => '',
			'label'       => 'Element: ' . $element . ' (' . $signs . ')',
			'description' => $desc,
			'warnings'    => array( 'Eğlence ve kişisel farkındalık amaçlıdır.' ),
			'raw'         => array( 'birth_date' => $p['birth_date'], 'sign_key' => $key, 'element' => $element ),
		);
	}
);

// -------------------------------------------------------
// Burç Grubu — doğum tarihinden modalite
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'burc-grubu-hesaplama',
	function ( array $p ) {
		$slug = 'burc-grubu-hesaplama';
		$err  = HC_Calculation_API::require_fields( $slug, $p, array( 'birth_date' ) );
		if ( $err ) { return $err; }
		$ts = strtotime( $p['birth_date'] );
		if ( ! $ts ) { return HC_Calculation_API::error( $slug, 'invalid_date', 'Geçersiz doğum tarihi.' ); }

		$month = (int) gmdate( 'n', $ts );
		$day   = (int) gmdate( 'j', $ts );
		$key   = hc_adapter_sun_sign_key( $month, $day );

		if ( in_array( $key, array( 'koc', 'yengec', 'terazi', 'oglak' ), true ) ) {
			$grup  = 'Öncü';
			$signs = 'Koç, Yengeç, Terazi, Oğlak';
			$desc  = 'Öncü burçlar (Koç, Yengeç, Terazi, Oğlak) başlatıcı enerjiyle doludur. Yeni projeler kurmak ve liderlik etmek bu grubun temel özelliğidir. Harekete geçiren kıvılcımdırlar.';
		} elseif ( in_array( $key, array( 'boga', 'aslan', 'akrep', 'kova' ), true ) ) {
			$grup  = 'Sabit';
			$signs = 'Boğa, Aslan, Akrep, Kova';
			$desc  = 'Sabit burçlar (Boğa, Aslan, Akrep, Kova) dayanıklı ve kararlıdır; başladıklarını sonuna götürürler. Değişime karşı direnç ve derin bağlılık bu grubun özünü oluşturur.';
		} else {
			$grup  = 'Değişken';
			$signs = 'İkizler, Başak, Yay, Balık';
			$desc  = 'Değişken burçlar (İkizler, Başak, Yay, Balık) esnek, uyumlu ve çok yönlüdür. Mevsim geçişlerini temsil eder; dönüşüm ve arabuluculuk bu grubun gücüdür.';
		}

		return array(
			'title'       => 'Burç Grubu',
			'value'       => $grup,
			'unit'        => '',
			'label'       => 'Grup: ' . $grup . ' (' . $signs . ')',
			'description' => $desc,
			'warnings'    => array( 'Eğlence ve kişisel farkındalık amaçlıdır.' ),
			'raw'         => array( 'birth_date' => $p['birth_date'], 'sign_key' => $key, 'grup' => $grup ),
		);
	}
);
