<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gun_isigi_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gun-isigi-suresi-hesaplama',
        HC_PLUGIN_URL . 'modules/gun-isigi-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gun-isigi-suresi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/gun-isigi-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gun-isigi-suresi-hesaplama">
        <h3>Gün Işığı Süresi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-gis-enlem">Enlem (° Derece)</label>
            <input type="number" step="any" id="hc-gis-enlem" value="39.93" placeholder="Türkiye için örn: 36 - 42" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-gis-tarih">Tarih</label>
            <input type="date" id="hc-gis-tarih" required>
        </div>
        
        <button class="hc-btn" onclick="hcGunIsigiSuresiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-gun-isigi-suresi-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var dateInput = document.getElementById('hc-gis-tarih');
            if(dateInput) {
                var today = new Date();
                var yyyy = today.getFullYear();
                var mm = String(today.getMonth() + 1).padStart(2, '0');
                var dd = String(today.getDate()).padStart(2, '0');
                dateInput.value = yyyy + '-' + mm + '-' + dd;
            }
        });
    </script>
    <?php
}
