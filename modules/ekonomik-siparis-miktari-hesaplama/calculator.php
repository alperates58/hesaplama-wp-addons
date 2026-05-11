<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ekonomik_siparis_mari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ekonomik-siparis-miktari-hesaplama',
        HC_PLUGIN_URL . 'modules/ekonomik-siparis-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ekonomik-siparis-miktari-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ekonomik-siparis-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ekonomik-siparis-miktari">
        <h3>Ekonomik Sipariş Miktarı Hesaplama (EOQ)</h3>
        <div class="hc-form-group">
            <label for="hc-eoq-demand">Yıllık Talep Miktarı (Adet)</label>
            <input type="number" id="hc-eoq-demand" placeholder="Örn: 10.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-eoq-order">Sipariş Başına Maliyet (₺)</label>
            <input type="number" id="hc-eoq-order" placeholder="Örn: 50">
        </div>
        <div class="hc-form-group">
            <label for="hc-eoq-holding">Birim Başına Yıllık Stok Tutma Maliyeti (₺)</label>
            <input type="number" id="hc-eoq-holding" placeholder="Örn: 2">
        </div>
        <button class="hc-btn" onclick="hcEoqHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-eoq-result">
            <div class="hc-result-item">
                <span>İdeal Sipariş Miktarı (EOQ):</span>
                <strong class="hc-result-value" id="hc-eoq-value">-</strong>
            </div>
            <p class="hc-small-text">Toplam stok maliyetini (sipariş verme + elde tutma) en düşük seviyede tutan sipariş büyüklüğüdür.</p>
        </div>
    </div>
    <?php
}
