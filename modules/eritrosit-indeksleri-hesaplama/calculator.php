<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_eritrosit_indeksleri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-eritrosit-indeksleri-hesaplama',
        HC_PLUGIN_URL . 'modules/eritrosit-indeksleri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-eritrosit-indeksleri-hesaplama-css',
        HC_PLUGIN_URL . 'modules/eritrosit-indeksleri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rbc-indices">
        <h3>Eritrosit İndeksleri (MCV, MCH, MCHC)</h3>
        <div class="hc-form-group">
            <label for="hc-ri-hb">Hemoglobin (g/dL)</label>
            <input type="number" id="hc-ri-hb" placeholder="14" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-ri-hct">Hematokrit (%)</label>
            <input type="number" id="hc-ri-hct" placeholder="42">
        </div>
        <div class="hc-form-group">
            <label for="hc-ri-rbc">RBC (Alyuvar) Sayısı (milyon/µL)</label>
            <input type="number" id="hc-ri-rbc" placeholder="4.5" step="0.01">
        </div>
        <button class="hc-btn" onclick="hcEritrositİndeksleriHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ri-result">
            <div id="hc-ri-stats" style="text-align:left; font-size:1em; line-height:1.8;"></div>
        </div>
    </div>
    <?php
}
