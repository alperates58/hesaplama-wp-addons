<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_harmonik_ortalama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-harm-mean',
        HC_PLUGIN_URL . 'modules/harmonik-ortalama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-harm-mean-css',
        HC_PLUGIN_URL . 'modules/harmonik-ortalama-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-harm-mean">
        <h3>Harmonik Ortalama</h3>
        <p style="font-size:0.85rem; margin-bottom:10px;">Sayıları virgül veya boşlukla ayırarak giriniz.</p>
        <div class="hc-form-group">
            <label for="hc-ha-data">Sayılar:</label>
            <textarea id="hc-ha-data" rows="3" placeholder="2, 4, 8"></textarea>
        </div>
        <button class="hc-btn" onclick="hcHarmMeanHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-harm-mean-result">
            <strong>Harmonik Ortalama:</strong>
            <div id="hc-ha-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
