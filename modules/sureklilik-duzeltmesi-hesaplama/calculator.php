<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sureklilik_duzeltmesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cont-corr',
        HC_PLUGIN_URL . 'modules/sureklilik-duzeltmesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cont-corr-css',
        HC_PLUGIN_URL . 'modules/sureklilik-duzeltmesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cont-corr">
        <h3>Süreklilik Düzeltmesi</h3>
        <div class="hc-form-group">
            <label for="hc-cc-x">Kesikli Değer (x)</label>
            <input type="number" id="hc-cc-x" value="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-cc-type">Sorgu Türü</label>
            <select id="hc-cc-type">
                <option value="eq">X = x</option>
                <option value="le">X ≤ x</option>
                <option value="ge">X ≥ x</option>
                <option value="lt">X < x</option>
                <option value="gt">X > x</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcContCorrHesapla()">Düzeltmeyi Uygula</button>
        <div class="hc-result" id="hc-cont-corr-result">
            <div class="hc-result-item">
                <span>Düzeltilmiş Aralık:</span>
                <span class="hc-result-value" id="hc-res-cc-val">-</span>
            </div>
            <p class="hc-cc-note">Not: Binom dağılımını normal dağılıma yaklaştırırken ±0.5 düzeltmesi yapılır.</p>
        </div>
    </div>
    <?php
}
