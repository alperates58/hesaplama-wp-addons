<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tampon_ph_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tampon-ph-hesaplama',
        HC_PLUGIN_URL . 'modules/tampon-ph-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tampon-ph-hesaplama-css',
        HC_PLUGIN_URL . 'modules/tampon-ph-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-buffer-ph">
        <h3>Tampon pH Hesaplama (HH Denklemi)</h3>
        <div class="hc-form-group">
            <label for="hc-bp-pka">pKa Değeri</label>
            <input type="number" id="hc-bp-pka" placeholder="Örn: 4.76" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-bp-salt">Tuz (Konjuge Baz) Derişimi [A⁻]</label>
            <input type="number" id="hc-bp-salt" placeholder="Örn: 0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-bp-acid">Asit Derişimi [HA]</label>
            <input type="number" id="hc-bp-acid" placeholder="Örn: 0.1">
        </div>
        <button class="hc-btn" onclick="hcTamponpHHesapla()">pH Hesapla</button>
        <div class="hc-result" id="hc-bp-result">
            <div class="hc-result-label">Çözelti pH:</div>
            <div class="hc-result-value" id="hc-bp-val">-</div>
        </div>
    </div>
    <?php
}
