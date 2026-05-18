<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_is_ve_kinetik_enerji_teoremi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-is-ve-kinetik-enerji-teoremi-hesaplama',
        HC_PLUGIN_URL . 'modules/is-ve-kinetik-enerji-teoremi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-is-ve-kinetik-enerji-teoremi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/is-ve-kinetik-enerji-teoremi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-is-ve-kinetik-enerji-teoremi-hesaplama">
        <h3>İş ve Kinetik Enerji Teoremi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-iket-kutle">Kütle (m - kg)</label>
            <input type="number" step="any" id="hc-iket-kutle" value="10" placeholder="Kütle kg" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-iket-vilk">İlk Hız (vi - m/s)</label>
            <input type="number" step="any" id="hc-iket-vilk" value="0" placeholder="İlk hız" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-iket-vson">Son Hız (vf - m/s)</label>
            <input type="number" step="any" id="hc-iket-vson" value="15" placeholder="Son hız" required>
        </div>
        
        <button class="hc-btn" onclick="hcIsVeKinetikEnerjiTeoremiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-is-ve-kinetik-enerji-teoremi-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
