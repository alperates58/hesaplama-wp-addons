<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_stok_devir_hizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-stok-devir-hizi-hesaplama',
        HC_PLUGIN_URL . 'modules/stok-devir-hizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-stok-devir-hizi-css',
        HC_PLUGIN_URL . 'modules/stok-devir-hizi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-stok-devir-hizi-hesaplama">
        <h3>Stok Devir Hızı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-sdh-cogs">Satılan Malların Maliyeti (SMM) (TL)</label>
            <input type="number" id="hc-sdh-cogs" placeholder="Yıllık Toplam SMM">
        </div>

        <div class="hc-form-group">
            <label for="hc-sdh-avg-inv">Ortalama Stok Değeri (TL)</label>
            <input type="number" id="hc-sdh-avg-inv" placeholder="(Dönem Başı + Dönem Sonu) / 2">
        </div>
        
        <button class="hc-btn" onclick="hcStokDevirHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-stok-devir-result">
            <div class="hc-result-item">
                <span>Stokta Kalış Süresi:</span>
                <strong id="hc-sdh-res-days">-</strong>
            </div>
            <div class="hc-result-value" id="hc-sdh-res-ratio">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Stok Devir Hızı (Kez/Yıl)</p>
        </div>
    </div>
    <?php
}
