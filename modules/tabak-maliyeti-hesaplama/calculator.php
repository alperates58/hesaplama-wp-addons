<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tabak_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-plate-cost',
        HC_PLUGIN_URL . 'modules/tabak-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-plate-cost-calc">
        <h3>Tabak Maliyeti (Food Cost)</h3>
        <div class="hc-form-group">
            <label for="hc-pc-total-mat">Malzeme Giderleri Toplamı (₺):</label>
            <input type="number" id="hc-pc-total-mat" placeholder="150">
        </div>
        <div class="hc-form-group">
            <label for="hc-pc-waste">Fire Oranı (%):</label>
            <input type="number" id="hc-pc-waste" value="5">
        </div>
        <div class="hc-form-group">
            <label for="hc-pc-markup">Hedef Food Cost (%):</label>
            <select id="hc-pc-markup">
                <option value="25">%25 (Yüksek Kar)</option>
                <option value="30" selected>%30 (Standart)</option>
                <option value="35">%35 (Rekabetçi)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcPlateCostHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-plate-cost-result">
            <strong>Önerilen Satış Fiyatı:</strong>
            <div id="hc-pc-val" class="hc-result-value">-</div>
            <p id="hc-pc-info"></p>
        </div>
    </div>
    <?php
}
