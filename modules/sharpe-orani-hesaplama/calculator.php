<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sharpe_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sharpe-calc',
        HC_PLUGIN_URL . 'modules/sharpe-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sharpe-calc-css',
        HC_PLUGIN_URL . 'modules/sharpe-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sharpe">
        <h3>Sharpe Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-so-return">Portföy / Varlık Getirisi (%)</label>
            <input type="number" id="hc-so-return" placeholder="Örn: 25">
        </div>
        <div class="hc-form-group">
            <label for="hc-so-riskfree">Risk-Free (Risksiz) Getiri Oranı (%)</label>
            <input type="number" id="hc-so-riskfree" placeholder="Örn: 10">
        </div>
        <div class="hc-form-group">
            <label for="hc-so-std">Standart Sapma (Volatilite %)</label>
            <input type="number" id="hc-so-std" placeholder="Örn: 15">
        </div>
        <button class="hc-btn" onclick="hcSharpeHesapla()">Sharpe Oranını Hesapla</button>
        <div class="hc-result" id="hc-so-result">
            <div class="hc-result-item">
                <span>Sharpe Oranı:</span>
                <strong class="hc-result-value" id="hc-so-res-total">-</strong>
            </div>
            <p id="hc-so-comment" class="hc-small-text"></p>
        </div>
    </div>
    <?php
}
