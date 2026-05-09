<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kolesterol_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kol-oran',
        HC_PLUGIN_URL . 'modules/kolesterol-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-kolesterol-orani-hesaplama">
        <h3>Kolesterol Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label>Total Kolesterol (mg/dL)</label>
            <input type="number" id="hc-kor-total" placeholder="Örn: 220">
        </div>
        <div class="hc-form-group">
            <label>LDL Kolesterol (mg/dL)</label>
            <input type="number" id="hc-kor-ldl" placeholder="Örn: 130">
        </div>
        <div class="hc-form-group">
            <label>HDL Kolesterol (mg/dL)</label>
            <input type="number" id="hc-kor-hdl" placeholder="Örn: 50">
        </div>
        <button class="hc-btn" onclick="hcKolOranHesapla()">Oranları Hesapla</button>
        <div class="hc-result" id="hc-kor-result">
            <div class="hc-result-value" id="hc-kor-status">-</div>
            <p id="hc-kor-detay"></p>
        </div>
    </div>
    <?php
}
