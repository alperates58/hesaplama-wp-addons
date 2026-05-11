<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_temettu_verimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-temettu-verim',
        HC_PLUGIN_URL . 'modules/temettu-verimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-temettu-verim-css',
        HC_PLUGIN_URL . 'modules/temettu-verimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-temettu-v">
        <h3>Temettü Verimi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-tv-price">Güncel Hisse Fiyatı (₺)</label>
            <input type="number" id="hc-tv-price" placeholder="Örn: 150.00" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-tv-dividend">Yıllık Toplam Temettü (₺/Hisse)</label>
            <input type="number" id="hc-tv-dividend" placeholder="Örn: 7.50" step="0.01">
        </div>
        <button class="hc-btn" onclick="hcTemettuVerimiHesapla()">Verimi Hesapla</button>
        <div class="hc-result" id="hc-tv-result">
            <div class="hc-result-item">
                <span>Temettü Verimi:</span>
                <strong class="hc-result-value" id="hc-tv-res-total">-</strong>
            </div>
            <p class="hc-small-text">Temettü verimi, hisse fiyatına oranla aldığınız nakit getiri yüzdesidir.</p>
        </div>
    </div>
    <?php
}
