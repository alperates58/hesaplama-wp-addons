<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_henderson_hasselbalch_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-henderson',
        HC_PLUGIN_URL . 'modules/henderson-hasselbalch-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-henderson-css',
        HC_PLUGIN_URL . 'modules/henderson-hasselbalch-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-henderson">
        <h3>Henderson-Hasselbalch (pH) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-hh-pka">pKa Değeri</label>
            <input type="number" id="hc-hh-pka" placeholder="Örn: 4.76 (Asetik Asit)" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-hh-salt">[Tuz / Konjuge Baz] Derişimi (M)</label>
            <input type="number" id="hc-hh-salt" placeholder="Örn: 0.1" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-hh-acid">[Asit] Derişimi (M)</label>
            <input type="number" id="hc-hh-acid" placeholder="Örn: 0.1" step="any">
        </div>
        <button class="hc-btn" onclick="hcHendersonHesapla()">pH Hesapla</button>
        <div class="hc-result" id="hc-hh-result">
            <div class="hc-result-label">Hesaplanan pH:</div>
            <div class="hc-result-value" id="hc-hh-val">-</div>
            <div class="hc-result-note">pH = pKa + log([Tuz] / [Asit])</div>
        </div>
    </div>
    <?php
}
