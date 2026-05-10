<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_aylik_market_butcesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-aylik-market-butcesi-hesaplama',
        HC_PLUGIN_URL . 'modules/aylik-market-butcesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-aylik-market-butcesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/aylik-market-butcesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-market">
        <h3>Aylık Market Bütçesi (2026)</h3>
        <div class="hc-form-group">
            <label for="hc-mb-persons">Evdeki Kişi Sayısı</label>
            <input type="number" id="hc-mb-persons" value="2" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-mb-style">Harcama Tarzı</label>
            <select id="hc-mb-style">
                <option value="4000">Ekonomik (4.000 TL / Kişi)</option>
                <option value="7500" selected>Orta (7.500 TL / Kişi)</option>
                <option value="12000">Lüks / Gurme (12.000 TL / Kişi)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcAylıkMarketBütçesiHesapla()">Bütçeyi Hesapla</button>
        <div class="hc-result" id="hc-mb-result">
            <div class="hc-result-label">Tahmini Aylık Bütçe:</div>
            <div class="hc-result-value" id="hc-mb-val">-</div>
        </div>
    </div>
    <?php
}
