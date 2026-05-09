<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cokelme_tepkimesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cokelme',
        HC_PLUGIN_URL . 'modules/cokelme-tepkimesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cokelme-css',
        HC_PLUGIN_URL . 'modules/cokelme-tepkimesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cokelme">
        <h3>Çökelme Kontrolü (Qsp vs Ksp)</h3>
        <div class="hc-form-group">
            <label for="hc-cp-ksp">Çözünürlük Çarpımı Sabiti (Ksp)</label>
            <input type="number" id="hc-cp-ksp" placeholder="Örn: 1.8e-10 (AgCl)" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-cp-cat">Katyon Derişimi [M⁺] (mol/L)</label>
            <input type="number" id="hc-cp-cat" placeholder="Örn: 1.0e-5" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-cp-ani">Anyon Derişimi [X⁻] (mol/L)</label>
            <input type="number" id="hc-cp-ani" placeholder="Örn: 1.0e-5" step="any">
        </div>
        <button class="hc-btn" onclick="hcCPHesapla()">Çökelmeyi Kontrol Et</button>
        <div class="hc-result" id="hc-cp-result">
            <div class="hc-result-label">İyon Çarpımı (Qsp):</div>
            <div class="hc-result-value" id="hc-cp-val">-</div>
            <div class="hc-cp-interpretation" id="hc-cp-desc"></div>
            <div class="hc-result-note">Qsp = [Katyon] * [Anyon] (Basit AB tuzu için)</div>
        </div>
    </div>
    <?php
}
