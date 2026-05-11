<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sortino_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sortino-calc',
        HC_PLUGIN_URL . 'modules/sortino-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sortino-calc-css',
        HC_PLUGIN_URL . 'modules/sortino-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sortino">
        <h3>Sortino Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-st-return">Portföy / Varlık Getirisi (%)</label>
            <input type="number" id="hc-st-return" placeholder="Örn: 30">
        </div>
        <div class="hc-form-group">
            <label for="hc-st-riskfree">Risksiz Getiri Oranı (%)</label>
            <input type="number" id="hc-st-riskfree" placeholder="Örn: 10">
        </div>
        <div class="hc-form-group">
            <label for="hc-st-downside">Aşağı Yönlü Sapma (Downside Deviation %)</label>
            <input type="number" id="hc-st-downside" placeholder="Örn: 12">
        </div>
        <button class="hc-btn" onclick="hcSortinoHesapla()">Sortino Oranını Hesapla</button>
        <div class="hc-result" id="hc-st-result">
            <div class="hc-result-item">
                <span>Sortino Oranı:</span>
                <strong class="hc-result-value" id="hc-st-res-total">-</strong>
            </div>
            <p id="hc-st-comment" class="hc-small-text"></p>
        </div>
    </div>
    <?php
}
