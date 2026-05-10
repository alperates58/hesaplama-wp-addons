<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yuzde_verim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yuzde-verim-hesaplama',
        HC_PLUGIN_URL . 'modules/yuzde-verim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yuzde-verim-hesaplama-css',
        HC_PLUGIN_URL . 'modules/yuzde-verim-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-perc-yield">
        <h3>Yüzde Verim Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-py-theoretical">Teorik Miktar</label>
            <input type="number" id="hc-py-theoretical" placeholder="Örn: 50">
        </div>
        <div class="hc-form-group">
            <label for="hc-py-actual">Gerçek Miktar</label>
            <input type="number" id="hc-py-actual" placeholder="Örn: 42.5">
        </div>
        <button class="hc-btn" onclick="hcYüzdeVerimHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-py-result">
            <div class="hc-result-label">Verim Yüzdesi:</div>
            <div class="hc-result-value" id="hc-py-val">-</div>
        </div>
    </div>
    <?php
}
