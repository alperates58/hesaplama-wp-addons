<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_isik_frekansi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-isik-frekansi-hesaplama',
        HC_PLUGIN_URL . 'modules/isik-frekansi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-isik-frekansi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/isik-frekansi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-isik-frekansi-hesaplama">
        <h3>Işık Frekansı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-if-dalga">Işığın Dalga Boyu (nm - nanometre)</label>
            <input type="number" step="any" id="hc-if-dalga" value="550" placeholder="Görünür ışık: 380 - 750 nm" required>
        </div>
        
        <button class="hc-btn" onclick="hcIsikFrekansiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-isik-frekansi-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
