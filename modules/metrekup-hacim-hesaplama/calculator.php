<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_metrekup_hacim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-volume-generic',
        HC_PLUGIN_URL . 'modules/metrekup-hacim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-volume-generic-css',
        HC_PLUGIN_URL . 'modules/metrekup-hacim-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-vol-generic">
        <h3>Hacim (m³) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-vg-shape">Şekil Seçin:</label>
            <select id="hc-vg-shape" onchange="hcVolumeGenericSwitch()">
                <option value="rect">Dikdörtgen Prizma (Kutu)</option>
                <option value="cyl">Silindir</option>
                <option value="sphere">Küre</option>
            </select>
        </div>
        
        <div id="hc-vg-inputs">
            <!-- Dynamic Inputs -->
        </div>

        <button class="hc-btn" onclick="hcVolumeGenericHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-volume-generic-result">
            <strong>Toplam Hacim:</strong>
            <div id="hc-vg-res-val" class="hc-result-value">-</div>
            <span>Metreküp (m³)</span>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if(typeof hcVolumeGenericSwitch === 'function') hcVolumeGenericSwitch();
        });
    </script>
    <?php
}
