<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_delik_hacmi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hole-vol',
        HC_PLUGIN_URL . 'modules/delik-hacmi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hole-vol-css',
        HC_PLUGIN_URL . 'modules/delik-hacmi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hole-vol">
        <h3>Delik Hacmi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-hv-diam">Delik Çapı (cm):</label>
            <input type="number" id="hc-hv-diam" placeholder="30">
        </div>
        <div class="hc-form-group">
            <label for="hc-hv-depth">Delik Derinliği (cm):</label>
            <input type="number" id="hc-hv-depth" placeholder="80">
        </div>
        <button class="hc-btn" onclick="hcHoleVolHesapla()">Hacmi Hesapla</button>
        <div class="hc-result" id="hc-hole-vol-result">
            <strong>Toplam Hacim:</strong>
            <div id="hc-hv-res-val" class="hc-result-value">-</div>
            <span>Litre (L)</span>
            <p id="hc-hv-res-cum" style="margin-top:10px; font-size:0.85rem;"></p>
        </div>
    </div>
    <?php
}
