<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_titrasyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-titrasyon-hesaplama',
        HC_PLUGIN_URL . 'modules/titrasyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-titrasyon-hesaplama-css',
        HC_PLUGIN_URL . 'modules/titrasyon-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-titration">
        <h3>Titrasyon Hesaplama</h3>
        <div class="hc-form-group">
            <label>Analit (Bilinen Hacim)</label>
            <input type="number" id="hc-ti-va" placeholder="Va (mL)">
        </div>
        <div class="hc-form-group">
            <label>Titrant (Standart Çözelti)</label>
            <div style="display:flex; gap:5px;">
                <input type="number" id="hc-ti-mt" placeholder="Mt (M)" style="width:50%">
                <input type="number" id="hc-ti-vt" placeholder="Vt (mL)" style="width:50%">
            </div>
        </div>
        <button class="hc-btn" onclick="hcTitrasyonHesapla()">Analit Derişimini Hesapla</button>
        <div class="hc-result" id="hc-ti-result">
            <div class="hc-result-label">Analit Derişimi (Ma):</div>
            <div class="hc-result-value" id="hc-ti-val">-</div>
        </div>
    </div>
    <?php
}
