<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tahmini_varis_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-eta-calc',
        HC_PLUGIN_URL . 'modules/tahmini-varis-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-eta-box">
        <h3>Tahmini Varış Süresi Hesaplama</h3>
        <div class="hc-form-group">
            <label>Gidilecek Mesafe (km)</label>
            <input type="number" id="hc-eta-dist" placeholder="Örn: 450">
        </div>
        <div class="hc-form-group">
            <label>Ortalama Hız (km/h)</label>
            <input type="number" id="hc-eta-speed" value="90">
        </div>
        <button class="hc-btn" onclick="hcEtaHesapla()">Varış Zamanını Hesapla</button>
        <div class="hc-result" id="hc-eta-result">
            <div class="hc-result-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                <div><strong>Yolculuk Süresi:</strong><br><span id="hc-eta-time">-</span></div>
                <div><strong>Tahmini Varış:</strong><br><span id="hc-eta-arrival">-</span></div>
            </div>
        </div>
    </div>
    <?php
}
