<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kar_yuku_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-snow-load',
        HC_PLUGIN_URL . 'modules/kar-yuku-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-snow-load-css',
        HC_PLUGIN_URL . 'modules/kar-yuku-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-snow">
        <h3>Kar Yükü Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-sl-area">Çatı Yatay Alanı (m²):</label>
            <input type="number" id="hc-sl-area" placeholder="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-sl-depth">Kar Kalınlığı (cm):</label>
            <input type="number" id="hc-sl-depth" placeholder="30">
        </div>
        <div class="hc-form-group">
            <label for="hc-sl-type">Kar Tipi:</label>
            <select id="hc-sl-type">
                <option value="100">Taze Kar (~100 kg/m³)</option>
                <option value="300" selected>Sıkışmış Kar (~300 kg/m³)</option>
                <option value="500">Islak Kar / Buz (~500 kg/m³)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcSnowLoadHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-snow-result">
            <strong>Toplam Kar Yükü:</strong>
            <div id="hc-sl-res-val" class="hc-result-value">-</div>
            <span>Kilogram (kg)</span>
        </div>
    </div>
    <?php
}
