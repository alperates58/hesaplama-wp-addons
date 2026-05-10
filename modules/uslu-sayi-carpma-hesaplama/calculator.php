<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_uslu_sayi_carpma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-exp-mul',
        HC_PLUGIN_URL . 'modules/uslu-sayi-carpma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-exp-m">
        <h3>Üslü Sayı Çarpma (aˣ · aʸ = aˣ⁺ʸ)</h3>
        <div class="hc-form-group">
            <label>Taban (a):</label><input type="number" id="hc-em-a" placeholder="3">
        </div>
        <div class="hc-form-group">
            <label>1. Üs (x):</label><input type="number" id="hc-em-x" placeholder="2">
        </div>
        <div class="hc-form-group">
            <label>2. Üs (y):</label><input type="number" id="hc-em-y" placeholder="5">
        </div>
        <button class="hc-btn" onclick="hcExpMulHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-uslu-sayi-carpma-result">
            <strong>Sonuç:</strong>
            <div id="hc-em-res-val" class="hc-result-value">-</div>
            <p id="hc-em-desc" style="margin-top:10px;"></p>
        </div>
    </div>
    <?php
}
