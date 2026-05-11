<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_rc_devresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rc-devresi',
        HC_PLUGIN_URL . 'modules/rc-devresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-rc-devresi-css',
        HC_PLUGIN_URL . 'modules/rc-devresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rc-devresi">
        <h3>RC Devresi Zaman Sabiti ve Frekans</h3>
        
        <div class="hc-form-group">
            <label for="hc-rc-resistor">Direnç (Ohm - Ω)</label>
            <input type="number" id="hc-rc-resistor" placeholder="Ω" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-rc-capacitor">Kondansatör (Farad - F)</label>
            <input type="number" id="hc-rc-capacitor" placeholder="F (Örn: 0.000001 for 1uF)" step="any">
            <small>Not: Mikrofarad (µF) için değeri 1.000.000'a bölün.</small>
        </div>

        <button class="hc-btn" onclick="hcRcHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-rc-result">
            <div class="hc-result-grid">
                <div class="hc-result-card">
                    <span class="hc-result-label">Zaman Sabiti (τ)</span>
                    <span class="hc-result-value" id="hc-rc-res-tau">--</span>
                    <span class="hc-result-unit">saniye</span>
                </div>
                <div class="hc-result-card">
                    <span class="hc-result-label">Kesim Frekansı (fc)</span>
                    <span class="hc-result-value" id="hc-rc-res-freq">--</span>
                    <span class="hc-result-unit">Hz</span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
