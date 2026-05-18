<?php
/**
 * Gezegen burcu hesaplama adapterleri.
 * Kepler yörünge mekaniği — orbital elementler Meeus/J2000 tabanlı.
 * Eğlence ve kişisel farkındalık amaçlıdır.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// -------------------------------------------------------
// Ortak gezegen hesaplama yardımcıları
// -------------------------------------------------------

if ( ! function_exists( 'hc_adapter_planet_jd' ) ) {
	/**
	 * Unix timestamp → Julian Date
	 */
	function hc_adapter_planet_jd( $ts ) {
		return ( $ts / 86400.0 ) + 2440587.5;
	}
}

if ( ! function_exists( 'hc_adapter_planet_norm' ) ) {
	function hc_adapter_planet_norm( $x ) {
		$x = fmod( $x, 360.0 );
		return $x < 0.0 ? $x + 360.0 : $x;
	}
}

if ( ! function_exists( 'hc_adapter_planet_helio' ) ) {
	/**
	 * Kepler yörüngesi → ekliptik heliocentric (x, y, z) kartezyen koordinatlar.
	 *
	 * @param array $el  Orbital elementler: N, i, w, a, e, M0, M1
	 * @param float $d   J2000 epoch'tan gün sayısı (JD - 2451543.5)
	 * @return array     ['x'=>float, 'y'=>float, 'z'=>float]
	 */
	function hc_adapter_planet_helio( array $el, $d ) {
		$rad = M_PI / 180.0;

		$N  = $el['N'];
		$i  = $el['i'];
		$w  = $el['w'];
		$a  = $el['a'];
		$e  = $el['e'];
		$M0 = $el['M0'];
		$M1 = $el['M1'];

		$M = hc_adapter_planet_norm( $M0 + $M1 * $d );

		// Eccentric anomaly — Newton iteration (3 passes)
		$E = $M + ( 180.0 / M_PI ) * $e * sin( $M * $rad ) * ( 1.0 + $e * cos( $M * $rad ) );
		for ( $j = 0; $j < 3; $j++ ) {
			$E = $E - ( $E - ( 180.0 / M_PI ) * $e * sin( $E * $rad ) - $M ) / ( 1.0 - $e * cos( $E * $rad ) );
		}

		$xv     = $a * ( cos( $E * $rad ) - $e );
		$yv     = $a * ( sqrt( 1.0 - $e * $e ) * sin( $E * $rad ) );
		$v      = atan2( $yv, $xv ) / $rad;
		$r      = sqrt( $xv * $xv + $yv * $yv );
		$lonecl = hc_adapter_planet_norm( $v + $w );

		$x = $r * ( cos( $N * $rad ) * cos( $lonecl * $rad ) - sin( $N * $rad ) * sin( $lonecl * $rad ) * cos( $i * $rad ) );
		$y = $r * ( sin( $N * $rad ) * cos( $lonecl * $rad ) + cos( $N * $rad ) * sin( $lonecl * $rad ) * cos( $i * $rad ) );
		$z = $r * sin( $lonecl * $rad ) * sin( $i * $rad );

		return array( 'x' => $x, 'y' => $y, 'z' => $z );
	}
}

if ( ! function_exists( 'hc_adapter_planet_sign_index' ) ) {
	/**
	 * Doğum tarihi + gezegen orbital elementleri → burç indeksi (0-11)
	 */
	function hc_adapter_planet_sign_index( $birth_date, array $planet_el ) {
		$ts = strtotime( $birth_date );
		if ( ! $ts ) {
			return null;
		}

		$jd = hc_adapter_planet_jd( $ts );
		$d  = $jd - 2451543.5;

		$earth_el = array(
			'N'  => 0.0,
			'i'  => 0.0,
			'w'  => 102.9404 + 0.0000470935 * $d,
			'a'  => 1.00000011,
			'e'  => 0.01671022 - 0.0000000012 * $d,
			'M0' => 357.5291,
			'M1' => 0.98560028,
		);

		$pE  = hc_adapter_planet_helio( $earth_el, $d );
		$pP  = hc_adapter_planet_helio( $planet_el, $d );

		$xG   = $pP['x'] - $pE['x'];
		$yG   = $pP['y'] - $pE['y'];
		$lonG = hc_adapter_planet_norm( atan2( $yG, $xG ) / ( M_PI / 180.0 ) );

		return (int) floor( $lonG / 30.0 );
	}
}

if ( ! function_exists( 'hc_adapter_planet_signs_tr' ) ) {
	function hc_adapter_planet_signs_tr() {
		return array( 'Koç', 'Boğa', 'İkizler', 'Yengeç', 'Aslan', 'Başak', 'Terazi', 'Akrep', 'Yay', 'Oğlak', 'Kova', 'Balık' );
	}
}

if ( ! function_exists( 'hc_adapter_planet_result' ) ) {
	/**
	 * Gezegen burcu adapterı ortak sonuç yapısı.
	 */
	function hc_adapter_planet_result( $slug, $planet_name, $birth_date, array $planet_el, array $descriptions ) {
		$idx = hc_adapter_planet_sign_index( $birth_date, $planet_el );
		if ( null === $idx ) {
			return HC_Calculation_API::error( $slug, 'invalid_date', 'Geçersiz doğum tarihi.' );
		}

		$signs = hc_adapter_planet_signs_tr();
		$sign  = $signs[ $idx ];
		$desc  = $descriptions[ $sign ] ?? '';

		return array(
			'title'       => $planet_name . ' Burcu',
			'value'       => $sign,
			'unit'        => '',
			'label'       => $planet_name . ': ' . $sign,
			'description' => $desc,
			'warnings'    => array( 'Eğlence ve kişisel farkındalık amaçlıdır; yörünge hesabı yaklaşık değerdir.' ),
			'raw'         => array(
				'planet'     => $planet_name,
				'birth_date' => $birth_date,
				'sign'       => $sign,
				'sign_index' => $idx,
			),
		);
	}
}

// -------------------------------------------------------
// Venüs Burcu
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'venus-burcu-hesaplama',
	function ( array $p ) {
		$slug = 'venus-burcu-hesaplama';
		$err  = HC_Calculation_API::require_fields( $slug, $p, array( 'birth_date' ) );
		if ( $err ) {
			return $err;
		}

		$d = ( hc_adapter_planet_jd( strtotime( $p['birth_date'] ) ) - 2451543.5 );

		$venus_el = array(
			'N'  => 76.6799 + 0.000024659 * $d,
			'i'  => 3.3946 + 0.0000000275 * $d,
			'w'  => 131.5721 + 0.000004085 * $d,
			'a'  => 0.72333,
			'e'  => 0.00677,
			'M0' => 181.9797,
			'M1' => 1.6021302,
		);

		$descs = array(
			'Koç'     => 'Venüs Koç\'ta: tutkulu, spontane ve cesur bir sevgi anlayışı. Aşkta inisiyatif almayı ve heyecanlı başlangıçları sever.',
			'Boğa'    => 'Venüs Boğa\'da (yüceltme): sadık, duyusal ve güvenli ilişkiler arar. Güzelliğe, konfora ve kalıcı bağlara değer verir.',
			'İkizler' => 'Venüs İkizler\'de: zekice sohbet ve çeşitlilik aşkı canlandırır. İletişim ve merak ilişkilerin temel taşı.',
			'Yengeç'  => 'Venüs Yengeç\'te: besleyici, koruyucu ve duygusal derinliği olan sevgi anlayışı. Aile ve yuva en yüksek değer.',
			'Aslan'   => 'Venüs Aslan\'da: dramatik, cömert ve görkemli bir aşk tarzı. Takdir edilmek ve parlayan anlara tutkuludur.',
			'Başak'   => 'Venüs Başak\'ta: özenli, titiz ve hizmet odaklı sevgi. Küçük detaylarda şefkatini gösterir.',
			'Terazi'  => 'Venüs Terazi\'de (yönetici): uyumlu, estetik ve adil ilişkiler arar. Denge ve güzelliği hayatın her alanında arar.',
			'Akrep'   => 'Venüs Akrep\'te: yoğun, dönüştürücü ve derin bağlar kurar. Aşkta tümünü ya da hiçbirini ister.',
			'Yay'     => 'Venüs Yay\'da: özgür ruhlu, maceraperest ve felsefi bir sevgi anlayışı. Büyüme ve keşif ilişkiyi besler.',
			'Oğlak'   => 'Venüs Oğlak\'ta: sorumlu, sadık ve uzun vadeli ilişkilere değer verir. Pratik güvenlik sevginin bir parçasıdır.',
			'Kova'    => 'Venüs Kova\'da: özgürlükçü, alışılmadık ve entelektüel bağlar kurar. Arkadaşlık aşkın temeli.',
			'Balık'   => 'Venüs Balık\'ta (yüceltme): rüyamsı, şefkatli ve koşulsuz sevgi anlayışı. Sınır ötesi bir bağlılık hisseder.',
		);

		return hc_adapter_planet_result( $slug, 'Venüs', $p['birth_date'], $venus_el, $descs );
	}
);

// -------------------------------------------------------
// Mars Burcu
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'mars-burcu-hesaplama',
	function ( array $p ) {
		$slug = 'mars-burcu-hesaplama';
		$err  = HC_Calculation_API::require_fields( $slug, $p, array( 'birth_date' ) );
		if ( $err ) {
			return $err;
		}

		$d = ( hc_adapter_planet_jd( strtotime( $p['birth_date'] ) ) - 2451543.5 );

		$mars_el = array(
			'N'  => 49.5574 + 0.000021108 * $d,
			'i'  => 1.8497 - 0.0000000178 * $d,
			'w'  => 336.0408 + 0.00001228 * $d,
			'a'  => 1.523688,
			'e'  => 0.093405,
			'M0' => 18.6021,
			'M1' => 0.5240207,
		);

		$descs = array(
			'Koç'     => 'Mars Koç\'ta (yönetici): doğrudan, cesur ve enerjik bir eylem tarzı. Hızlı karar verir, öncü ve savaşçı ruha sahiptir.',
			'Boğa'    => 'Mars Boğa\'da: sabırlı, inatçı ve istikrarlı bir güç. Yavaş ısınır ama kararlı ilerlediğinde durdurulamaz.',
			'İkizler' => 'Mars İkizler\'de: çok yönlü, hızlı düşünen ve sözel enerjisi yüksek. Tartışmayı ve fikir alışverişini sever.',
			'Yengeç'  => 'Mars Yengeç\'te (düşme): koruyucu, duygusal ve aile odaklı bir güdülenme. Sevdiklerini savunmak için harekete geçer.',
			'Aslan'   => 'Mars Aslan\'da: dramatik, yaratıcı ve liderlik isteyen bir enerji. Sahneye çıkmak ve takdir görmek motive eder.',
			'Başak'   => 'Mars Başak\'ta: analitik, verimli ve detay odaklı eylem. Mükemmeliyetçi bir çalışma disiplinine sahiptir.',
			'Terazi'  => 'Mars Terazi\'de (sürgün): karar vermekte zorlanır ama ittifaklar kurmakta ustadır. Denge ve adalet için mücadele eder.',
			'Akrep'   => 'Mars Akrep\'te (yönetici): yoğun, stratejik ve güçlü bir iradeye sahip. Gizli güçleri harekete geçirir.',
			'Yay'     => 'Mars Yay\'da: ateşli, idealci ve özgürlük seven bir enerji. Keşif ve büyüme için harekete geçer.',
			'Oğlak'   => 'Mars Oğlak\'ta (yüceltme): disiplinli, stratejik ve uzun vadeli hedeflere odaklı. Kariyer ve statü için çalışır.',
			'Kova'    => 'Mars Kova\'da: yenilikçi, kolektif ve toplumsal değişim için savaşır. Alışılmadık yaklaşımları sever.',
			'Balık'   => 'Mars Balık\'ta (sürgün): sezgisel, ruhsal ve empatik bir eylem biçimi. Sessiz bir güçle hareket eder.',
		);

		return hc_adapter_planet_result( $slug, 'Mars', $p['birth_date'], $mars_el, $descs );
	}
);

// -------------------------------------------------------
// Jüpiter Burcu
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'jupiter-burcu-hesaplama',
	function ( array $p ) {
		$slug = 'jupiter-burcu-hesaplama';
		$err  = HC_Calculation_API::require_fields( $slug, $p, array( 'birth_date' ) );
		if ( $err ) {
			return $err;
		}

		$d = ( hc_adapter_planet_jd( strtotime( $p['birth_date'] ) ) - 2451543.5 );

		$jupiter_el = array(
			'N'  => 100.4542 + 0.0000276854 * $d,
			'i'  => 1.3030 - 0.0000000155 * $d,
			'w'  => 273.8777 + 0.0000164505 * $d,
			'a'  => 5.202561,
			'e'  => 0.048498,
			'M0' => 19.8950,
			'M1' => 0.0830853,
		);

		$descs = array(
			'Koç'     => 'Jüpiter Koç\'ta: şans ve büyüme, cesur adımlar atmak ve yeni yollar açmakla gelir. Öncü ve girişimci bir bolluk anlayışı.',
			'Boğa'    => 'Jüpiter Boğa\'da: bolluk ve bereket, maddi dünyayı güzelleştirmek ve kalıcı değerler yaratmakla gelir.',
			'İkizler' => 'Jüpiter İkizler\'de: büyüme ve bilgelik, bilgi toplamak, öğrenmek ve iletişim kurmakla gelir.',
			'Yengeç'  => 'Jüpiter Yengeç\'te (yüceltme): bolluk ve bereket, şefkat, aile ve duygusal bağlar yoluyla gelir.',
			'Aslan'   => 'Jüpiter Aslan\'da: şans ve büyüme, yaratıcılığını sergilemek, neşeli olmak ve cömertlik yapmakla gelir.',
			'Başak'   => 'Jüpiter Başak\'ta: şans ve gelişim, mükemmeliyetçilik, hizmet etme ve teknik detaylara odaklanma yoluyla gelir.',
			'Terazi'  => 'Jüpiter Terazi\'de: şans ve büyüme, ilişkiler, adalet ve sosyal uyum yoluyla gelir.',
			'Akrep'   => 'Jüpiter Akrep\'te: şans ve gelişim, derinleşmek, gizemleri çözmek ve ruhsal dönüşüm yoluyla gelir.',
			'Yay'     => 'Jüpiter Yay\'da (yönetici): şans ve bilgeliğin en saf hali. Keşfetmek, yeni kültürler tanımak ve felsefi gelişimle büyür.',
			'Oğlak'   => 'Jüpiter Oğlak\'ta (sürgün): şans ve büyüme, disiplin, hırs ve toplumsal statü kazanma yoluyla gelir.',
			'Kova'    => 'Jüpiter Kova\'da: şans ve büyüme, yenilikçilik, bağımsızlık ve toplumsal idealler peşinde koşmakla gelir.',
			'Balık'   => 'Jüpiter Balık\'ta (yönetici): bolluk ve bereket, sınırsız şefkat, hayal gücü ve maneviyat yoluyla gelir.',
		);

		return hc_adapter_planet_result( $slug, 'Jüpiter', $p['birth_date'], $jupiter_el, $descs );
	}
);

// -------------------------------------------------------
// Satürn Burcu
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'saturn-burcu-hesaplama',
	function ( array $p ) {
		$slug = 'saturn-burcu-hesaplama';
		$err  = HC_Calculation_API::require_fields( $slug, $p, array( 'birth_date' ) );
		if ( $err ) {
			return $err;
		}

		$d = ( hc_adapter_planet_jd( strtotime( $p['birth_date'] ) ) - 2451543.5 );

		$saturn_el = array(
			'N'  => 113.6634 + 0.000023981 * $d,
			'i'  => 2.4886 - 0.0000001081 * $d,
			'w'  => 339.3939 + 0.0000297661 * $d,
			'a'  => 9.55475,
			'e'  => 0.055546 - 0.00000000949 * $d,
			'M0' => 316.9670,
			'M1' => 0.033444228,
		);

		$descs = array(
			'Koç'     => 'Satürn Koç\'ta: hayat dersleri sabır, öz disiplin ve öfke kontrolü üzerine. Enerjini plana sadık kalarak kullanmayı öğrenir.',
			'Boğa'    => 'Satürn Boğa\'da: hayat dersleri maddi güvenlik, öz değer ve kalıcılık üzerine. Kaynakları yönetmek ve emek vermek öğrenilir.',
			'İkizler' => 'Satürn İkizler\'de: sorumluluklar iletişim, eğitim ve zihinsel disiplin alanında. Derinlemesine öğrenme ve odaklanma öğrenilir.',
			'Yengeç'  => 'Satürn Yengeç\'te: hayat dersleri duygusal güvenlik, aile ve geçmişle yüzleşmek üzerine. İçsel güç inşa edilir.',
			'Aslan'   => 'Satürn Aslan\'da: sorumluluklar yaratıcılık, özgüven ve liderlik alanında. Dış onaydan bağımsız içsel güven geliştirilir.',
			'Başak'   => 'Satürn Başak\'ta: hayat dersleri düzen, sağlık ve mükemmeliyetçilik üzerine. Disiplinli çalışmayla uzmanlık kazanılır.',
			'Terazi'  => 'Satürn Terazi\'de (yüceltme): sorumluluklar ilişkiler, adalet ve diplomasi alanında. Kalıcı bağlar ve diplomatik güç gelişir.',
			'Akrep'   => 'Satürn Akrep\'ta: hayat dersleri güç, dönüşüm ve derin duygusal bağlar üzerine. Gölgeyle yüzleşmek ve yeniden doğmak.',
			'Yay'     => 'Satürn Yay\'da: sorumluluklar inançlar, felsefe ve etik değerler alanında. Dürüstlük ve sağlam dünya görüşü geliştirilir.',
			'Oğlak'   => 'Satürn Oğlak\'ta (yönetici): sorumluluğun ve disiplinin en saf hali. Sabır ve stratejiyle kalıcı başarı inşa edilir.',
			'Kova'    => 'Satürn Kova\'da (yönetici): sorumluluklar toplumsal idealler, bağımsızlık ve yenilikçilik alanında. Geleceği inşa eden sistemler kurulur.',
			'Balık'   => 'Satürn Balık\'ta: hayat dersleri sınır koymak, maneviyat ve fedakarlık üzerine. Kaosun içinde düzen kurmak öğrenilir.',
		);

		return hc_adapter_planet_result( $slug, 'Satürn', $p['birth_date'], $saturn_el, $descs );
	}
);

// -------------------------------------------------------
// Merkür Burcu
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'merkur-burcu-hesaplama',
	function ( array $p ) {
		$slug = 'merkur-burcu-hesaplama';
		$err  = HC_Calculation_API::require_fields( $slug, $p, array( 'birth_date' ) );
		if ( $err ) {
			return $err;
		}

		$d = ( hc_adapter_planet_jd( strtotime( $p['birth_date'] ) ) - 2451543.5 );

		$mercury_el = array(
			'N'  => 48.3313 + 0.0000324587 * $d,
			'i'  => 7.0047 + 0.00000005 * $d,
			'w'  => 77.4564 + 0.0000155447 * $d,
			'a'  => 0.387098,
			'e'  => 0.205635,
			'M0' => 174.7947,
			'M1' => 4.0923344,
		);

		$descs = array(
			'Koç'     => 'Merkür Koç\'ta: hızlı, doğrudan ve cesur düşünce biçimi. Net ve spontane iletişim tarzı; gördüğünü olduğu gibi ifade eder.',
			'Boğa'    => 'Merkür Boğa\'da: temkinli, sabırlı ve güçlü bellekli bir zihin. Pratik ve somut bilgiye değer verir.',
			'İkizler' => 'Merkür İkizler\'de (yönetici): kıvrak, meraklı ve çok yönlü zeka. Bilgiyi hızla işler, iletişimi ve bilgiyi sever.',
			'Yengeç'  => 'Merkür Yengeç\'te: duygusal hafıza ve sezgisel düşünce biçimi. Geçmiş deneyimlerden güçlü bağlantılar kurar.',
			'Aslan'   => 'Merkür Aslan\'da: yaratıcı, etkileyici ve özgüvenli ifade tarzı. Büyük resmi ve geniş perspektifi benimser.',
			'Başak'   => 'Merkür Başak\'ta (yönetici): titiz, analitik ve mükemmeliyetçi zeka. Detayları fark etme ve düzenleme ustası.',
			'Terazi'  => 'Merkür Terazi\'de: diplomatik ve dengeli düşünür. Her konunun iki tarafını değerlendiren adil bir zihin.',
			'Akrep'   => 'Merkür Akrep\'te: derinlemesine araştıran, gizli gerçekleri bulan ve stratejik iletişim kuran bir zeka.',
			'Yay'     => 'Merkür Yay\'da: felsefi, iyimser ve dürüst düşünce. Özgürlük ve büyük fikirler zihni besler.',
			'Oğlak'   => 'Merkür Oğlak\'ta: ciddi, gerçekçi ve uzun vadeli planlayan bir zihin. Disiplin ve pratiklik ön planda.',
			'Kova'    => 'Merkür Kova\'da: özgün, yenilikçi ve insancıl düşünce. Alışılmışın dışında çözümler üretir.',
			'Balık'   => 'Merkür Balık\'ta: sezgisel, sembolik ve hayal gücüyle dolu bir zihin. Şiirsel ve akışkan ifade tarzı.',
		);

		return hc_adapter_planet_result( $slug, 'Merkür', $p['birth_date'], $mercury_el, $descs );
	}
);
