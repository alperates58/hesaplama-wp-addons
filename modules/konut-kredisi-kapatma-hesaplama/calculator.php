<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_konut_kredisi_kapatma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-konut-kredisi-kapatma-hesaplama',
        HC_PLUGIN_URL . 'modules/konut-kredisi-kapatma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-konut-kredisi-kapatma-hesaplama-css',
        HC_PLUGIN_URL . 'modules/konut-kredisi-kapatma-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-konut-kredisi-kapatma">
        <h3>Konut Kredisi Kapatma Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-kkk-balance">Kalan Anapara Borcu (₺)</label>
            <input type="number" id="hc-kkk-balance" placeholder="Örn: 500.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-kkk-term">Kalan Vade (Ay)</label>
            <input type="number" id="hc-kkk-term" placeholder="Örn: 36">
        </div>
        <button class="hc-btn" onclick="hcKonutKredisiKapatmaHesapla()">Kapatma Tutarını Hesapla</button>
        <div class="hc-result" id="hc-kkk-result">
            <div class="hc-result-item">
                <span>Kalan Anapara:</span>
                <strong id="hc-kkk-res-balance">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Erken Kapama Cezası / Masrafı:</span>
                <strong id="hc-kkk-res-fee">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Toplam Kapatma Tutarı:</span>
                <strong class="hc-result-value" id="hc-kkk-res-total">-</strong>
            </div>
            <p class="hc-small-text">Yasal olarak kalan vadesi 36 ayı aşanlarda %2, aşmayanlarda %1 erken ödeme tazminatı uygulanabilir.</p>
        </div>
    </div>
    <?php
}
