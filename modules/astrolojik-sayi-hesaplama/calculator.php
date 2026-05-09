<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_astrolojik_sayi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ast-num',
        HC_PLUGIN_URL . 'modules/astrolojik-sayi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ast-num-css',
        HC_PLUGIN_URL . 'modules/astrolojik-sayi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-astrolojik-sayi-hesaplama">
        <h3>Astrolojik Sayı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ast-burc">Burcunuzu Seçin</label>
            <select id="hc-ast-burc">
                <option value="Koç">Koç</option>
                <option value="Boğa">Boğa</option>
                <option value="İkizler">İkizler</option>
                <option value="Yengeç">Yengeç</option>
                <option value="Aslan">Aslan</option>
                <option value="Başak">Başak</option>
                <option value="Terazi">Terazi</option>
                <option value="Akrep">Akrep</option>
                <option value="Yay">Yay</option>
                <option value="Oğlak">Oğlak</option>
                <option value="Kova">Kova</option>
                <option value="Balık">Balık</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcAstNumHesapla()">Sayıyı Bul</button>
        <div class="hc-result" id="hc-ast-result">
            <div class="hc-result-label">Şanslı Sayınız:</div>
            <div class="hc-result-value" id="hc-ast-val"></div>
            <div class="hc-result-desc" id="hc-ast-desc"></div>
        </div>
    </div>
    <?php
}
