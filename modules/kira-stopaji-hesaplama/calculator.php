<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kira_stopaji_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kira-stopaj',
        HC_PLUGIN_URL . 'modules/kira-stopaji-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kira-stopaj-css',
        HC_PLUGIN_URL . 'modules/kira-stopaji-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kira-stopaj-calc">
        <h3>İşyeri Kira Stopajı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ks-type">Hesaplama Türü</label>
            <select id="hc-ks-type">
                <option value="brüt">Brütten Nete</option>
                <option value="net">Netten Brüte</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-ks-amount">Kira Tutarı (₺)</label>
            <input type="number" id="hc-ks-amount" placeholder="Örn: 20.000">
        </div>
        <button class="hc-btn" onclick="hcKiraStopajHesapla()">Stopaj Hesapla</button>
        <div class="hc-result" id="hc-ks-result">
            <div class="hc-result-item">
                <span>Brüt Kira:</span>
                <strong id="hc-ks-res-gross">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Stopaj Tutarı (%20):</span>
                <strong id="hc-ks-res-tax">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Net Kira (Mülk Sahibine):</span>
                <strong class="hc-result-value" id="hc-ks-res-net">-</strong>
            </div>
        </div>
    </div>
    <?php
}
