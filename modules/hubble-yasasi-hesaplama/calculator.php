<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hubble_yasasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hubble-yasasi-hesaplama',
        HC_PLUGIN_URL . 'modules/hubble-yasasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hubble-yasasi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hubble-yasasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hubble-yasasi-hesaplama">
        <h3>Hubble Yasası Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-hy4-uzaklik">Gökada Uzaklığı (d - Megaparsek [Mpc])</label>
            <input type="number" step="any" id="hc-hy4-uzaklik" value="100" placeholder="Örn: 100" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-hy4-hubble">Hubble Sabiti (H0 - km/s/Mpc)</label>
            <input type="number" step="any" id="hc-hy4-hubble" value="70" placeholder="Örn: 70" required>
        </div>
        
        <button class="hc-btn" onclick="hcHubbleYasasiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-hubble-yasasi-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
