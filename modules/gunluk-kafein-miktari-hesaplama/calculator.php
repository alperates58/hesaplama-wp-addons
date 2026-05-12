<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunluk_kafein_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-caffeine-js',
        HC_PLUGIN_URL . 'modules/gunluk-kafein-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-caffeine-css',
        HC_PLUGIN_URL . 'modules/gunluk-kafein-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-caffeine">
        <h3>Günlük Kafein Miktarı Hesaplama</h3>
        
        <div class="hc-caffeine-inputs">
            <div class="hc-form-group">
                <label>Filtre Kahve (Adet/Fincan)</label>
                <input type="number" id="hc-caf-filter" value="0" min="0">
            </div>
            <div class="hc-form-group">
                <label>Espresso (Shot)</label>
                <input type="number" id="hc-caf-espresso" value="0" min="0">
            </div>
            <div class="hc-form-group">
                <label>Türk Kahvesi (Fincan)</label>
                <input type="number" id="hc-caf-turkish" value="0" min="0">
            </div>
            <div class="hc-form-group">
                <label>Siyah Çay (Bardak)</label>
                <input type="number" id="hc-caf-tea" value="0" min="0">
            </div>
            <div class="hc-form-group">
                <label>Enerji İçeceği (250ml Kutu)</label>
                <input type="number" id="hc-caf-energy" value="0" min="0">
            </div>
            <div class="hc-form-group">
                <label>Kola/Gazlı İçecek (330ml Kutu)</label>
                <input type="number" id="hc-caf-soda" value="0" min="0">
            </div>
        </div>

        <button class="hc-btn" onclick="hcKafeinHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-caffeine-result">
            <div class="hc-result-item">
                <span>Toplam Kafein:</span>
                <strong class="hc-result-value" id="hc-caf-total">-</strong>
            </div>
            <div class="hc-caf-status" id="hc-caf-status"></div>
            <div class="hc-progress-container">
                <div class="hc-progress-bar" id="hc-caf-progress"></div>
            </div>
            <div class="hc-result-note">2026 Sağlık Rehberi: Yetişkinler için güvenli günlük sınır 400 mg'dır.</div>
        </div>
    </div>
    <?php
}
