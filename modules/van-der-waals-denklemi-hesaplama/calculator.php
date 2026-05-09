<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_van_der_waals_denklemi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-vdw-calc',
        HC_PLUGIN_URL . 'modules/van-der-waals-denklemi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-vdw-calc-css',
        HC_PLUGIN_URL . 'modules/van-der-waals-denklemi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-vdw-calc">
        <h3>Van der Waals Gaz Yasası</h3>
        <div class="hc-form-group">
            <label for="hc-vdw-n">Mol Sayısı (n)</label>
            <input type="number" id="hc-vdw-n" value="1" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-vdw-v">Hacim (V) [L]</label>
            <input type="number" id="hc-vdw-v" value="22.4" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-vdw-t">Sıcaklık (T) [K]</label>
            <input type="number" id="hc-vdw-t" value="273.15" step="0.1">
        </div>
        <div class="hc-form-group">
            <label>Gaz Tipi (Katsayılar a/b)</label>
            <select id="hc-vdw-gas">
                <option value="1.36,0.0318">Azot (N2)</option>
                <option value="1.39,0.0391">Oksijen (O2)</option>
                <option value="3.59,0.0427">Karbondioksit (CO2)</option>
                <option value="0.244,0.0266">Helyum (He)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcVDWHesapla()">Basıncı Hesapla</button>
        <div class="hc-result" id="hc-vdw-calc-result">
            <div class="hc-result-item">
                <span>Gerçek Basınç (P):</span>
                <span class="hc-result-value" id="hc-res-vdw-val">0 atm</span>
            </div>
        </div>
    </div>
    <?php
}
