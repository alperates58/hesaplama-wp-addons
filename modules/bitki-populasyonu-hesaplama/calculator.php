<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bitki_populasyonu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bitki-populasyonu-hesaplama',
        HC_PLUGIN_URL . 'modules/bitki-populasyonu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bitki-populasyonu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bitki-populasyonu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bitki-populasyonu-hesaplama">
        <h3>Bitki Popülasyonu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-pp-area">Toplam Alan (m²)</label>
            <input type="number" id="hc-pp-area" placeholder="Örn: 10000 (1 hektar)" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-pp-row-space">Sıra Arası Mesafe (cm)</label>
            <input type="number" id="hc-pp-row-space" placeholder="Örn: 70" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-pp-plant-space">Sıra Üzeri Mesafe (cm)</label>
            <input type="number" id="hc-pp-plant-space" placeholder="Örn: 20" step="any">
        </div>
        <button class="hc-btn" onclick="hcBitkiPopulasyonuHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-pp-result">
            <div class="hc-result-label">Toplam Bitki Sayısı:</div>
            <div class="hc-result-value" id="hc-pp-val">-</div>
            <div class="hc-result-note" id="hc-pp-note"></div>
        </div>
    </div>
    <?php
}
