<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_eskenar_dortgen_alan_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rhombus-area',
        HC_PLUGIN_URL . 'modules/eskenar-dortgen-alan-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-rhombus-area-css',
        HC_PLUGIN_URL . 'modules/eskenar-dortgen-alan-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rhombus">
        <h3>Eşkenar Dörtgen Alanı</h3>
        <div class="hc-form-group">
            <label for="hc-rh-type">Hesaplama Yöntemi:</label>
            <select id="hc-rh-type" onchange="hcRhombusSwitch()">
                <option value="diag">Köşegenler ile (e, f)</option>
                <option value="base">Taban ve Yükseklik ile (a, h)</option>
            </select>
        </div>
        <div id="hc-rh-inputs"></div>
        <button class="hc-btn" onclick="hcRhombusAreaHesapla()">Alanı Hesapla</button>
        <div class="hc-result" id="hc-rhombus-result">
            <strong>Alan:</strong>
            <div id="hc-rh-res-val" class="hc-result-value">-</div>
            <span id="hc-rh-res-unit">birim²</span>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if(typeof hcRhombusSwitch === 'function') hcRhombusSwitch();
        });
    </script>
    <?php
}
