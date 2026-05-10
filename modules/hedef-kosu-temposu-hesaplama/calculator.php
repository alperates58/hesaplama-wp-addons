<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hedef_kosu_temposu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-target-run-pace',
        HC_PLUGIN_URL . 'modules/hedef-kosu-temposu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-target-run-pace-css',
        HC_PLUGIN_URL . 'modules/hedef-kosu-temposu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-target-run-pace">
        <h3>Hedef Koşu Temposu</h3>
        <div class="hc-form-group">
            <label for="hc-trt-dist">Mesafe (km):</label>
            <input type="number" id="hc-trt-dist" step="0.1" placeholder="5.0">
        </div>
        <div class="hc-form-group">
            <label>Hedef Süre (Saat : Dakika : Saniye):</label>
            <div style="display:flex; gap:5px;">
                <input type="number" id="hc-trt-hr" placeholder="0" style="flex:1;">
                <input type="number" id="hc-trt-min" placeholder="25" style="flex:1;">
                <input type="number" id="hc-trt-sec" placeholder="0" style="flex:1;">
            </div>
        </div>
        <button class="hc-btn" onclick="hcTargetRunPaceHesapla()">Tempoyu Hesapla</button>
        <div class="hc-result" id="hc-target-run-pace-result">
            <strong>Gereken Tempo:</strong>
            <div id="hc-trt-res-val" class="hc-result-value">-</div>
            <span>dk / km</span>
        </div>
    </div>
    <?php
}
