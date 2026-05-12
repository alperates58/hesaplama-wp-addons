<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sivi_yag_tereyagi_donusumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-oil-butter-conv-js',
        HC_PLUGIN_URL . 'modules/sivi-yag-tereyagi-donusumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-oil-butter-conv-css',
        HC_PLUGIN_URL . 'modules/sivi-yag-tereyagi-donusumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-oil-butter-conv">
        <h3>Sıvı Yağ - Tereyağı Dönüştürücü</h3>
        
        <div class="hc-form-group">
            <label for="hc-obc-amount">Miktar</label>
            <input type="number" id="hc-obc-amount" value="100" min="0" step="10">
        </div>

        <div class="hc-form-group">
            <label for="hc-obc-from">Birim</label>
            <select id="hc-obc-from">
                <option value="butter_to_oil">Tereyağı → Sıvı Yağ</option>
                <option value="oil_to_butter">Sıvı Yağ → Tereyağı</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcYagDonustur()">Dönüştür</button>

        <div class="hc-result" id="hc-oil-butter-conv-result">
            <div class="hc-result-item">
                <span>Dönüşüm Sonucu:</span>
                <strong class="hc-result-value" id="hc-obc-res-val">-</strong>
            </div>
            <div class="hc-result-note" id="hc-obc-note"></div>
        </div>
    </div>
    <?php
}
