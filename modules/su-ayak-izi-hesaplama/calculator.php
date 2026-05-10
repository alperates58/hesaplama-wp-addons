<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_su_ayak_izi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-su-ayak-izi-hesaplama',
        HC_PLUGIN_URL . 'modules/su-ayak-izi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-su-ayak-izi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/su-ayak-izi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-water-footprint">
        <h3>Sanal Su Ayak İzi</h3>
        <div class="hc-form-group">
            <label for="hc-wf-meat">Haftalık Et Tüketimi (kg)</label>
            <input type="number" id="hc-wf-meat" placeholder="Örn: 1">
        </div>
        <div class="hc-form-group">
            <label for="hc-wf-coffee">Günlük Kahve (Fincan)</label>
            <input type="number" id="hc-wf-coffee" placeholder="Örn: 2">
        </div>
        <div class="hc-form-group">
            <label for="hc-wf-jeans">Yıllık Yeni Jean Pantolon (Adet)</label>
            <input type="number" id="hc-wf-jeans" placeholder="Örn: 2">
        </div>
        <button class="hc-btn" onclick="hcSuAyakİziHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-wf-result">
            <div class="hc-result-label">Yıllık Sanal Su Tüketimi:</div>
            <div class="hc-result-value" id="hc-wf-val">-</div>
            <p id="hc-wf-info" style="margin-top:10px; font-size:0.85em; color:#666;"></p>
        </div>
    </div>
    <?php
}
