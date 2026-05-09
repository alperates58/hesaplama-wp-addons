<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sunucu_kapasitesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-server-cap',
        HC_PLUGIN_URL . 'modules/sunucu-kapasitesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-server-cap-css',
        HC_PLUGIN_URL . 'modules/sunucu-kapasitesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-server-cap">
        <h3>Sunucu Yük Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-sc-req">Saniye Başına Talep (RPS)</label>
            <input type="number" id="hc-sc-req" value="500">
        </div>
        <div class="hc-form-group">
            <label for="hc-sc-cap">Sunucu Başına Kapasite [req/sn]</label>
            <input type="number" id="hc-sc-cap" value="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-sc-sf">Yedekleme Katsayısı (Safety Factor)</label>
            <input type="number" id="hc-sc-sf" value="1.5" step="0.1">
            <small>Pikler için 1.5 - 2.0 önerilir.</small>
        </div>
        <button class="hc-btn" onclick="hcServerCapHesapla()">Kapasiteyi Hesapla</button>
        <div class="hc-result" id="hc-server-cap-result">
            <div class="hc-result-item">
                <span>Gereken Sunucu Sayısı:</span>
                <span class="hc-result-value" id="hc-res-sc-val">0</span>
            </div>
            <p class="hc-sc-note">Hesaplama: (Toplam RPS / Sunucu Kapasitesi) * Katsayı</p>
        </div>
    </div>
    <?php
}
