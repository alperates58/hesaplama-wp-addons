<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_trafo_gucu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-transformer-power',
        HC_PLUGIN_URL . 'modules/trafo-gucu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-transformer-power-css',
        HC_PLUGIN_URL . 'modules/trafo-gucu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-transformer-power">
        <h3>Transformatör Gücü (S)</h3>
        <div class="hc-form-group">
            <label for="hc-tp-type">Trafo Tipi</label>
            <select id="hc-tp-type">
                <option value="1">Tek Faz (1Φ)</option>
                <option value="1.732">Üç Faz (3Φ)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-tp-v">Gerilim (V) [Volt]</label>
            <input type="number" id="hc-tp-v" value="400">
        </div>
        <div class="hc-form-group">
            <label for="hc-tp-i">Akım (I) [Amper]</label>
            <input type="number" id="hc-tp-i" value="10">
        </div>
        <button class="hc-btn" onclick="hcTransformerPowerHesapla()">Gücü Hesapla</button>
        <div class="hc-result" id="hc-transformer-power-result">
            <div class="hc-result-item">
                <span>Görünür Güç:</span>
                <span class="hc-result-value" id="hc-res-tp-val">0 kVA</span>
            </div>
        </div>
    </div>
    <?php
}
