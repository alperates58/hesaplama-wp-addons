<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_turbin_gucu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-turbine-power',
        HC_PLUGIN_URL . 'modules/turbin-gucu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-turbine-power-css',
        HC_PLUGIN_URL . 'modules/turbin-gucu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-turbine-power">
        <h3>Türbin Çıkış Gücü (P)</h3>
        <div class="hc-form-group">
            <label for="hc-tp-q">Su Debisi (Q) [m³/s]</label>
            <input type="number" id="hc-tp-q" value="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-tp-h">Düşü (Net Head) [m]</label>
            <input type="number" id="hc-tp-h" value="50">
        </div>
        <div class="hc-form-group">
            <label for="hc-tp-eff">Türbin Verimliliği (%)</label>
            <input type="number" id="hc-tp-eff" value="90">
        </div>
        <button class="hc-btn" onclick="hcTurbinePowerHesapla()">Gücü Hesapla</button>
        <div class="hc-result" id="hc-turbine-power-result">
            <div class="hc-result-item">
                <span>Elektriksel Güç:</span>
                <span class="hc-result-value" id="hc-res-tp-val">0 kW</span>
            </div>
            <p class="hc-tp-note">P = η * ρ * g * Q * H</p>
        </div>
    </div>
    <?php
}
