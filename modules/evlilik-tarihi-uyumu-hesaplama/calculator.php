<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_evlilik_tarihi_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-evlilik-tarihi-uyumu',
        HC_PLUGIN_URL . 'modules/evlilik-tarihi-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-evlilik-tarihi-uyumu-css',
        HC_PLUGIN_URL . 'modules/evlilik-tarihi-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-evlilik-tarihi-uyumu">
        <h3>Evlilik Tarihi Uyumu Hesaplama</h3>
        <div class="hc-form-group">
            <label>Planlanan Evlilik Tarihi</label>
            <input type="date" id="hc-wedding-date" class="hc-input">
        </div>
        <hr style="margin:20px 0; opacity:0.1;">
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>1. Partner Doğum Tarihi</label>
                <input type="date" id="hc-w-p1-birth" class="hc-input">
            </div>
            <div class="hc-form-group">
                <label>2. Partner Doğum Tarihi</label>
                <input type="date" id="hc-w-p2-birth" class="hc-input">
            </div>
        </div>
        <button class="hc-btn" onclick="hcEvlilikTarihiUyumuHesapla()">Tarih Uyumu Analiz Et</button>
        <div class="hc-result" id="hc-evlilik-tarihi-uyumu-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Tarih Uyumu</span>
                <div class="hc-result-value" id="hc-wedding-score">-</div>
            </div>
            <div class="hc-wedding-analysis" id="hc-wedding-analysis">
                <!-- Analiz -->
            </div>
        </div>
    </div>
    <?php
}
