<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yuvarlama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gen-round',
        HC_PLUGIN_URL . 'modules/yuvarlama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-gr">
        <h3>Genel Yuvarlama Aracı</h3>
        <div class="hc-form-group">
            <label for="hc-gr-val">Sayı:</label>
            <input type="number" id="hc-gr-val" step="any" placeholder="12.345">
        </div>
        <div class="hc-form-group">
            <label>Yuvarlama Türü:</label>
            <select id="hc-gr-type">
                <option value="nearest">En Yakına (Standart)</option>
                <option value="up">Yukarı Yuvarla (Ceil)</option>
                <option value="down">Aşağı Yuvarla (Floor)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-gr-prec">Ondalık Basamak:</label>
            <input type="number" id="hc-gr-prec" min="0" max="10" value="0">
        </div>
        <button class="hc-btn" onclick="hcGenRoundHesapla()">Yuvarla</button>
        <div class="hc-result" id="hc-yuvarlama-result">
            <strong>Sonuç:</strong>
            <div id="hc-gr-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
