<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kambiyo_vergisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kambiyo-vergi',
        HC_PLUGIN_URL . 'modules/kambiyo-vergisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kambiyo-vergi-css',
        HC_PLUGIN_URL . 'modules/kambiyo-vergisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kambiyo">
        <h3>Kambiyo Vergisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-kv-amount">Alım Tutarı (₺)</label>
            <input type="number" id="hc-kv-amount" placeholder="Örn: 50.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-kv-rate">Vergi Oranı (%)</label>
            <select id="hc-kv-rate">
                <option value="0.002">Binde 2 (%0.2 - Standart)</option>
                <option value="0.01">Binde 10 (%1.0)</option>
                <option value="0.00">Muaf (Vergisiz)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcKambiyoVergisiHesapla()">Vergi Hesapla</button>
        <div class="hc-result" id="hc-kv-result">
            <div class="hc-result-item">
                <span>Kambiyo Vergisi (BSMV):</span>
                <strong class="hc-result-value" id="hc-kv-res-tax">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Toplam Maliyet:</span>
                <strong id="hc-kv-res-total">-</strong>
            </div>
        </div>
    </div>
    <?php
}
