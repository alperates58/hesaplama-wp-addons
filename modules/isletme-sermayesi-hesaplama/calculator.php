<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_isletme_sermayesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-isletme-sermayesi-hesaplama',
        HC_PLUGIN_URL . 'modules/isletme-sermayesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-isletme-sermayesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/isletme-sermayesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-isletme-sermayesi">
        <h3>İşletme Sermayesi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-wc-assets">Dönen Varlıklar (Kasa, Banka, Stoklar vb. ₺)</label>
            <input type="number" id="hc-wc-assets" placeholder="Örn: 500.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-wc-liabilities">Kısa Vadeli Yükümlülükler (Borçlar, Ödemeler ₺)</label>
            <input type="number" id="hc-wc-liabilities" placeholder="Örn: 300.000">
        </div>
        <button class="hc-btn" onclick="hcWorkingCapitalHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-wc-result">
            <div class="hc-result-item">
                <span>Net İşletme Sermayesi:</span>
                <strong class="hc-result-value" id="hc-wc-value">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Cari Oran:</span>
                <strong id="hc-wc-ratio">-</strong>
            </div>
            <p class="hc-small-text">Pozitif sermaye işletmenin kısa vadeli borçlarını ödeme gücünü gösterir.</p>
        </div>
    </div>
    <?php
}
