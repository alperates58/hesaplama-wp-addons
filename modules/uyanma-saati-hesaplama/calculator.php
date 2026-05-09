<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_uyanma_saati_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-wake-calc',
        HC_PLUGIN_URL . 'modules/uyanma-saati-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-wake-calc-css',
        HC_PLUGIN_URL . 'modules/uyanma-saati-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-wake-calc">
        <h3>Uyanma Saati Hesaplayıcı</h3>
        <div class="hc-form-group">
            <label for="hc-sleep-time-input">Şu an yatarsanız veya:</label>
            <input type="time" id="hc-sleep-time-input">
        </div>
        <button class="hc-btn" onclick="hcWakeCalcHesapla()">Uyanma Saatlerini Gör</button>
        <div class="hc-result" id="hc-wake-calc-result">
            <p>Döngü sonlarında uyanmak için şu saatlere alarm kurun:</p>
            <div class="hc-wake-slots" id="hc-res-wake-slots"></div>
        </div>
    </div>
    <?php
}
