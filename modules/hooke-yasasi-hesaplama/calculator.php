<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hooke_yasasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hooke-yasasi-hesaplama',
        HC_PLUGIN_URL . 'modules/hooke-yasasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hooke-yasasi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hooke-yasasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hooke-yasasi-hesaplama">
        <h3>Hooke Yasası Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-hy3-hedef">Hesaplanacak Parametre</label>
            <select id="hc-hy3-hedef" onchange="hcHy3HedefDegisti()">
                <option value="kuvvet">Yay Kuvveti (F - Newton)</option>
                <option value="sabitle">Yay Sabiti (k - N/m)</option>
                <option value="uzama">Uzama / Gerilme Miktarı (x - metre)</option>
            </select>
        </div>
        
        <div id="hc-hy3-girdiler">
            <!-- Dinamik girdiler JS ile yerleşecek -->
        </div>
        
        <button class="hc-btn" onclick="hcHookeYasasiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-hooke-yasasi-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (typeof hcHy3HedefDegisti === 'function') {
                hcHy3HedefDegisti();
            }
        });
    </script>
    <?php
}
