<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_medyan_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-medyan-hesaplama',
        HC_PLUGIN_URL . 'modules/medyan-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-medyan-hesaplama-css',
        HC_PLUGIN_URL . 'modules/medyan-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-medyan-hesaplama">
        <h3>Medyan (Ortanca) Hesaplama</h3>
        <p>Verileri virgül veya boşluk ile ayırarak giriniz.</p>
        <div class="hc-form-group">
            <label for="hc-median-data">Veri Seti</label>
            <textarea id="hc-median-data" rows="4" placeholder="10, 20, 30, 40, 50"></textarea>
        </div>
        <button class="hc-btn" onclick="hcMedyanHesapla()">Medyanı Bul</button>
        <div class="hc-result" id="hc-medyan-hesaplama-result">
            <span class="hc-label">Medyan Değeri:</span>
            <div class="hc-result-value" id="hc-median-res-val">-</div>
            <div id="hc-median-res-sorted" style="margin-top:10px; font-size:0.9rem; color:#666;"></div>
        </div>
    </div>
    <?php
}
