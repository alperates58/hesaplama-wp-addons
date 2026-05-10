<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_snowboard_tahtasi_boyu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-snow-len',
        HC_PLUGIN_URL . 'modules/snowboard-tahtasi-boyu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-snow-len-css',
        HC_PLUGIN_URL . 'modules/snowboard-tahtasi-boyu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-snow-len">
        <h3>Snowboard Boyu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-sl-height">Boyunuz (cm):</label>
            <input type="number" id="hc-sl-height" placeholder="180">
        </div>
        <div class="hc-form-group">
            <label for="hc-sl-style">Sürüş Tarzınız:</label>
            <select id="hc-sl-style">
                <option value="freestyle">Freestyle / Park (-3 cm)</option>
                <option value="all-mountain" selected>All Mountain (Standart)</option>
                <option value="freeride">Freeride / Bol Kar (+3 cm)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcSnowLenHesapla()">Boyutu Hesapla</button>
        <div class="hc-result" id="hc-snow-len-result">
            <strong>Önerilen Tahta Boyu:</strong>
            <div id="hc-sl-res-val" class="hc-result-value">-</div>
            <span>Santimetre (cm)</span>
        </div>
    </div>
    <?php
}
