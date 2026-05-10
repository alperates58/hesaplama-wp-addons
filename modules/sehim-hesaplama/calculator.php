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
    <div class="hc-calculator" id="hc-defl">
        <h3>Sehim (Deflection) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ds-load">Yük (P - Newton):</label>
            <input type="number" id="hc-ds-load" placeholder="1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-ds-len">Uzunluk (L - mm):</label>
            <input type="number" id="hc-ds-len" placeholder="3000">
        </div>
        <div class="hc-form-group">
            <label for="hc-ds-modulus">Elastisite Modülü (E - GPa):</label>
            <input type="number" id="hc-ds-modulus" value="210">
            <small>Çelik: 210, Alüminyum: 70</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-ds-inertia">Atalet Momenti (I - mm⁴):</label>
            <input type="number" id="hc-ds-inertia" placeholder="1000000">
        </div>
        <button class="hc-btn" onclick="hcDeflectionHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-deflection-result">
            <strong>Maksimum Sehim:</strong>
            <div id="hc-ds-res-val" class="hc-result-value">-</div>
            <span>Milimetre (mm)</span>
        </div>
    </div>
    <?php
}
