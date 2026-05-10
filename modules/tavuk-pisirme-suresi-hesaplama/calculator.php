<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tavuk_pisirme_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-chicken-cook',
        HC_PLUGIN_URL . 'modules/tavuk-pisirme-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-chicken-cook-calc">
        <h3>Tavuk Pişirme Süresi</h3>
        <div class="hc-form-group">
            <label for="hc-cc-weight">Tavuk Ağırlığı (kg):</label>
            <input type="number" id="hc-cc-weight" placeholder="1.5" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-cc-method">Yöntem:</label>
            <select id="hc-cc-method">
                <option value="oven">Fırında (Bütün)</option>
                <option value="boil">Haşlama</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcChickenCookHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-chicken-cook-result">
            <strong>Tahmini Süre:</strong>
            <div id="hc-cc-res" class="hc-result-value">-</div>
            <p id="hc-cc-info"></p>
        </div>
    </div>
    <?php
}
