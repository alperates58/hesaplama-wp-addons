<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hava_yogunlugu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hava-yogunlugu-hesaplama',
        HC_PLUGIN_URL . 'modules/hava-yogunlugu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hava-yogunlugu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hava-yogunlugu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hava-yogunlugu-hesaplama">
        <h3>Hava Yoğunluğu Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-hy2-sicaklik">Sıcaklık (°C)</label>
            <input type="number" step="any" id="hc-hy2-sicaklik" value="15" placeholder="Örn: 15" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-hy2-basinc">Basınç (hPa / mbar)</label>
            <input type="number" step="any" id="hc-hy2-basinc" value="1013.25" placeholder="Deniz seviyesi standart: 1013.25" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-hy2-nem">Bağıl Nem (%)</label>
            <input type="number" step="any" id="hc-hy2-nem" value="0" placeholder="Kuru hava için 0" required>
        </div>
        
        <button class="hc-btn" onclick="hcHavaYogunluguHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-hava-yogunlugu-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
