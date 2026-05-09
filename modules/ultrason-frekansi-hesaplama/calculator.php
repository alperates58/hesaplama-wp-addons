<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ultrason_frekansi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ultrasound-freq',
        HC_PLUGIN_URL . 'modules/ultrason-frekansi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ultrasound-freq-css',
        HC_PLUGIN_URL . 'modules/ultrason-frekansi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ultrasound-freq">
        <h3>Ultrason Frekans Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-uf-v">Ortamdaki Ses Hızı (v) [m/s]</label>
            <input type="number" id="hc-uf-v" value="1540">
            <small>Yumuşak doku için ~1540 m/s</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-uf-wave">Dalga Boyu (λ) [mm]</label>
            <input type="number" id="hc-uf-wave" value="0.5" step="0.01">
        </div>
        <button class="hc-btn" onclick="hcUltrasoundFreqHesapla()">Frekansı Hesapla</button>
        <div class="hc-result" id="hc-ultrasound-freq-result">
            <div class="hc-result-item">
                <span>Frekans (f):</span>
                <span class="hc-result-value" id="hc-res-uf-val">0 MHz</span>
            </div>
        </div>
    </div>
    <?php
}
