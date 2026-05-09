<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_entalpi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-entalpi',
        HC_PLUGIN_URL . 'modules/entalpi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-entalpi-css',
        HC_PLUGIN_URL . 'modules/entalpi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-entalpi">
        <h3>Entalpi Değişimi (ΔH) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ent-m">Kütle (m - g)</label>
            <input type="number" id="hc-ent-m" placeholder="Örn: 100" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ent-c">Özgül Isı (c - J/g·°C)</label>
            <input type="number" id="hc-ent-c" placeholder="Örn: 4.18 (Su)" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ent-dt">Sıcaklık Değişimi (ΔT - °C)</label>
            <input type="number" id="hc-ent-dt" placeholder="Örn: 10" step="any">
        </div>
        <button class="hc-btn" onclick="hcEntalpiHesapla()">ΔH Hesapla</button>
        <div class="hc-result" id="hc-ent-result">
            <div class="hc-result-label">Entalpi Değişimi (ΔH):</div>
            <div class="hc-result-value" id="hc-ent-val">-</div>
            <div class="hc-result-note">Formül: ΔH = m * c * ΔT (Sabit basınçta)</div>
        </div>
    </div>
    <?php
}
