<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lifo_stok_degerleme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lifo-stok-degerleme-hesaplama',
        HC_PLUGIN_URL . 'modules/lifo-stok-degerleme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-lifo-stok-degerleme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/lifo-stok-degerleme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-lifo-stok-degerleme">
        <h3>LIFO Stok Değerleme Hesaplama</h3>
        <div id="hc-lifo-batches">
            <div class="hc-lifo-batch">
                <div class="hc-form-group">
                    <label>1. Parti Miktarı (En Eski)</label>
                    <input type="number" class="hc-lifo-qty" placeholder="Örn: 100">
                </div>
                <div class="hc-form-group">
                    <label>1. Parti Birim Fiyatı (₺)</label>
                    <input type="number" class="hc-lifo-price" placeholder="Örn: 10">
                </div>
            </div>
            <div class="hc-lifo-batch">
                <div class="hc-form-group">
                    <label>2. Parti Miktarı (En Yeni)</label>
                    <input type="number" class="hc-lifo-qty" placeholder="Örn: 150">
                </div>
                <div class="hc-form-group">
                    <label>2. Parti Birim Fiyatı (₺)</label>
                    <input type="number" class="hc-lifo-price" placeholder="Örn: 15">
                </div>
            </div>
        </div>
        <div class="hc-form-group">
            <label for="hc-lifo-sold">Satılan Toplam Miktar</label>
            <input type="number" id="hc-lifo-sold" placeholder="Örn: 120">
        </div>
        <button class="hc-btn" onclick="hcLifoStokHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-lifo-result">
            <div class="hc-result-item">
                <span>Satılan Malın Maliyeti (LIFO):</span>
                <strong id="hc-lifo-res-smm">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Kalan Stok Değeri:</span>
                <strong class="hc-result-value" id="hc-lifo-res-stock">-</strong>
            </div>
        </div>
    </div>
    <?php
}
