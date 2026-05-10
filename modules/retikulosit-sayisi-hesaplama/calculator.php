<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_retikulosit_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-retikulosit-sayisi-hesaplama',
        HC_PLUGIN_URL . 'modules/retikulosit-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-retikulosit-sayisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/retikulosit-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-reticulocyte">
        <h3>Düzeltilmiş Retikülosit Sayısı</h3>
        <div class="hc-form-group">
            <label for="hc-rs-perc">Retikülosit Oranı (%)</label>
            <input type="number" id="hc-rs-perc" placeholder="Örn: 2" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-rs-hct">Hasta Hematokrit (%)</label>
            <input type="number" id="hc-rs-hct" placeholder="Örn: 30">
        </div>
        <div class="hc-form-group">
            <label for="hc-rs-normal">Normal Hematokrit (%)</label>
            <input type="number" id="hc-rs-normal" value="45">
        </div>
        <button class="hc-btn" onclick="hcRetikülositHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-rs-result">
            <div class="hc-result-label">Düzeltilmiş Sayı:</div>
            <div class="hc-result-value" id="hc-rs-val">-</div>
            <p id="hc-rs-desc" style="margin-top:10px; font-size:0.9em;"></p>
        </div>
    </div>
    <?php
}
