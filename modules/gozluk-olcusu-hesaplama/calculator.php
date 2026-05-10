<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gozluk_olcusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gozluk-olcusu-hesaplama',
        HC_PLUGIN_URL . 'modules/gozluk-olcusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gozluk-olcusu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/gozluk-olcusu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-glasses">
        <h3>Gözlük Ölçüsü Rehberi</h3>
        <div class="hc-form-group">
            <label for="hc-gl-face">Yüz Genişliği (cm)</label>
            <input type="number" id="hc-gl-face" placeholder="Şakaklar arası mesafe">
        </div>
        <button class="hc-btn" onclick="hcGözlükÖlçüsüHesapla()">Ölçü Öner</button>
        <div class="hc-result" id="hc-gl-result">
            <div class="hc-result-label">Önerilen Ekartman (mm):</div>
            <div class="hc-result-value" id="hc-gl-val">-</div>
            <div id="hc-gl-details" style="margin-top:15px; font-size:0.85em; text-align:left; border-top:1px solid #eee; padding-top:10px;"></div>
        </div>
    </div>
    <?php
}
