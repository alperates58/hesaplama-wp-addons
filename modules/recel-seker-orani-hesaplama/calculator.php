<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_recel_seker_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-jam-sugar',
        HC_PLUGIN_URL . 'modules/recel-seker-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-jam-sugar-calc">
        <h3>Reçel Şeker Ölçüsü</h3>
        <div class="hc-form-group">
            <label for="hc-jam-fruit">Meyve Miktarı (kg):</label>
            <input type="number" id="hc-jam-fruit" placeholder="1" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-jam-type">Reçel Türü:</label>
            <select id="hc-jam-type">
                <option value="1">Geleneksel (1:1 Oranı)</option>
                <option value="0.75">Az Şekerli (1:0.75 Oranı)</option>
                <option value="0.5">Meyve Tadı Yoğun (1:0.5 Oranı)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcJamSugarHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-jam-sugar-result">
            <strong>Gereken Şeker:</strong>
            <div id="hc-jam-val" class="hc-result-value">-</div>
            <p id="hc-jam-info"></p>
        </div>
    </div>
    <?php
}
