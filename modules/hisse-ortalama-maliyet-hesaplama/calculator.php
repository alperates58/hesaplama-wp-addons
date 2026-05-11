<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hisse_ortalama_maliyet_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hisse-maliyet',
        HC_PLUGIN_URL . 'modules/hisse-ortalama-maliyet-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hisse-maliyet-css',
        HC_PLUGIN_URL . 'modules/hisse-ortalama-maliyet-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hisse-m">
        <h3>Hisse Ortalama Maliyet Hesaplama</h3>
        <div id="hc-maliyet-items">
            <div class="hc-maliyet-row">
                <input type="number" class="hc-m-shares" placeholder="Adet">
                <input type="number" class="hc-m-price" placeholder="Fiyat (₺)" step="0.01">
            </div>
            <div class="hc-maliyet-row">
                <input type="number" class="hc-m-shares" placeholder="Adet">
                <input type="number" class="hc-m-price" placeholder="Fiyat (₺)" step="0.01">
            </div>
        </div>
        <button class="hc-btn-secondary" onclick="hcMaliyetSatirEkle()" style="margin-bottom: 15px;">+ Alım Ekle</button>
        <button class="hc-btn" onclick="hcMaliyetHesapla()">Ortalama Maliyeti Hesapla</button>
        <div class="hc-result" id="hc-hisse-m-result">
            <div class="hc-result-item">
                <span>Toplam Hisse Adedi:</span>
                <strong id="hc-m-res-total-shares">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Toplam Yatırılan Tutar:</span>
                <strong id="hc-m-res-total-spent">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Ortalama Maliyet:</span>
                <strong class="hc-result-value" id="hc-m-res-avg">-</strong>
            </div>
        </div>
    </div>
    <?php
}
