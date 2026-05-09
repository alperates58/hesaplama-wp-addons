<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kolesterol_birimi_donusturme( $atts ) {
    wp_enqueue_script(
        'hc-kol-conv',
        HC_PLUGIN_URL . 'modules/kolesterol-birimi-donusturme/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-kolesterol-birimi-donusturme">
        <h3>Kolesterol Birimi Dönüştürme Hesaplama</h3>
        <div class="hc-form-group">
            <label>Değer</label>
            <input type="number" id="hc-kcv-val" step="0.01" placeholder="Örn: 200">
        </div>
        <div class="hc-form-group">
            <label>Kaynak Birim</label>
            <select id="hc-kcv-from">
                <option value="mgdl">mg/dL</option>
                <option value="mmoll">mmol/L</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcKolConvHesapla()">Dönüştür</button>
        <div class="hc-result" id="hc-kcv-result">
            <div class="hc-result-value" id="hc-kcv-res">-</div>
        </div>
    </div>
    <?php
}
