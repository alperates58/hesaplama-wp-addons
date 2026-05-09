<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_elektrokimyasal_hucre_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-elektrokimya',
        HC_PLUGIN_URL . 'modules/elektrokimyasal-hucre-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-elektrokimya-css',
        HC_PLUGIN_URL . 'modules/elektrokimyasal-hucre-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-elektrokimya">
        <h3>Elektrokimyasal Hücre Potansiyeli</h3>
        <div class="hc-form-group">
            <label for="hc-eh-cathode">Katot Yarı Hücre Potansiyeli (E° - Volt)</label>
            <input type="number" id="hc-eh-cathode" placeholder="Örn: 0.34 (Bakır)" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-eh-anode">Anot Yarı Hücre Potansiyeli (E° - Volt)</label>
            <input type="number" id="hc-eh-anode" placeholder="Örn: -0.76 (Çinko)" step="any">
        </div>
        <button class="hc-btn" onclick="hcEHHesapla()">Hücre Potansiyeli Hesapla</button>
        <div class="hc-result" id="hc-eh-result">
            <div class="hc-result-label">Standart Hücre Potansiyeli (E°_cell):</div>
            <div class="hc-result-value" id="hc-eh-val">-</div>
            <div class="hc-eh-interpretation" id="hc-eh-desc"></div>
            <div class="hc-result-note">E°_cell = E°_katot - E°_anot</div>
        </div>
    </div>
    <?php
}
