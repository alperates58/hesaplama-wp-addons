<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sont_direnc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-shunt-res',
        HC_PLUGIN_URL . 'modules/sont-direnc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-shunt-res-css',
        HC_PLUGIN_URL . 'modules/sont-direnc-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-shunt-res">
        <h3>Ampermetre Şönt Direnci</h3>
        <div class="hc-form-group">
            <label for="hc-sr-rg">Galvanometre Direnci (Rg) [Ω]</label>
            <input type="number" id="hc-sr-rg" value="50">
        </div>
        <div class="hc-form-group">
            <label for="hc-sr-ig">Tam Sapma Akımı (Ig) [mA]</label>
            <input type="number" id="hc-sr-ig" value="1" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-sr-i">İstenen Maksimum Akım (I) [Amper]</label>
            <input type="number" id="hc-sr-i" value="10">
        </div>
        <button class="hc-btn" onclick="hcShuntResHesapla()">Şönt Direnci Hesapla</button>
        <div class="hc-result" id="hc-shunt-res-result">
            <div class="hc-result-item">
                <span>Gereken Şönt (Rs):</span>
                <span class="hc-result-value" id="hc-res-sr-val">0 Ω</span>
            </div>
            <p class="hc-sr-note">Rs = Rg / [(I / Ig) - 1]</p>
        </div>
    </div>
    <?php
}
