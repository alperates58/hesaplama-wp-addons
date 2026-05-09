<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_roket_itki_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rocket-thrust',
        HC_PLUGIN_URL . 'modules/roket-itki-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-rocket-thrust-css',
        HC_PLUGIN_URL . 'modules/roket-itki-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rocket-thrust">
        <h3>Roket İtki Analizi (F)</h3>
        <div class="hc-form-group">
            <label for="hc-rt-mdot">Yakıt Kütlesel Debisi (ṁ) [kg/s]</label>
            <input type="number" id="hc-rt-mdot" value="2">
        </div>
        <div class="hc-form-group">
            <label for="hc-rt-ve">Egzoz Hızı (Ve) [m/s]</label>
            <input type="number" id="hc-rt-ve" value="2500">
        </div>
        <div class="hc-form-group">
            <label for="hc-rt-pe">Egzoz Basıncı (Pe) [kPa]</label>
            <input type="number" id="hc-rt-pe" value="101.3">
        </div>
        <div class="hc-form-group">
            <label for="hc-rt-pa">Ortam Basıncı (Pa) [kPa]</label>
            <input type="number" id="hc-rt-pa" value="101.3">
        </div>
        <div class="hc-form-group">
            <label for="hc-rt-ae">Nozul Çıkış Alanı (Ae) [m²]</label>
            <input type="number" id="hc-rt-ae" value="0.05" step="0.01">
        </div>
        <button class="hc-btn" onclick="hcRocketThrustHesapla()">İtkiyi Hesapla</button>
        <div class="hc-result" id="hc-rocket-thrust-result">
            <div class="hc-result-item">
                <span>Toplam İtki:</span>
                <span class="hc-result-value" id="hc-res-rt-val">0 Newton</span>
            </div>
            <p class="hc-rt-note">F = ṁ * Ve + (Pe - Pa) * Ae</p>
        </div>
    </div>
    <?php
}
