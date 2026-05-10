<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ustel_buyume_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-exp-growth',
        HC_PLUGIN_URL . 'modules/ustel-buyume-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-eg">
        <h3>Üstel Büyüme Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-eg-p">Başlangıç Değeri (P):</label>
            <input type="number" id="hc-eg-p" placeholder="1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-eg-r">Büyüme Oranı (% r):</label>
            <input type="number" id="hc-eg-r" placeholder="5">
        </div>
        <div class="hc-form-group">
            <label for="hc-eg-t">Zaman (t):</label>
            <input type="number" id="hc-eg-t" placeholder="10">
        </div>
        <button class="hc-btn" onclick="hcExpGrowthHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ustel-buyume-result">
            <strong>Gelecekteki Değer (A):</strong>
            <div id="hc-eg-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
