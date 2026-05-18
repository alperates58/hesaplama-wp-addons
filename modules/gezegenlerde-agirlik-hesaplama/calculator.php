<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gezegenlerde_agirlik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gezegenlerde-agirlik-hesaplama',
        HC_PLUGIN_URL . 'modules/gezegenlerde-agirlik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gezegenlerde-agirlik-hesaplama-css',
        HC_PLUGIN_URL . 'modules/gezegenlerde-agirlik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gezegenlerde-agirlik-hesaplama">
        <h3>Gezegenlerde Ağırlık Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ga2-kilo">Dünyadaki Ağırlığınız (veya Kütleniz - kg)</label>
            <input type="number" step="any" id="hc-ga2-kilo" placeholder="Örn: 70" required>
        </div>
        
        <button class="hc-btn" onclick="hcGezegenlerdeAgirlikHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-gezegenlerde-agirlik-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
