<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_havanin_kinematik_viskozitesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-havanin-kinematik-viskozitesi-hesaplama',
        HC_PLUGIN_URL . 'modules/havanin-kinematik-viskozitesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-havanin-kinematik-viskozitesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/havanin-kinematik-viskozitesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-havanin-kinematik-viskozitesi-hesaplama">
        <h3>Havanın Kinematik Viskozitesi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-hkv-sicaklik">Sıcaklık (°C)</label>
            <input type="number" step="any" id="hc-hkv-sicaklik" value="20" placeholder="Örn: 20" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-hkv-basinc">Basınç (hPa / mbar)</label>
            <input type="number" step="any" id="hc-hkv-basinc" value="1013.25" placeholder="Deniz seviyesi standart: 1013.25" required>
        </div>
        
        <button class="hc-btn" onclick="hcHavaninKinematikViskozitesiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-havanin-kinematik-viskozitesi-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
