<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hucre_potansiyeli_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-nernst',
        HC_PLUGIN_URL . 'modules/hucre-potansiyeli-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-nernst-css',
        HC_PLUGIN_URL . 'modules/hucre-potansiyeli-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-nernst">
        <h3>Hücre Potansiyeli (Nernst Denklemi)</h3>
        <div class="hc-form-group">
            <label for="hc-np-e0">Standart Hücre Potansiyeli (E° - Volt)</label>
            <input type="number" id="hc-np-e0" placeholder="E°" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-np-n">Aktarılan Elektron Sayısı (n)</label>
            <input type="number" id="hc-np-n" placeholder="n" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-np-q">Tepkime Oranı (Q)</label>
            <input type="number" id="hc-np-q" placeholder="Q = [Ürünler] / [Girenler]" step="any">
        </div>
        <button class="hc-btn" onclick="hcNernstHesapla()">E_cell Hesapla</button>
        <div class="hc-result" id="hc-np-result">
            <div class="hc-result-label">Hücre Potansiyeli (E_cell):</div>
            <div class="hc-result-value" id="hc-np-val">-</div>
            <div class="hc-result-note">E = E° - (0.0592 / n) * log₁₀(Q) (25°C)</div>
        </div>
    </div>
    <?php
}
