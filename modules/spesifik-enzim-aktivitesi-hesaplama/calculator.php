<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_spesifik_enzim_aktivitesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-enz-act',
        HC_PLUGIN_URL . 'modules/spesifik-enzim-aktivitesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-enz-act-css',
        HC_PLUGIN_URL . 'modules/spesifik-enzim-aktivitesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-enz-act">
        <h3>Spesifik Enzim Aktivitesi</h3>
        <div class="hc-form-group">
            <label for="hc-ea-total">Toplam Enzim Aktivitesi (U):</label>
            <input type="number" id="hc-ea-total" step="0.1" placeholder="500">
        </div>
        <div class="hc-form-group">
            <label for="hc-ea-protein">Toplam Protein Miktarı (mg):</label>
            <input type="number" id="hc-ea-protein" step="0.1" placeholder="10">
        </div>
        <button class="hc-btn" onclick="hcEnzimActHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-enz-act-result">
            <strong>Spesifik Aktivite:</strong>
            <div id="hc-ea-res-val" class="hc-result-value">-</div>
            <span>U / mg</span>
        </div>
    </div>
    <?php
}
