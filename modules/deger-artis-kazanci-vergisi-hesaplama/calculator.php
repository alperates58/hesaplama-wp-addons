<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_deger_artis_kazanci_vergisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dak-vergi',
        HC_PLUGIN_URL . 'modules/deger-artis-kazanci-vergisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dak-vergi-css',
        HC_PLUGIN_URL . 'modules/deger-artis-kazanci-vergisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dak">
        <h3>Değer Artış Kazancı Vergisi</h3>
        <div class="hc-form-group">
            <label for="hc-dak-purchase-price">Alış Fiyatı (₺)</label>
            <input type="number" id="hc-dak-purchase-price" placeholder="Örn: 2.000.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-dak-sale-price">Satış Fiyatı (₺)</label>
            <input type="number" id="hc-dak-sale-price" placeholder="Örn: 4.500.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-dak-years">Elde Tutma Süresi (Yıl)</label>
            <select id="hc-dak-years">
                <option value="1">1 Yıl</option>
                <option value="2">2 Yıl</option>
                <option value="3">3 Yıl</option>
                <option value="4">4 Yıl</option>
                <option value="5">5 Yıl ve Üzeri (İstisna)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-dak-index">Enflasyon (ÜFE) Artış Oranı (%)</label>
            <input type="number" id="hc-dak-index" placeholder="Örn: 50">
        </div>
        <button class="hc-btn" onclick="hcDakHesapla()">Vergi Hesapla</button>
        <div class="hc-result" id="hc-dak-result">
            <div class="hc-result-item">
                <span>Endekslenmiş Alış Maliyeti:</span>
                <strong id="hc-dak-res-indexed">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Vergiye Tabi Saf Kâr:</span>
                <strong id="hc-dak-res-profit">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Ödenecek Tahmini Vergi:</span>
                <strong class="hc-result-value" id="hc-dak-res-tax">-</strong>
            </div>
            <p id="hc-dak-note" class="hc-small-text"></p>
        </div>
    </div>
    <?php
}
