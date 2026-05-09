<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_and_mantik_islemi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-and-logic',
        HC_PLUGIN_URL . 'modules/and-mantik-islemi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-and-logic-css',
        HC_PLUGIN_URL . 'modules/and-mantik-islemi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-and-logic">
        <h3>AND (VE) Mantık İşlemi</h3>
        
        <div class="hc-form-group">
            <label for="hc-al-type">Giriş Tipi</label>
            <select id="hc-al-type" onchange="hcAndTipDegisti()">
                <option value="binary">İkilik (Binary - 0/1)</option>
                <option value="decimal">Onluk (Bitsel AND)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-al-v1">1. Değer (A)</label>
            <input type="text" id="hc-al-v1" placeholder="Örn: 1010">
        </div>

        <div class="hc-form-group">
            <label for="hc-al-v2">2. Değer (B)</label>
            <input type="text" id="hc-al-v2" placeholder="Örn: 1100">
        </div>

        <button class="hc-btn" onclick="hcAndHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-al-result">
            <div class="hc-result-item">
                <span>Sonuç (A AND B):</span>
                <span class="hc-result-value highlight" id="hc-res-al-val">-</span>
            </div>
            <div class="hc-result-item" id="hc-al-bin-group">
                <span>İkilik Karşılığı:</span>
                <span class="hc-result-value" id="hc-res-al-bin">-</span>
            </div>
        </div>
    </div>
    <?php
}
