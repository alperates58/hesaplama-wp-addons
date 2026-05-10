<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ic_mekan_hava_kalitesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ic-mekan-hava-kalitesi-hesaplama',
        HC_PLUGIN_URL . 'modules/ic-mekan-hava-kalitesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ic-mekan-hava-kalitesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ic-mekan-hava-kalitesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-indoor-air">
        <h3>İç Mekan Hava Kalitesi Skoru</h3>
        <div class="hc-form-group">
            <label>Evdeki Risk Faktörleri</label>
            <div class="hc-check-list">
                <label><input type="checkbox" class="hc-ia-risk" value="20"> Yeni mobilya veya halı (Son 6 ay)</label>
                <label><input type="checkbox" class="hc-ia-risk" value="15"> İç mekanda sigara kullanımı</label>
                <label><input type="checkbox" class="hc-ia-risk" value="10"> Yetersiz havalandırma (Günde < 2 kez)</label>
                <label><input type="checkbox" class="hc-ia-risk" value="10"> Rutubet veya küf belirtileri</label>
                <label><input type="checkbox" class="hc-ia-risk" value="10"> Kimyasal temizleyicilerin yoğun kullanımı</label>
            </div>
        </div>
        <button class="hc-btn" onclick="hcİçMekanHavaKalitesiHesapla()">Skoru Hesapla</button>
        <div class="hc-result" id="hc-ia-result">
            <div class="hc-result-label">Hava Kalitesi Riski:</div>
            <div class="hc-result-value" id="hc-ia-val">-</div>
            <p id="hc-ia-desc" style="margin-top:10px; font-weight:bold;"></p>
        </div>
    </div>
    <?php
}
