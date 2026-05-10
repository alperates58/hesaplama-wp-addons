<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ikili_sayi_bolme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bin-div',
        HC_PLUGIN_URL . 'modules/ikili-sayi-bolme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bin-div-css',
        HC_PLUGIN_URL . 'modules/ikili-sayi-bolme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bin-div">
        <h3>İkili Sayı Bölme</h3>
        <div class="hc-form-group">
            <label for="hc-bd-s1">1. Sayı (Bölünen):</label>
            <input type="text" id="hc-bd-s1" placeholder="1100">
        </div>
        <div class="hc-form-group">
            <label for="hc-bd-s2">2. Sayı (Bölen):</label>
            <input type="text" id="hc-bd-s2" placeholder="11">
        </div>
        <button class="hc-btn" onclick="hcBinDivHesapla()">Böl</button>
        <div class="hc-result" id="hc-bin-div-result">
            <div class="hc-bd-res">
                <strong>Bölüm:</strong>
                <div id="hc-bd-res-quo" class="hc-result-value">-</div>
            </div>
            <div class="hc-bd-res">
                <strong>Kalan:</strong>
                <div id="hc-bd-res-rem">-</div>
            </div>
        </div>
    </div>
    <?php
}
