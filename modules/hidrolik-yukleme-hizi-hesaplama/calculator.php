<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hidrolik_yukleme_hizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hidrolik-yukleme-hizi-hesaplama',
        HC_PLUGIN_URL . 'modules/hidrolik-yukleme-hizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hidrolik-yukleme-hizi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hidrolik-yukleme-hizi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hidrolik-yukleme-hizi-hesaplama">
        <h3>Hidrolik Yükleme Hızı (HLR) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-hlr-q">Günlük Debi (Q, m³/gün)</label>
            <input type="number" id="hc-hlr-q" placeholder="Örn: 1000" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-hlr-area">Yüzey Alanı (A, m²)</label>
            <input type="number" id="hc-hlr-area" placeholder="Örn: 50" step="any">
        </div>
        <button class="hc-btn" onclick="hcHLRHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-hlr-result">
            <div class="hc-result-label">Hidrolik Yükleme Hızı:</div>
            <div class="hc-result-value" id="hc-hlr-val">-</div>
            <div class="hc-result-note">HLR = Q / A</div>
        </div>
    </div>
    <?php
}
