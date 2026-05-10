<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_metrekare_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-area-generic',
        HC_PLUGIN_URL . 'modules/metrekare-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-area-generic-css',
        HC_PLUGIN_URL . 'modules/metrekare-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-area-generic">
        <h3>Genel Alan (m²) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ag-shape">Şekil Seçin:</label>
            <select id="hc-ag-shape" onchange="hcAreaGenericSwitch()">
                <option value="rect">Dikdörtgen / Kare</option>
                <option value="tri">Üçgen</option>
                <option value="circle">Daire</option>
            </select>
        </div>
        
        <div id="hc-ag-inputs">
            <!-- Dynamic Inputs -->
        </div>

        <button class="hc-btn" onclick="hcAreaGenericHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-area-generic-result">
            <strong>Toplam Alan:</strong>
            <div id="hc-ag-res-val" class="hc-result-value">-</div>
            <span>Metrekare (m²)</span>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if(typeof hcAreaGenericSwitch === 'function') hcAreaGenericSwitch();
        });
    </script>
    <?php
}
