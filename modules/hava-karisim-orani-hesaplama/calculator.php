<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hava_karisim_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hava-karisim-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/hava-karisim-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hava-karisim-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hava-karisim-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hava-karisim-orani-hesaplama">
        <h3>Hava Karışım Oranı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-hko-sicaklik">Hava Sıcaklığı (°C)</label>
            <input type="number" step="any" id="hc-hko-sicaklik" value="20" placeholder="Örn: 20" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-hko-nem">Bağıl Nem (%)</label>
            <input type="number" step="any" id="hc-hko-nem" value="50" placeholder="Örn: 50" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-hko-basinc">Atmosferik Basınç (hPa / mbar)</label>
            <input type="number" step="any" id="hc-hko-basinc" value="1013.25" placeholder="Deniz seviyesi standart: 1013.25" required>
        </div>
        
        <button class="hc-btn" onclick="hcHavaKarisimOraniHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-hava-karisim-orani-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
