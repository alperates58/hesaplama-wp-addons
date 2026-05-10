<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_punnett_karesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-punnett-js',
        HC_PLUGIN_URL . 'modules/punnett-karesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-punnett-css',
        HC_PLUGIN_URL . 'modules/punnett-karesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-punnett">
        <h3>Punnett Karesi (Monohibrit)</h3>
        <div class="hc-form-group">
            <label for="hc-pk-p1">1. Ebeveyn Genotipi (Örn: Aa):</label>
            <input type="text" id="hc-pk-p1" maxlength="2" placeholder="Aa" style="text-transform: none;">
        </div>
        <div class="hc-form-group">
            <label for="hc-pk-p2">2. Ebeveyn Genotipi (Örn: aa):</label>
            <input type="text" id="hc-pk-p2" maxlength="2" placeholder="aa" style="text-transform: none;">
        </div>
        <button class="hc-btn" onclick="hcPunnettHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-punnett-result">
            <table class="hc-punnett-table" id="hc-pk-table">
                <!-- Tablo JS ile dolacak -->
            </table>
            <div id="hc-pk-summary" style="margin-top:20px;"></div>
        </div>
    </div>
    <?php
}
