<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sehim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-deflection',
        HC_PLUGIN_URL . 'modules/sehim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-deflection-css',
        HC_PLUGIN_URL . 'modules/sehim-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-deflection">
        <h3>Kiriş Sehim Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-sd-p">Yük (P) [kN]</label>
            <input type="number" id="hc-sd-p" value="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-sd-l">Kiriş Boyu (L) [m]</label>
            <input type="number" id="hc-sd-l" value="5">
        </div>
        <div class="hc-form-group">
            <label for="hc-sd-e">Young Modülü (E) [GPa]</label>
            <input type="number" id="hc-sd-e" value="210">
            <small>Çelik: 210, Beton: 30</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-sd-i">Atalet Momenti (I) [cm^4]</label>
            <input type="number" id="hc-sd-i" value="8000">
        </div>
        <button class="hc-btn" onclick="hcDeflectionHesapla()">Sehimi Hesapla</button>
        <div class="hc-result" id="hc-deflection-result">
            <div class="hc-result-item">
                <span>Maksimum Sehim (δ):</span>
                <span class="hc-result-value" id="hc-res-sd-val">0 mm</span>
            </div>
            <p class="hc-sd-note">Basit mesnetli kiriş, tekil yük (ortada): δ = PL³ / 48EI</p>
        </div>
    </div>
    <?php
}
