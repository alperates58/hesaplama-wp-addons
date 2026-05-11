<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_capm_beklenen_getiri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-capm-calc',
        HC_PLUGIN_URL . 'modules/capm-beklenen-getiri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-capm-calc-css',
        HC_PLUGIN_URL . 'modules/capm-beklenen-getiri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-capm">
        <h3>CAPM Beklenen Getiri Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cp-riskfree">Risksiz Getiri Oranı (%)</label>
            <input type="number" id="hc-cp-riskfree" placeholder="Örn: 10">
        </div>
        <div class="hc-form-group">
            <label for="hc-cp-beta">Hisse / Varlık Betası (β)</label>
            <input type="number" id="hc-cp-beta" placeholder="Örn: 1.2" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-cp-market">Pazar (Endeks) Beklenen Getirisi (%)</label>
            <input type="number" id="hc-cp-market" placeholder="Örn: 20">
        </div>
        <button class="hc-btn" onclick="hcCapmHesapla()">Beklenen Getiriyi Hesapla</button>
        <div class="hc-result" id="hc-cp-result">
            <div class="hc-result-item">
                <span>Pazar Risk Primi:</span>
                <strong id="hc-cp-res-premium">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Beklenen Getiri (E[R]):</span>
                <strong class="hc-result-value" id="hc-cp-res-total">-</strong>
            </div>
        </div>
    </div>
    <?php
}
