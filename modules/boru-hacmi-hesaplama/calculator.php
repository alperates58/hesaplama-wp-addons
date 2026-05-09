<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_boru_hacmi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-boru-hacmi-hesaplama',
        HC_PLUGIN_URL . 'modules/boru-hacmi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-boru-hacmi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/boru-hacmi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-boru-hacmi-hesaplama">
        <h3>Boru Hacmi ve Sıvı Kapasitesi</h3>
        <div class="hc-form-group">
            <label for="hc-bh-diam">İç Çap (mm)</label>
            <input type="number" id="hc-bh-diam" placeholder="Örn: 50" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-bh-len">Boru Uzunluğu (m)</label>
            <input type="number" id="hc-bh-len" placeholder="Örn: 10" step="any">
        </div>
        <button class="hc-btn" onclick="hcBHHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bh-result">
            <div class="hc-result-label">Toplam İç Hacim:</div>
            <div class="hc-result-value" id="hc-bh-val">-</div>
            <div class="hc-result-note">V = π * r² * L</div>
        </div>
    </div>
    <?php
}
