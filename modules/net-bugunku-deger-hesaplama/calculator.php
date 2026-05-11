<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_net_bugunku_deger_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-npv-calc',
        HC_PLUGIN_URL . 'modules/net-bugunku-deger-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-npv-calc-css',
        HC_PLUGIN_URL . 'modules/net-bugunku-deger-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-npv">
        <h3>Net Bugünkü Değer (NPV) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-npv-initial">İlk Yatırım Maliyeti (₺)</label>
            <input type="number" id="hc-npv-initial" placeholder="Örn: 500.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-npv-rate">Yıllık İskonto Oranı (%)</label>
            <input type="number" id="hc-npv-rate" placeholder="Örn: 25">
        </div>
        <div id="hc-npv-cashflows">
            <div class="hc-npv-row">
                <label>1. Yıl Nakit Akışı (₺)</label>
                <input type="number" class="hc-npv-cf" placeholder="Örn: 150.000">
            </div>
            <div class="hc-npv-row">
                <label>2. Yıl Nakit Akışı (₺)</label>
                <input type="number" class="hc-npv-cf" placeholder="Örn: 200.000">
            </div>
        </div>
        <button class="hc-btn-secondary" onclick="hcNpvSatirEkle()" style="margin-bottom: 15px;">+ Yıl Ekle</button>
        <button class="hc-btn" onclick="hcNpvHesapla()">NPV Hesapla</button>
        <div class="hc-result" id="hc-npv-result">
            <div class="hc-result-item">
                <span>Net Bugünkü Değer (NPV):</span>
                <strong class="hc-result-value" id="hc-npv-res-total">-</strong>
            </div>
            <p id="hc-npv-comment" class="hc-small-text"></p>
        </div>
    </div>
    <?php
}
