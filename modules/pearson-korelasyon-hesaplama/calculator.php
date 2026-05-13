<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pearson_korelasyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pearson-korelasyon-hesaplama',
        HC_PLUGIN_URL . 'modules/pearson-korelasyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pearson-korelasyon-hesaplama-css',
        HC_PLUGIN_URL . 'modules/pearson-korelasyon-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pearson-korelasyon-hesaplama">
        <h3>Pearson Korelasyon Hesaplama</h3>
        <p>Veri çiftlerini her satıra bir çift (X, Y) gelecek şekilde giriniz.</p>
        <div class="hc-form-group">
            <label for="hc-pearson-data">Veri Çiftleri (X, Y)</label>
            <textarea id="hc-pearson-data" rows="6" placeholder="10, 100&#10;12, 110&#10;15, 130&#10;20, 180"></textarea>
        </div>
        <button class="hc-btn" onclick="hcPearsonHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-pearson-korelasyon-hesaplama-result">
            <span class="hc-label">Korelasyon Katsayısı (r):</span>
            <div class="hc-result-value" id="hc-pearson-r-value">0</div>
            <div id="hc-pearson-interpretation" style="margin-top:15px; font-weight:bold;"></div>
        </div>
    </div>
    <?php
}
