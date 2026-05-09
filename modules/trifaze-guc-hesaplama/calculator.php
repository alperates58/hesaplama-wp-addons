<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_trifaze_guc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-three-phase-power',
        HC_PLUGIN_URL . 'modules/trifaze-guc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-three-phase-power-css',
        HC_PLUGIN_URL . 'modules/trifaze-guc-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-three-phase-power">
        <h3>Trifaze Güç (P) Hesapla</h3>
        <div class="hc-form-group">
            <label for="hc-tpg-v">Hat-Hat Gerilimi (V) [Volt]</label>
            <input type="number" id="hc-tpg-v" value="400">
        </div>
        <div class="hc-form-group">
            <label for="hc-tpg-i">Hat Akımı (I) [Amper]</label>
            <input type="number" id="hc-tpg-i" value="25">
        </div>
        <div class="hc-form-group">
            <label for="hc-tpg-pf">Güç Faktörü (cosφ)</label>
            <input type="number" id="hc-tpg-pf" value="0.85" step="0.01">
        </div>
        <button class="hc-btn" onclick="hcThreePhasePowerHesapla()">Gücü Hesapla</button>
        <div class="hc-result" id="hc-three-phase-power-result">
            <div class="hc-result-item">
                <span>Aktif Güç (P):</span>
                <span class="hc-result-value" id="hc-res-tpg-p">0 kW</span>
            </div>
            <div class="hc-result-item">
                <span>Görünür Güç (S):</span>
                <span id="hc-res-tpg-s">0 kVA</span>
            </div>
        </div>
    </div>
    <?php
}
