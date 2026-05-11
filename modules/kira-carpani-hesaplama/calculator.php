<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kira_carpani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kira-carpani-hesaplama',
        HC_PLUGIN_URL . 'modules/kira-carpani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kira-carpani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kira-carpani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kira-carpani">
        <h3>Kira Çarpanı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-kc-price">Gayrimenkul Satış Fiyatı (₺)</label>
            <input type="number" id="hc-kc-price" placeholder="Örn: 5.000.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-kc-rent">Aylık Kira Getirisi (₺)</label>
            <input type="number" id="hc-kc-rent" placeholder="Örn: 25.000">
        </div>
        <button class="hc-btn" onclick="hcKiraCarpaniHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kc-result">
            <div class="hc-result-item">
                <span>Kira Çarpanı (Yıl):</span>
                <strong class="hc-result-value" id="hc-kc-value">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Kira Çarpanı (Ay):</span>
                <strong id="hc-kc-months">-</strong>
            </div>
            <p class="hc-small-text">Gayrimenkulün kendini kaç yılda/ayda amorti edeceğini gösteren temel bir yatırım ölçütüdür.</p>
        </div>
    </div>
    <?php
}
