<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_plastik_karbon_ayak_izi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-plastik-karbon-ayak-izi-hesaplama',
        HC_PLUGIN_URL . 'modules/plastik-karbon-ayak-izi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-plastik-karbon-ayak-izi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/plastik-karbon-ayak-izi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-plastic-carbon">
        <h3>Plastik Karbon Ayak İzi</h3>
        <div class="hc-form-group">
            <label for="hc-pc-weight">Yıllık Plastik Kullanımı (kg)</label>
            <input type="number" id="hc-pc-weight" placeholder="Örn: 30">
        </div>
        <button class="hc-btn" onclick="hcPlastikKarbonAyakİziHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-pc-result">
            <div class="hc-result-label">Toplam CO₂e Salınımı:</div>
            <div class="hc-result-value" id="hc-pc-val">-</div>
            <p style="font-size:0.85em; margin-top:10px; color:#666;">*1 kg plastik üretimi ve imhası ortalama 6 kg CO₂e salınımı yapar.</p>
        </div>
    </div>
    <?php
}
