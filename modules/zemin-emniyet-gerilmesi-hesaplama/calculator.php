<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_zemin_emniyet_gerilmesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-soil-bearing',
        HC_PLUGIN_URL . 'modules/zemin-emniyet-gerilmesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-soil-bearing-css',
        HC_PLUGIN_URL . 'modules/zemin-emniyet-gerilmesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-soil-bearing">
        <h3>Zemin Emniyet Gerilmesi</h3>
        <div class="hc-form-group">
            <label for="hc-sb-qu">Nihai Taşıma Gücü (qu) [kPa]</label>
            <input type="number" id="hc-sb-qu" value="300" step="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-sb-fs">Güvenlik Katsayısı (FS)</label>
            <input type="number" id="hc-sb-fs" value="3" step="0.1" min="1">
        </div>
        <button class="hc-btn" onclick="hcSoilBearingHesapla()">Emniyet Gerilmesini Hesapla</button>
        <div class="hc-result" id="hc-soil-bearing-result">
            <div class="hc-result-item">
                <span>Emniyet Gerilmesi (qem):</span>
                <span class="hc-result-value" id="hc-res-sb-val">0 kPa</span>
            </div>
            <p class="hc-sb-note">qem = qu / FS</p>
        </div>
    </div>
    <?php
}
