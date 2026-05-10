<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_geometrik_ortalama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-geo-mean',
        HC_PLUGIN_URL . 'modules/geometrik-ortalama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-geo-mean-css',
        HC_PLUGIN_URL . 'modules/geometrik-ortalama-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-geo-mean">
        <h3>Geometrik Ortalama</h3>
        <p style="font-size:0.85rem; margin-bottom:10px;">Sayıları virgül veya boşlukla ayırarak giriniz.</p>
        <div class="hc-form-group">
            <label for="hc-gm-data">Sayılar:</label>
            <textarea id="hc-gm-data" rows="3" placeholder="2, 4, 8"></textarea>
        </div>
        <button class="hc-btn" onclick="hcGeoMeanHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-geo-mean-result">
            <strong>Geometrik Ortalama:</strong>
            <div id="hc-gm-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
