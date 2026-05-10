<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yumurta_verimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yumurta-verimi',
        HC_PLUGIN_URL . 'modules/yumurta-verimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yumurta-verimi-css',
        HC_PLUGIN_URL . 'modules/yumurta-verimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yumurta-verimi">
        <h3>Yumurta Verimi (HDP) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-yv-eggs">Günlük Toplam Yumurta:</label>
            <input type="number" id="hc-yv-eggs" placeholder="45">
        </div>
        <div class="hc-form-group">
            <label for="hc-yv-hens">Toplam Tavuk Sayısı:</label>
            <input type="number" id="hc-yv-hens" placeholder="50">
        </div>
        <button class="hc-btn" onclick="hcYumurtaVerimiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-yumurta-verimi-result">
            <strong>Verim Oranı (Hen-Day Production):</strong>
            <div id="hc-yv-res-val" class="hc-result-value">-</div>
            <span>%</span>
        </div>
    </div>
    <?php
}
