<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tereyagi_yag_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-butter-fat',
        HC_PLUGIN_URL . 'modules/tereyagi-yag-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-butter-fat-calc">
        <h3>Tereyağı Yağ Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-bf-weight">Tereyağı Miktarı (g):</label>
            <input type="number" id="hc-bf-weight" placeholder="250">
        </div>
        <div class="hc-form-group">
            <label for="hc-bf-pct">Yağ Oranı (%):</label>
            <input type="number" id="hc-bf-pct" value="82">
        </div>
        <button class="hc-btn" onclick="hcButterFatHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-butter-fat-result">
            <strong>Analiz Sonucu:</strong>
            <div id="hc-bf-res-list" style="margin-top:10px;">-</div>
        </div>
    </div>
    <?php
}
