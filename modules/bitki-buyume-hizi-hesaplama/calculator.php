<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bitki_buyume_hizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bitki-buyume-hizi-hesaplama',
        HC_PLUGIN_URL . 'modules/bitki-buyume-hizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bitki-buyume-hizi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bitki-buyume-hizi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bitki-buyume-hizi-hesaplama">
        <h3>Bitki Büyüme Hızı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-pg-h1">İlk Boy (cm)</label>
            <input type="number" id="hc-pg-h1" placeholder="Örn: 10" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-pg-h2">Son Boy (cm)</label>
            <input type="number" id="hc-pg-h2" placeholder="Örn: 25" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-pg-days">Süre (gün)</label>
            <input type="number" id="hc-pg-days" placeholder="Örn: 14" step="any">
        </div>
        <button class="hc-btn" onclick="hcBitkiBuyumeHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-pg-result">
            <div class="hc-result-label">Günlük Büyüme Hızı:</div>
            <div class="hc-result-value" id="hc-pg-val">-</div>
            <div class="hc-result-note" id="hc-pg-note"></div>
        </div>
    </div>
    <?php
}
