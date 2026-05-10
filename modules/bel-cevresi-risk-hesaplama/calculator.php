<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bel_cevresi_risk_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-waist-risk',
        HC_PLUGIN_URL . 'modules/bel-cevresi-risk-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-waist-risk-css',
        HC_PLUGIN_URL . 'modules/bel-cevresi-risk-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-waist-risk">
        <h3>Bel Çevresi Risk Analizi</h3>
        <div class="hc-form-group">
            <label>Cinsiyet:</label>
            <div style="display:flex; gap:10px;">
                <label><input type="radio" name="hc-wr-gender" value="male" checked> Erkek</label>
                <label><input type="radio" name="hc-wr-gender" value="female"> Kadın</label>
            </div>
        </div>
        <div class="hc-form-group">
            <label for="hc-wr-waist">Bel Çevresi (cm):</label>
            <input type="number" id="hc-wr-waist" placeholder="90">
        </div>
        <button class="hc-btn" onclick="hcWaistRiskHesapla()">Analiz Et</button>
        <div class="hc-result" id="hc-waist-risk-result">
            <div id="hc-wr-res-title" style="font-weight:bold; font-size:1.2rem; margin-bottom:10px;"></div>
            <p id="hc-wr-res-desc"></p>
        </div>
    </div>
    <?php
}
