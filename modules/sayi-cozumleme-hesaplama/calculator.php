<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sayi_cozumleme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-num-decomp',
        HC_PLUGIN_URL . 'modules/sayi-cozumleme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-num-decomp">
        <h3>Sayı Çözümleme Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-nd-input">Sayıyı Giriniz:</label>
            <input type="number" id="hc-nd-input" placeholder="4567">
        </div>
        <button class="hc-btn" onclick="hcNumDecompHesapla()">Çözümle</button>
        <div class="hc-result" id="hc-sayi-cozumleme-result">
            <strong>Çözümleme:</strong>
            <div id="hc-nd-res-val" style="font-size: 1.2rem; margin-top: 10px; word-break: break-all;">-</div>
        </div>
    </div>
    <?php
}
