<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kolonya_alkol_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kolonya-alkol-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/kolonya-alkol-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kolonya-alkol-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kolonya-alkol-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cologne">
        <h3>Kolonya Alkol / Su Oranı</h3>
        <div class="hc-form-group">
            <label for="hc-col-total">Hedef Toplam Hacim (mL)</label>
            <input type="number" id="hc-col-total" placeholder="Örn: 1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-col-target">Hedef Derece (°)</label>
            <input type="number" id="hc-col-target" value="80" placeholder="Örn: 70, 80">
        </div>
        <div class="hc-form-group">
            <label for="hc-col-source">Kaynak Alkol Derecesi (°)</label>
            <input type="number" id="hc-col-source" value="96" placeholder="Örn: 96">
        </div>
        <button class="hc-btn" onclick="hcKolonyaAlkolOranıHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-col-result">
            <div id="hc-col-stats" style="text-align:left; font-size:1.1em; line-height:1.8;"></div>
        </div>
    </div>
    <?php
}
