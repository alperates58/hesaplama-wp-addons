<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kahve_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-coffee-ratio-js',
        HC_PLUGIN_URL . 'modules/kahve-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-coffee-ratio-css',
        HC_PLUGIN_URL . 'modules/kahve-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-coffee-ratio">
        <h3>Kahve Oranı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-cr-method">Demleme Yöntemi / Güç</label>
            <select id="hc-cr-method">
                <option value="15">Sert (1:15)</option>
                <option value="17" selected>Standart (1:17)</option>
                <option value="18">Yumuşak (1:18)</option>
                <option value="2">Espresso (1:2)</option>
                <option value="12">Cold Brew (1:12)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-cr-target">Hedef Miktar</label>
            <div style="display:flex; gap:10px;">
                <input type="number" id="hc-cr-target-val" value="250" style="flex:1;">
                <select id="hc-cr-target-unit" style="width:110px;">
                    <option value="water">ml Su</option>
                    <option value="coffee">g Kahve</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcKahveOraniHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-coffee-ratio-result">
            <div class="hc-result-item">
                <span>Gereken Su:</span>
                <strong id="hc-cr-res-water">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Gereken Kahve:</span>
                <strong id="hc-cr-res-coffee">-</strong>
            </div>
            <div class="hc-result-note" id="hc-cr-note"></div>
        </div>
    </div>
    <?php
}
