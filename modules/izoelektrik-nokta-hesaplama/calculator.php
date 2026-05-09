<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_izoelektrik_nokta_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pi',
        HC_PLUGIN_URL . 'modules/izoelektrik-nokta-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pi-css',
        HC_PLUGIN_URL . 'modules/izoelektrik-nokta-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pi">
        <h3>İzoelektrik Nokta (pI) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-pi-pk1">pKa₁ Değeri (Karboksil Grubu vb.)</label>
            <input type="number" id="hc-pi-pk1" placeholder="Örn: 2.34 (Glisin)" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-pi-pk2">pKa₂ Değeri (Amino Grubu vb.)</label>
            <input type="number" id="hc-pi-pk2" placeholder="Örn: 9.60 (Glisin)" step="any">
        </div>
        <p style="font-size:0.8em; opacity:0.7;">Yan zincir (R) grubu iyonlaşabiliyorsa, pI için birbirine en yakın iki pKa değerini kullanın.</p>
        <button class="hc-btn" onclick="hcPIHesapla()">pI Hesapla</button>
        <div class="hc-result" id="hc-pi-result">
            <div class="hc-result-label">İzoelektrik Nokta (pI):</div>
            <div class="hc-result-value" id="hc-pi-val">-</div>
            <div class="hc-result-note">pI = (pKa₁ + pKa₂) / 2</div>
        </div>
    </div>
    <?php
}
