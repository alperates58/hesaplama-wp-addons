<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ideal_gaz_yasasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ideal-gaz-yasasi-hesaplama',
        HC_PLUGIN_URL . 'modules/ideal-gaz-yasasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ideal-gaz-yasasi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ideal-gaz-yasasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ideal-gaz-yasasi-hesaplama">
        <h3>İdeal Gaz Yasası Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-igy-hedef">Hesaplanacak Değişken</label>
            <select id="hc-igy-hedef" onchange="hcIgyHedefDegisti()">
                <option value="basinc" selected>Basınç (P)</option>
                <option value="hacim">Hacim (V)</option>
                <option value="mol">Madde Miktarı (n - mol)</option>
                <option value="sicaklik">Sıcaklık (T)</option>
            </select>
        </div>
        
        <div id="hc-igy-girdiler">
            <!-- Dinamik girdiler JS ile yüklenecektir -->
        </div>
        
        <button class="hc-btn" onclick="hcIdealGazYasasiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-ideal-gaz-yasasi-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (typeof hcIgyHedefDegisti === 'function') {
                hcIgyHedefDegisti();
            }
        });
    </script>
    <?php
}
