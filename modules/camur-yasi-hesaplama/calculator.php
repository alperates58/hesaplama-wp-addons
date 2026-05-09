<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_camur_yasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-camur-yasi-hesaplama',
        HC_PLUGIN_URL . 'modules/camur-yasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-camur-yasi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/camur-yasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-camur-yasi-hesaplama">
        <h3>Çamur Yaşı (SRT) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-srt-vol">Havalandırma Tankı Hacmi (m³)</label>
            <input type="number" id="hc-srt-vol" placeholder="Örn: 1000" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-srt-mlss">Tanktaki MLSS (mg/L)</label>
            <input type="number" id="hc-srt-mlss" placeholder="Örn: 3000" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-srt-qw">Günlük Atılan Çamur Debisi (m³/gün)</label>
            <input type="number" id="hc-srt-qw" placeholder="Örn: 50" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-srt-mlssw">Atılan Çamur Konsantrasyonu (mg/L)</label>
            <input type="number" id="hc-srt-mlssw" placeholder="Örn: 8000" step="any">
        </div>
        <button class="hc-btn" onclick="hcSRTHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-srt-result">
            <div class="hc-result-label">Çamur Yaşı (SRT):</div>
            <div class="hc-result-value" id="hc-srt-val">-</div>
            <div class="hc-result-note" id="hc-srt-note"></div>
        </div>
    </div>
    <?php
}
