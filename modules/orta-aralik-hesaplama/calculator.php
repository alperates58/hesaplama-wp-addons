<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_orta_aralik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-orta-aralik-hesaplama',
        HC_PLUGIN_URL . 'modules/orta-aralik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-orta-aralik-hesaplama-css',
        HC_PLUGIN_URL . 'modules/orta-aralik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-orta-aralik-hesaplama">
        <h3>Orta Aralık (Midrange) Hesaplama</h3>
        <p>Verileri virgül veya boşluk ile ayırarak giriniz.</p>
        <div class="hc-form-group">
            <label for="hc-mr-data">Veri Seti</label>
            <textarea id="hc-mr-data" rows="4" placeholder="10, 20, 30, 40, 50"></textarea>
        </div>
        <button class="hc-btn" onclick="hcOrtaAralikHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-orta-aralik-hesaplama-result">
            <span class="hc-label">Orta Aralık (Midrange):</span>
            <div class="hc-result-value" id="hc-mr-res-value">0</div>
            <div id="hc-mr-res-minmax" style="margin-top:10px; color:#666;"></div>
        </div>
    </div>
    <?php
}
