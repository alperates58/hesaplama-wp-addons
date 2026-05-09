<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_volttan_elektronvolta_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-volt-to-ev',
        HC_PLUGIN_URL . 'modules/volttan-elektronvolta-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-volt-to-ev-css',
        HC_PLUGIN_URL . 'modules/volttan-elektronvolta-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-volt-to-ev">
        <h3>Volt - Elektronvolt (eV) Dönüşümü</h3>
        <div class="hc-form-group">
            <label for="hc-ve-v">Gerilim (V) [Volt]</label>
            <input type="number" id="hc-ve-v" value="1" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-ve-q">Parçacık Yükü (e biriminde)</label>
            <input type="number" id="hc-ve-q" value="1" step="1">
            <small>Elektron için 1</small>
        </div>
        <button class="hc-btn" onclick="hcVoltToEVHesapla()">Enerjiyi Hesapla</button>
        <div class="hc-result" id="hc-volt-to-ev-result">
            <div class="hc-result-item">
                <span>Enerji (E):</span>
                <span class="hc-result-value" id="hc-res-ve-val">0 eV</span>
            </div>
            <div class="hc-result-item">
                <span>Joule Cinsinden:</span>
                <span id="hc-res-ve-joule">0 J</span>
            </div>
        </div>
    </div>
    <?php
}
