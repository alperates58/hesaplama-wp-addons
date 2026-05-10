<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kereste_hacmi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lumber-vol',
        HC_PLUGIN_URL . 'modules/kereste-hacmi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-lumber-vol-css',
        HC_PLUGIN_URL . 'modules/kereste-hacmi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-lumber-vol">
        <h3>Kereste Hacmi Hesaplama</h3>
        <div class="hc-lumber-grid">
            <div class="hc-form-group">
                <label>Kalınlık (mm):</label>
                <input type="number" id="hc-lv-t" placeholder="50">
            </div>
            <div class="hc-form-group">
                <label>Genişlik (mm):</label>
                <input type="number" id="hc-lv-w" placeholder="100">
            </div>
            <div class="hc-form-group">
                <label>Boy (m):</label>
                <input type="number" id="hc-lv-l" placeholder="4">
            </div>
            <div class="hc-form-group">
                <label>Adet:</label>
                <input type="number" id="hc-lv-n" placeholder="1">
            </div>
        </div>
        <button class="hc-btn" onclick="hcLumberVolHesapla()">Hacmi Hesapla</button>
        <div class="hc-result" id="hc-lumber-vol-result">
            <strong>Toplam Hacim:</strong>
            <div id="hc-lv-res-val" class="hc-result-value">-</div>
            <span>Metreküp (m³)</span>
        </div>
    </div>
    <?php
}
