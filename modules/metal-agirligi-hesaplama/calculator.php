<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_metal_agirligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-metal-generic',
        HC_PLUGIN_URL . 'modules/metal-agirligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-metal-generic-css',
        HC_PLUGIN_URL . 'modules/metal-agirligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-metal-gen">
        <h3>Metal Profil Ağırlık Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-mg-type">Profil Tipi:</label>
            <select id="hc-mg-type" onchange="hcMetalGenericSwitch()">
                <option value="pipe">Yuvarlak Boru</option>
                <option value="rect">Kare / Dikdörtgen Profil</option>
                <option value="solid">Dolu Çubuk (Yuvarlak)</option>
            </select>
        </div>
        
        <div id="hc-mg-inputs">
            <!-- Dynamic -->
        </div>

        <div class="hc-form-group">
            <label for="hc-mg-len">Boy (m):</label>
            <input type="number" id="hc-mg-len" placeholder="6.0">
        </div>

        <button class="hc-btn" onclick="hcMetalGenericHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-metal-generic-result">
            <strong>Toplam Ağırlık:</strong>
            <div id="hc-mg-res-val" class="hc-result-value">-</div>
            <span>Kilogram (kg)</span>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if(typeof hcMetalGenericSwitch === 'function') hcMetalGenericSwitch();
        });
    </script>
    <?php
}
