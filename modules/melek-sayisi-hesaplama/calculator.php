<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_melek_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-angel-number',
        HC_PLUGIN_URL . 'modules/melek-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-angel-calc">
        <h3>Melek Sayısı Anlamı</h3>
        <div class="hc-form-group">
            <label>Gördüğünüz Sayıyı Girin</label>
            <input type="number" id="hc-an-input" placeholder="Örn: 111, 444, 1212" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcMelekSayisiBul()">Anlamını Gör</button>
        <div class="hc-result" id="hc-melek-sayisi-result">
            <div class="hc-result-header">Sayı: <span id="hc-an-value" class="hc-result-value"></span></div>
            <div id="hc-an-desc" class="hc-result-content"></div>
        </div>
    </div>
    <?php
}
