<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hacim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hacim-math',
        HC_PLUGIN_URL . 'modules/hacim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hacim-math-css',
        HC_PLUGIN_URL . 'modules/hacim-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hacim">
        <h3>Hacim Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-hm-shape">Geometrik Şekil:</label>
            <select id="hc-hm-shape" onchange="hcHacimSwitch()">
                <option value="cube">Küp / Prizma</option>
                <option value="cyl">Silindir</option>
                <option value="sph">Küre</option>
            </select>
        </div>
        <div id="hc-hm-inputs"></div>
        <button class="hc-btn" onclick="hcHacimMathHesapla()">Hacmi Hesapla</button>
        <div class="hc-result" id="hc-hacim-result">
            <strong>Hacim:</strong>
            <div id="hc-hm-res-val" class="hc-result-value">-</div>
            <span>birim³</span>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if(typeof hcHacimSwitch === 'function') hcHacimSwitch();
        });
    </script>
    <?php
}
