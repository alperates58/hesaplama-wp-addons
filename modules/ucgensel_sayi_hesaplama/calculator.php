<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ucgensel_sayi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tri-num',
        HC_PLUGIN_URL . 'modules/ucgensel_sayi_hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-trin">
        <h3>Üçgensel Sayı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-tn-n">Terim Sayısı (n):</label>
            <input type="number" id="hc-tn-n" min="1" placeholder="5">
        </div>
        <button class="hc-btn" onclick="hcTriNumHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ucgensel-sayi-result">
            <strong>n. Üçgensel Sayı:</strong>
            <div id="hc-tn-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
