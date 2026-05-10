<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kozmetik_parti_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kozmetik-parti-miktari-hesaplama',
        HC_PLUGIN_URL . 'modules/kozmetik-parti-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kozmetik-parti-miktari-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kozmetik-parti-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-batch-qty">
        <h3>Kozmetik Parti Miktarı</h3>
        <div class="hc-form-group">
            <label for="hc-bq-unit">Birim Ürün Ağırlığı (g / mL)</label>
            <input type="number" id="hc-bq-unit" placeholder="Örn: 250">
        </div>
        <div class="hc-form-group">
            <label for="hc-bq-count">Parti Sayısı (Adet Ürün)</label>
            <input type="number" id="hc-bq-count" placeholder="Örn: 1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-bq-loss">Tahmini Üretim Kaybı (%)</label>
            <input type="number" id="hc-bq-loss" value="3">
        </div>
        <button class="hc-btn" onclick="hcKozmetikPartiMiktarıHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bq-result">
            <div class="hc-result-label">Toplam Gereken Hammadde:</div>
            <div class="hc-result-value" id="hc-bq-val">-</div>
        </div>
    </div>
    <?php
}
