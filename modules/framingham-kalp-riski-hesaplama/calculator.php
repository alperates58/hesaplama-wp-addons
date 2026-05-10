<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_framingham_kalp_riski_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-framingham-kalp-riski-hesaplama',
        HC_PLUGIN_URL . 'modules/framingham-kalp-riski-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-framingham-kalp-riski-hesaplama-css',
        HC_PLUGIN_URL . 'modules/framingham-kalp-riski-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-framingham">
        <h3>Framingham 10 Yıllık Kalp Riski</h3>
        <div class="hc-form-group">
            <label>Cinsiyet</label>
            <select id="hc-fr-gender">
                <option value="male">Erkek</option>
                <option value="female">Kadın</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-fr-age">Yaş</label>
            <input type="number" id="hc-fr-age" placeholder="Örn: 50">
        </div>
        <div class="hc-form-group">
            <label for="hc-fr-tc">Toplam Kolesterol (mg/dL)</label>
            <input type="number" id="hc-fr-tc" placeholder="Örn: 200">
        </div>
        <div class="hc-form-group">
            <label for="hc-fr-hdl">HDL Kolesterol (mg/dL)</label>
            <input type="number" id="hc-fr-hdl" placeholder="Örn: 45">
        </div>
        <div class="hc-form-group">
            <label for="hc-fr-sbp">Sistolik Tansiyon (mmHg)</label>
            <input type="number" id="hc-fr-sbp" placeholder="Örn: 130">
        </div>
        <div class="hc-form-group">
            <label><input type="checkbox" id="hc-fr-smoke"> Sigara kullanıyor mu?</label>
            <label><input type="checkbox" id="hc-fr-ht-med"> Tansiyon ilacı kullanıyor mu?</label>
        </div>
        <button class="hc-btn" onclick="hcFraminghamHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-fr-result">
            <div id="hc-fr-stats" style="text-align:left; font-size:1em; line-height:1.6;"></div>
        </div>
    </div>
    <?php
}
