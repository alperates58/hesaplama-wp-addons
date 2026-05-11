<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_fifo_stok_degerleme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fifo-stok-degerleme-hesaplama',
        HC_PLUGIN_URL . 'modules/fifo-stok-degerleme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-fifo-stok-degerleme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/fifo-stok-degerleme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-fifo-stok-degerleme">
        <h3>FIFO Stok Değerleme Hesaplama</h3>
        <div id="hc-fifo-batches">
            <div class="hc-fifo-batch">
                <div class="hc-form-group">
                    <label>1. Parti Miktarı</label>
                    <input type="number" class="hc-fifo-qty" placeholder="Örn: 100">
                </div>
                <div class="hc-form-group">
                    <label>1. Parti Birim Fiyatı (₺)</label>
                    <input type="number" class="hc-fifo-price" placeholder="Örn: 10">
                </div>
            </div>
            <div class="hc-fifo-batch">
                <div class="hc-form-group">
                    <label>2. Parti Miktarı</label>
                    <input type="number" class="hc-fifo-qty" placeholder="Örn: 150">
                </div>
                <div class="hc-form-group">
                    <label>2. Parti Birim Fiyatı (₺)</label>
                    <input type="number" class="hc-fifo-price" placeholder="Örn: 12">
                </div>
            </div>
        </div>
        <div class="hc-form-group">
            <label for="hc-fifo-sold">Satılan Toplam Miktar</label>
            <input type="number" id="hc-fifo-sold" placeholder="Örn: 120">
        </div>
        <button class="hc-btn" onclick="hcFifoStokHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-fifo-result">
            <div class="hc-result-item">
                <span>Satılan Malın Maliyeti (FIFO):</span>
                <strong id="hc-fifo-res-smm">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Kalan Stok Değeri:</span>
                <strong class="hc-result-value" id="hc-fifo-res-stock">-</strong>
            </div>
        </div>
    </div>
    <?php
}
