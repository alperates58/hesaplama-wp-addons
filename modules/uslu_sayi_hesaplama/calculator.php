<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_uslu_sayi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-exp-val',
        HC_PLUGIN_URL . 'modules/uslu_sayi_hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ev">
        <h3>Üslü Sayı Değeri</h3>
        <div class="hc-form-group">
            <label>Taban:</label><input type="number" id="hc-ev-a" step="any" placeholder="5">
        </div>
        <div class="hc-form-group">
            <label>Üs:</label><input type="number" id="hc-ev-b" step="any" placeholder="3">
        </div>
        <button class="hc-btn" onclick="hcExpValHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-uslu-sayi-val-result">
            <strong>Değer:</strong>
            <div id="hc-ev-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
