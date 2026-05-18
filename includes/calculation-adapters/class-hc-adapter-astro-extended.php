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
