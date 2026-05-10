<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tepkime_hizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tepkime-hizi-hesaplama',
        HC_PLUGIN_URL . 'modules/tepkime-hizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tepkime-hizi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/tepkime-hizi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-reaction-rate">
        <h3>Tepkime Hızı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-rr-c1">Başlangıç Derişimi (M1)</label>
            <input type="number" id="hc-rr-c1" placeholder="Örn: 0.5">
        </div>
        <div class="hc-form-group">
            <label for="hc-rr-c2">Son Derişim (M2)</label>
            <input type="number" id="hc-rr-c2" placeholder="Örn: 0.2">
        </div>
        <div class="hc-form-group">
            <label for="hc-rr-time">Geçen Süre (saniye)</label>
            <input type="number" id="hc-rr-time" placeholder="Örn: 60">
        </div>
        <button class="hc-btn" onclick="hcTepkimeHızıHesapla()">Hızı Hesapla</button>
        <div class="hc-result" id="hc-rr-result">
            <div class="hc-result-label">Tepkime Hızı (r):</div>
            <div class="hc-result-value" id="hc-rr-val">-</div>
        </div>
    </div>
    <?php
}
