<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunluk_kafein_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-daily-caff',
        HC_PLUGIN_URL . 'modules/gunluk-kafein-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-daily-caff-calc">
        <h3>Günlük Kafein Miktarı</h3>
        <div class="hc-form-group">
            <label>Filtre Kahve (Fincan):</label>
            <input type="number" id="hc-caff-filter" placeholder="0" class="hc-caff-input">
        </div>
        <div class="hc-form-group">
            <label>Espresso (Shot):</label>
            <input type="number" id="hc-caff-espresso" placeholder="0" class="hc-caff-input">
        </div>
        <div class="hc-form-group">
            <label>Türk Kahvesi (Fincan):</label>
            <input type="number" id="hc-caff-turkish" placeholder="0" class="hc-caff-input">
        </div>
        <div class="hc-form-group">
            <label>Siyah Çay (Bardak):</label>
            <input type="number" id="hc-caff-tea" placeholder="0" class="hc-caff-input">
        </div>
        <div class="hc-form-group">
            <label>Enerji İçeceği (Kutu - 250ml):</label>
            <input type="number" id="hc-caff-energy" placeholder="0" class="hc-caff-input">
        </div>
        <button class="hc-btn" onclick="hcDailyCaffHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-daily-caff-result">
            <strong>Toplam Kafein:</strong>
            <div id="hc-caff-total" class="hc-result-value">-</div>
            <p id="hc-caff-status"></p>
        </div>
    </div>
    <?php
}
