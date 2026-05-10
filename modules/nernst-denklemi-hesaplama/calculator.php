<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_nernst_denklemi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-nernst-denklemi-hesaplama',
        HC_PLUGIN_URL . 'modules/nernst-denklemi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-nernst-denklemi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/nernst-denklemi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-nernst">
        <h3>Nernst Denklemi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ne-e0">Standart Potansiyel (E°, Volt)</label>
            <input type="number" id="hc-ne-e0" placeholder="Örn: 1.10" step="0.001">
        </div>
        <div class="hc-form-group">
            <label for="hc-ne-n">Aktarılan Elektron Sayısı (n)</label>
            <input type="number" id="hc-ne-n" value="2" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-ne-q">Tepkime Kesri (Q)</label>
            <input type="text" id="hc-ne-q" placeholder="Örn: 0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-ne-temp">Sıcaklık (°C)</label>
            <input type="number" id="hc-ne-temp" value="25">
        </div>
        <button class="hc-btn" onclick="hcNernstDenklemiHesapla()">Potansiyeli Hesapla</button>
        <div class="hc-result" id="hc-ne-result">
            <div class="hc-result-label">Hücre Potansiyeli (E):</div>
            <div class="hc-result-value" id="hc-ne-val">-</div>
        </div>
    </div>
    <?php
}
