<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_maksimum_reaksiyon_hizi_vmax_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-vmax-calc',
        HC_PLUGIN_URL . 'modules/maksimum-reaksiyon-hizi-vmax-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-vmax-calc-css',
        HC_PLUGIN_URL . 'modules/maksimum-reaksiyon-hizi-vmax-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-vmax-calc">
        <h3>Vmax Hesaplama (Enzim Kinetiği)</h3>
        <div class="hc-form-group">
            <label for="hc-vm-v">Reaksiyon Hızı (v):</label>
            <input type="number" id="hc-vm-v" step="0.01" placeholder="5.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-vm-s">Substrat Konsantrasyonu [S]:</label>
            <input type="number" id="hc-vm-s" step="0.01" placeholder="10.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-vm-km">Michaelis Sabiti (Km):</label>
            <input type="number" id="hc-vm-km" step="0.01" placeholder="2.0">
        </div>
        <button class="hc-btn" onclick="hcVmaxHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-vmax-calc-result">
            <strong>Maksimum Hız (Vmax):</strong>
            <div id="hc-vm-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
