<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_beslenme_risk_skoru_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-nrs-2002',
        HC_PLUGIN_URL . 'modules/beslenme-risk-skoru-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-nrs">
        <h3>Beslenme Risk Skoru (NRS-2002)</h3>
        
        <p style="font-size: 0.9em; margin-bottom: 20px;">Lütfen aşağıdaki durumları hastanın mevcut tablosuna göre seçiniz:</p>

        <div class="hc-form-group">
            <label>1. Beslenme Durumu (Son 3 ayda kilo kaybı / gıda alımı)</label>
            <select id="hc-nrs-nutritional">
                <option value="0">Risk yok (Normal)</option>
                <option value="1">Hafif: 3 ayda >%5 kilo kaybı veya alımda %25-50 azalma</option>
                <option value="2">Orta: 2 ayda >%5 kilo kaybı veya alımda %50-75 azalma</option>
                <option value="3">Ağır: 1 ayda >%5 kilo kaybı (veya BMI < 18.5) veya alımda %75-100 azalma</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label>2. Hastalık Şiddeti (Stres Metabolizması)</label>
            <select id="hc-nrs-disease">
                <option value="0">Normal (Kronik hastalıklar vb.)</option>
                <option value="1">Hafif: Kalça kırığı, kronik komplikasyonlar, KOAH</option>
                <option value="2">Orta: Majör abdominal cerrahi, inme, şiddetli pnömoni</option>
                <option value="3">Ağır: Kafa travması, kemik iliği nakli, yoğun bakım hastaları</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label>3. Yaş</label>
            <select id="hc-nrs-age">
                <option value="0">70 yaş altı</option>
                <option value="1">70 yaş ve üzeri</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcNRSHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-beslenme-risk-result">
            <div class="hc-result-item">
                <span>Toplam NRS Skoru:</span>
                <div class="hc-result-value" id="hc-nrs-score">-</div>
            </div>
            <div id="hc-nrs-interpretation" style="margin-top: 15px; padding: 10px; border-radius: 5px; text-align: center; font-weight: bold;">
                <!-- JS ile doldurulacak -->
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *Skor 3 ve üzeri ise hasta beslenme riski altındadır ve beslenme destek planı oluşturulmalıdır.
            </p>
        </div>
    </div>
    <?php
}
