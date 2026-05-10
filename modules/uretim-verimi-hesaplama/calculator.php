<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_uretim_verimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-uretim-verimi-hesaplama',
        HC_PLUGIN_URL . 'modules/uretim-verimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-uretim-verimi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/uretim-verimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yield">
        <h3>Üretim Verimi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-y-theoretical">Teorik Verim (g)</label>
            <input type="number" id="hc-y-theoretical" placeholder="Örn: 100">
        </div>
        <div class="hc-form-group">
            <label for="hc-y-actual">Gerçek Verim (g)</label>
            <input type="number" id="hc-y-actual" placeholder="Örn: 85">
        </div>
        <button class="hc-btn" onclick="hcÜretimVerimiHesapla()">Verimi Hesapla</button>
        <div class="hc-result" id="hc-y-result">
            <div class="hc-result-label">Yüzde Verim:</div>
            <div class="hc-result-value" id="hc-y-val">-</div>
        </div>
    </div>
    <?php
}
