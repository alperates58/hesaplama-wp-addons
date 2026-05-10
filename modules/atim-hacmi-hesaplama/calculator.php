<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_atim_hacmi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-atim-hacmi-hesaplama',
        HC_PLUGIN_URL . 'modules/atim-hacmi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-atim-hacmi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/atim-hacmi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-stroke-volume">
        <h3>Atım Hacmi (Stroke Volume)</h3>
        <div class="hc-form-group">
            <label for="hc-sv-edv">Diyastol Sonu Hacim (EDV) (mL)</label>
            <input type="number" id="hc-sv-edv" placeholder="Örn: 120">
        </div>
        <div class="hc-form-group">
            <label for="hc-sv-esv">Sistol Sonu Hacim (ESV) (mL)</label>
            <input type="number" id="hc-sv-esv" placeholder="Örn: 50">
        </div>
        <button class="hc-btn" onclick="hcAtımHacmiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-sv-result">
            <div class="hc-result-label">Atım Hacmi:</div>
            <div class="hc-result-value" id="hc-sv-val">-</div>
        </div>
    </div>
    <?php
}
