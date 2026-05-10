<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kiris_sehim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-beam-defl',
        HC_PLUGIN_URL . 'modules/kiris-sehim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-beam-defl-css',
        HC_PLUGIN_URL . 'modules/kiris-sehim-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-beam-defl">
        <h3>Kiriş Sehim (Yayılı Yük) Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-bd-load">Yayılı Yük (w - N/mm):</label>
            <input type="number" id="hc-bd-load" placeholder="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-bd-len">Uzunluk (L - mm):</label>
            <input type="number" id="hc-bd-len" placeholder="4000">
        </div>
        <div class="hc-form-group">
            <label for="hc-bd-modulus">Elastisite Modülü (E - GPa):</label>
            <input type="number" id="hc-bd-modulus" value="210">
        </div>
        <div class="hc-form-group">
            <label for="hc-bd-inertia">Atalet Momenti (I - mm⁴):</label>
            <input type="number" id="hc-bd-inertia" placeholder="2000000">
        </div>
        <button class="hc-btn" onclick="hcBeamDeflectionHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-beam-defl-result">
            <strong>Maksimum Sehim:</strong>
            <div id="hc-bd-res-val" class="hc-result-value">-</div>
            <span>Milimetre (mm)</span>
        </div>
    </div>
    <?php
}
