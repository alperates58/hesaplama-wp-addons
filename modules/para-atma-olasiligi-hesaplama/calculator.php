<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_para_atma_olasiligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-coin-flip',
        HC_PLUGIN_URL . 'modules/para-atma-olasiligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-coin-flip">
        <h3>Para Atma Olasılığı</h3>
        <div class="hc-form-group">
            <label for="hc-cf-total">Toplam Atış Sayısı (n):</label>
            <input type="number" id="hc-cf-total" min="1" max="100" placeholder="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-cf-target">Hedeflenen Gelme Sayısı (k):</label>
            <input type="number" id="hc-cf-target" min="0" placeholder="5">
        </div>
        <button class="hc-btn" onclick="hcCoinFlipHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-coin-flip-result">
            <strong>Olasılık:</strong>
            <div id="hc-cf-res-val" class="hc-result-value">-</div>
            <p id="hc-cf-desc" style="margin-top:10px; font-size:0.9rem;"></p>
        </div>
    </div>
    <?php
}
