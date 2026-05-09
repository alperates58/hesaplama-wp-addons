<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lumen_watt_donusumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lumen-watt',
        HC_PLUGIN_URL . 'modules/lumen-watt-donusumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-lumen-watt-css',
        HC_PLUGIN_URL . 'modules/lumen-watt-donusumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-lumen-watt">
        <h3>Lümen Watt Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-lw-lumen">Işık Akısı (Lümen)</label>
            <input type="number" id="hc-lw-lumen" value="800" min="1">
        </div>
        <button class="hc-btn" onclick="hcLumenWattHesapla()">Watt Değerlerini Gör</button>
        <div class="hc-result" id="hc-lumen-watt-result">
            <div class="hc-lw-grid">
                <div class="hc-lw-item"> <span>LED:</span> <b id="hc-res-lw-led">0 W</b> </div>
                <div class="hc-lw-item"> <span>CFL (Tasarruflu):</span> <b id="hc-res-lw-cfl">0 W</b> </div>
                <div class="hc-lw-item"> <span>Halojen:</span> <b id="hc-res-lw-hal">0 W</b> </div>
                <div class="hc-lw-item"> <span>Akkor:</span> <b id="hc-res-lw-inc">0 W</b> </div>
            </div>
        </div>
    </div>
    <?php
}
