<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_f_m_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-f-m-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/f-m-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-f-m-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/f-m-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-f-m-orani-hesaplama">
        <h3>F/M Oranı (Gıda/Mikroorganizma) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-fm-q">Günlük Debi (Q, m³/gün)</label>
            <input type="number" id="hc-fm-q" placeholder="Örn: 5000" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-fm-s0">Giriş BOİ₅ Konsantrasyonu (mg/L)</label>
            <input type="number" id="hc-fm-s0" placeholder="Örn: 250" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-fm-v">Havalandırma Tankı Hacmi (V, m³)</label>
            <input type="number" id="hc-fm-v" placeholder="Örn: 2000" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-fm-mlvss">Tanktaki MLVSS (mg/L)</label>
            <input type="number" id="hc-fm-mlvss" placeholder="Örn: 2500" step="any">
        </div>
        <button class="hc-btn" onclick="hcFMOraniHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-fm-result">
            <div class="hc-result-label">F/M Oranı:</div>
            <div class="hc-result-value" id="hc-fm-val">-</div>
            <div class="hc-result-note" id="hc-fm-note"></div>
        </div>
    </div>
    <?php
}
