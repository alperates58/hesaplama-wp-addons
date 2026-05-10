<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yag_cekme_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-oil-absorption',
        HC_PLUGIN_URL . 'modules/yag-cekme-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-oil-abs-calc">
        <h3>Yağ Çekme Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-oa-type">Gıda Türü:</label>
            <select id="hc-oa-type">
                <option value="10">Patates Kızartması (~%10)</option>
                <option value="15">Hamur Kızartması (Pişi) (~%15)</option>
                <option value="20">Patlıcan Kızartması (~%20+)</option>
                <option value="5">Pane Et / Tavuk (~%5)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-oa-weight">Gıda Miktarı (g):</label>
            <input type="number" id="hc-oa-weight" placeholder="200">
        </div>
        <button class="hc-btn" onclick="hcOilAbsorptionHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-oil-absorption-result">
            <strong>Çekilen Yağ:</strong>
            <div id="hc-oa-val" class="hc-result-value">-</div>
            <p id="hc-oa-info"></p>
        </div>
    </div>
    <?php
}
