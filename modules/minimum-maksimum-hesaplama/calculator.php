<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_minimum_maksimum_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-minimum-maksimum-hesaplama',
        HC_PLUGIN_URL . 'modules/minimum-maksimum-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-minimum-maksimum-hesaplama-css',
        HC_PLUGIN_URL . 'modules/minimum-maksimum-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-minimum-maksimum-hesaplama">
        <h3>Minimum ve Maksimum Hesaplama</h3>
        <p>Sayıları virgül veya boşluk ile ayırarak giriniz.</p>
        <div class="hc-form-group">
            <label for="hc-minmax-data">Veri Seti</label>
            <textarea id="hc-minmax-data" rows="4" placeholder="50, 12, 89, 4, 33, 76"></textarea>
        </div>
        <button class="hc-btn" onclick="hcMinMaxHesapla()">Bul</button>
        <div class="hc-result" id="hc-minimum-maksimum-hesaplama-result">
            <div class="hc-result-grid">
                <div class="hc-res-item">
                    <span class="hc-label">Minimum (En Küçük):</span>
                    <span class="hc-value" id="hc-minmax-res-min">-</span>
                </div>
                <div class="hc-res-item">
                    <span class="hc-label">Maksimum (En Büyük):</span>
                    <span class="hc-value" id="hc-minmax-res-max">-</span>
                </div>
            </div>
            <div id="hc-minmax-res-range" style="margin-top:15px; font-weight:bold; color:#666;"></div>
        </div>
    </div>
    <?php
}
