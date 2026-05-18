<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_esneklik_potansiyel_enerjisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-esneklik-potansiyel-enerjisi-hesaplama',
        HC_PLUGIN_URL . 'modules/esneklik-potansiyel-enerjisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-esneklik-potansiyel-enerjisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/esneklik-potansiyel-enerjisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-esneklik-potansiyel-enerjisi-hesaplama">
        <h3>Esneklik Potansiyel Enerjisi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-epe-yay">Yay Sabiti (k - N/m)</label>
            <input type="number" step="any" id="hc-epe-yay" placeholder="Örn: 200" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-epe-uzama">Uzama / Sıkışma Miktarı (x - metre)</label>
            <input type="number" step="any" id="hc-epe-uzama" placeholder="Örn: 0.15" required>
        </div>
        
        <button class="hc-btn" onclick="hcEsneklikPotansiyelEnerjisiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-esneklik-potansiyel-enerjisi-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
