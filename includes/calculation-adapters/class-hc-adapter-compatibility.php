<?php
/**
 * Uyum / ilişki hesaplama adapterleri.
 * Eğlence ve kişisel farkındalık amaçlıdır.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// -------------------------------------------------------
// Batı Burcu Uyumu
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'burc-uyumu-hesaplama',
	function ( array $p ) {
		$err = HC_Calculation_API::require_fields( 'burc-uyumu-hesaplama', $p, array( 'birth_date', 'partner_birth_date' ) );
		if ( $err ) {
			return $err;
		}

		$sign1 = hc_adapter_get_zodiac_data( $p['birth_date'] );
		$sign2 = hc_adapter_get_zodiac_data( $p['partner_birth_date'] );

		if ( ! $sign1 || ! $sign2 ) {
			return HC_Calculation_API::error( 'burc-uyumu-hesaplama', 'invalid_date', 'Geçersiz doğum tarihi.' );
		}

		// Element bazlı uyum tablosu
		$element_compat = array(
			'Ateş'   => array( 'Ateş' => 80, 'Hava' => 85, 'Toprak' => 50, 'Su' => 45 ),
			'Hava'   => array( 'Hava' => 80, 'Ateş' => 85, 'Su' => 60,     'Toprak' => 55 ),
			'Toprak' => array( 'Toprak' => 85, 'Su' => 85, 'Ateş' => 50,   'Hava' => 55 ),
			'Su'     => array( 'Su' => 85, 'Toprak' => 85, 'Hava' => 60,   'Ateş' => 45 ),
		);

		$el1    = $sign1['element'];
		$el2    = $sign2['element'];
		$score  = $element_compat[ $el1 ][ $el2 ] ?? 60;

		// Aynı burç bonusu
		if ( $sign1['name'] === $sign2['name'] ) {
			$score = min( 95, $score + 5 );
		}

		// Burç pozisyonları (1-12)
		$sign_order = array( 'Koç' => 1, 'Boğa' => 2, 'İkizler' => 3, 'Yengeç' => 4, 'Aslan' => 5, 'Başak' => 6, 'Terazi' => 7, 'Akrep' => 8, 'Yay' => 9, 'Oğlak' => 10, 'Kova' => 11, 'Balık' => 12 );
		$pos1       = $sign_order[ $sign1['name'] ] ?? 1;
		$pos2       = $sign_order[ $sign2['name'] ] ?? 1;
		$diff       = abs( $pos1 - $pos2 );
		if ( $diff > 6 ) {
			$diff = 12 - $diff;
		}

		// Trine (4 pozisyon aralığı = aynı element) → zaten element tablosunda yansıyor
		// Opposition (6 pozisyon) → manyetik ama zorlu; hafif ekstra
		if ( 6 === $diff ) {
			$score = min( 95, $score + 5 );
		}

		// Yorum tablosu
		if ( $score >= 85 ) {
			$level = 'Mükemmel Uyum';
			$desc  = $sign1['name'] . ' ve ' . $sign2['name'] . ' birbirini mükemmel tamamlar. Güçlü bir uyum ve ortak zemin mevcut.';
		} elseif ( $score >= 70 ) {
			$level = 'İyi Uyum';
			$desc  = $sign1['name'] . ' ve ' . $sign2['name'] . ' arasında iyi bir uyum var. Küçük farklılıklar ilişkiyi zenginleştirir.';
		} elseif ( $score >= 55 ) {
			$level = 'Orta Uyum';
			$desc  = $sign1['name'] . ' ve ' . $sign2['name'] . ' arasında geliştirilmesi gereken alanlar mevcut. İletişim anahtardır.';
		} else {
			$level = 'Zorlu Dinamik';
			$desc  = $sign1['name'] . ' ve ' . $sign2['name'] . ' farklı enerjiler taşır. Anlayış ve sabır gerektiren bir dinamik.';
		}

		return array(
			'title'       => 'Burç Uyumu',
			'value'       => $score,
			'unit'        => '%',
			'label'       => $sign1['symbol'] . ' ' . $sign1['name'] . ' × ' . $sign2['symbol'] . ' ' . $sign2['name'] . ' — ' . $level,
			'description' => $desc,
			'warnings'    => array( 'Eğlence ve kişisel farkındalık amaçlıdır. Gerçek ilişkiler çok daha karmaşık faktörler içerir.' ),
			'raw'         => array(
				'sign1'       => $sign1['name'],
				'sign2'       => $sign2['name'],
				'element1'    => $el1,
				'element2'    => $el2,
				'score'       => $score,
				'level'       => $level,
			),
		);
	}
);

// -------------------------------------------------------
// Çin Burcuna Göre Aşk Uyumu
// -------------------------------------------------------

HC_Calculation_API::register_adapter(
	'cin-burcuna-gore-ask-uyumu-hesaplama',
	function ( array $p ) {
		$err = HC_Calculation_API::require_fields( 'cin-burcuna-gore-ask-uyumu-hesaplama', $p, array( 'birth_date', 'partner_birth_date' ) );
		if ( $err ) {
			return $err;
		}

		$data1 = hc_adapter_chinese_zodiac_data( $p['birth_date'] );
		$data2 = hc_adapter_chinese_zodiac_data( $p['partner_birth_date'] );

		if ( ! $data1 || ! $data2 ) {
			return HC_Calculation_API::error( 'cin-burcuna-gore-ask-uyumu-hesaplama', 'invalid_date', 'Geçersiz doğum tarihi.' );
		}

		$idx1 = $data1['index']; // 0-11
		$idx2 = $data2['index'];

		// Çin astrolojisi uyum grupları (üçlü uyum grupları)
		$trine_groups = array(
			array( 0, 4, 8 ),   // Sıçan, Ejderha, Maymun
			array( 1, 5, 9 ),   // Öküz, Yılan, Horoz
			array( 2, 6, 10 ),  // Kaplan, At, Köpek
			array( 3, 7, 11 ),  // Tavşan, Keçi, Domuz
		);

		// Çatışma çiftleri (tam karşıtlar)
		$clash_pairs = array(
			array( 0, 6 ),   // Sıçan × At
			array( 1, 7 ),   // Öküz × Keçi
			array( 2, 8 ),   // Kaplan × Maymun
			array( 3, 9 ),   // Tavşan × Horoz
			array( 4, 10 ),  // Ejderha × Köpek
			array( 5, 11 ),  // Yılan × Domuz
		);

		// Aynı burç
		if ( $idx1 === $idx2 ) {
			$score = 78;
			$level = 'Yakın Uyum';
			$note  = 'Aynı Çin burcusunuz. Birbirinizi kolayca anlarsınız; monotonluktan kaçının.';
		} else {
			// Üçlü uyum grubunu kontrol et
			$same_trine = false;
			foreach ( $trine_groups as $group ) {
				if ( in_array( $idx1, $group, true ) && in_array( $idx2, $group, true ) ) {
					$same_trine = true;
					break;
				}
			}

			// Çatışma kontrolü
			$is_clash = false;
			foreach ( $clash_pairs as $pair ) {
				if ( ( $pair[0] === $idx1 && $pair[1] === $idx2 ) || ( $pair[1] === $idx1 && $pair[0] === $idx2 ) ) {
					$is_clash = true;
					break;
				}
			}

			if ( $same_trine ) {
				$score = 90;
				$level = 'Mükemmel Uyum';
				$note  = $data1['name'] . ' ve ' . $data2['name'] . ' aynı üçlü uyum grubunda yer alır. Güçlü bir uyum ve dayanışma söz konusu.';
			} elseif ( $is_clash ) {
				$score = 35;
				$level = 'Zorlu Dinamik';
				$note  = $data1['name'] . ' ve ' . $data2['name'] . ' Çin astrolojisinde çatışan burçlardır. Anlayış ve sabır ile aşılabilir.';
			} else {
				// Komşu veya tarafsız
				$diff  = abs( $idx1 - $idx2 );
				if ( $diff > 6 ) {
					$diff = 12 - $diff;
				}
				if ( 1 === $diff ) {
					$score = 58;
					$level = 'Ortanın Altı Uyum';
					$note  = 'Komşu burçlar olarak bazı uyumsuzluklar olabilir; ortak zemin bulmak çaba gerektirir.';
				} elseif ( 2 === $diff ) {
					$score = 65;
					$level = 'Orta Uyum';
					$note  = $data1['name'] . ' ve ' . $data2['name'] . ' arasında makul bir uyum var; iletişim güçlendirilebilir.';
				} elseif ( 4 === $diff ) {
					$score = 72;
					$level = 'İyi Uyum';
					$note  = 'Birbirini dengeleyebilecek özellikler taşıyorsunuz.';
				} else {
					$score = 68;
					$level = 'Orta Uyum';
					$note  = 'Nötr bir dinamik; ortak değerler ilişkiyi güçlendirir.';
				}
			}
		}

		return array(
			'title'       => 'Çin Burcuna Göre Aşk Uyumu',
			'value'       => $score,
			'unit'        => '%',
			'label'       => $data1['symbol'] . ' ' . $data1['name'] . ' × ' . $data2['symbol'] . ' ' . $data2['name'] . ' — ' . $level,
			'description' => $note,
			'warnings'    => array( 'Eğlence ve kişisel farkındalık amaçlıdır. Çin takvimi sınır aylarında ±1 yıl sapma gösterebilir.' ),
			'raw'         => array(
				'sign1'  => $data1['name'],
				'sign2'  => $data2['name'],
				'idx1'   => $idx1,
				'idx2'   => $idx2,
				'score'  => $score,
				'level'  => $level,
			),
		);
	}
);
