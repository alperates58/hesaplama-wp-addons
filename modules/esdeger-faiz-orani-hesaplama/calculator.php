<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_esdeger_faiz_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-esdeger-faiz-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/esdeger-faiz-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-esdeger-faiz-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/esdeger-faiz-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-esdeger-faiz-orani">
        <h3>Eşdeğer Faiz Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-efo-rate1">Mevcut Faiz Oranı (%)</label>
            <input type="number" id="hc-efo-rate1" placeholder="Örn: 40" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-efo-period1">Mevcut Vade Dönemi (Gün)</label>
            <input type="number" id="hc-efo-period1" placeholder="Örn: 30" step="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-efo-period2">Hedef Vade Dönemi (Gün)</label>
            <input type="number" id="hc-efo-period2" placeholder="Örn: 365" step="1">
        </div>
        <button class="hc-btn" onclick="hcEsdegerFaizOraniHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-efo-result">
            <p>Eşdeğer Faiz Oranı:</p>
            <div class="hc-result-value" id="hc-efo-value">-</div>
            <p class="hc-small-text">Belirtilen iki farklı vade sonunda aynı getiriyi sağlayan faiz oranıdır.</p>
        </div>
    </div>
    <?php
}
