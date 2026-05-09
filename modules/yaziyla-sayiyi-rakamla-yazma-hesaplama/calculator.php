<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yaziyla_sayiyi_rakamla_yazma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-text-to-num',
        HC_PLUGIN_URL . 'modules/yaziyla-sayiyi-rakamla-yazma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-text-to-num-css',
        HC_PLUGIN_URL . 'modules/yaziyla-sayiyi-rakamla-yazma-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-text-to-num">
        <h3>Yazıyı Rakama Çevir</h3>
        <div class="hc-form-group">
            <label for="hc-text-input">Sayıyı Yazıyla Girin</label>
            <textarea id="hc-text-input" placeholder="Örn: bin iki yüz otuz dört" rows="2"></textarea>
        </div>
        <button class="hc-btn" onclick="hcTextToNumHesapla()">Rakama Çevir</button>
        <div class="hc-result" id="hc-text-to-num-result">
            <div class="hc-result-item">
                <span>Rakamla:</span>
                <span class="hc-result-value" id="hc-res-num-val">0</span>
            </div>
        </div>
    </div>
    <?php
}
