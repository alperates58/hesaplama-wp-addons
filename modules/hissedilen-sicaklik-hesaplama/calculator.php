<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hissedilen_sicaklik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hissedilen-sicaklik-hesaplama',
        HC_PLUGIN_URL . 'modules/hissedilen-sicaklik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hissedilen-sicaklik-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hissedilen-sicaklik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hissedilen-sicaklik-hesaplama">
        <h3>Hissedilen Sıcaklık Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-hs-sicaklik">Hava Sıcaklığı (°C)</label>
            <input type="number" step="any" id="hc-hs-sicaklik" value="25" placeholder="Örn: 25" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-hs-nem">Bağıl Nem (%)</label>
            <input type="number" step="any" id="hc-hs-nem" value="50" placeholder="Nem oranı %" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-hs-ruzgar">Rüzgar Hızı (km/h)</label>
            <input type="number" step="any" id="hc-hs-ruzgar" value="10" placeholder="Rüzgar hızı" required>
        </div>
        
        <button class="hc-btn" onclick="hcHissedilenSicaklikHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-hissedilen-sicaklik-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
