<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yag_yakim_nabiz_bolgesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fat-burn-hr',
        HC_PLUGIN_URL . 'modules/yag-yakim-nabiz-bolgesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-fat-burn-hr-css',
        HC_PLUGIN_URL . 'modules/yag-yakim-nabiz-bolgesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-fat-burn-hr">
        <h3>Yağ Yakım Nabız Bölgesi</h3>
        <div class="hc-form-group">
            <label for="hc-fb-age">Yaşınız:</label>
            <input type="number" id="hc-fb-age" placeholder="30">
        </div>
        <div class="hc-form-group">
            <label for="hc-fb-rest">Dinlenik Nabız (BPM):</label>
            <input type="number" id="hc-fb-rest" placeholder="70">
            <small>Sabah uyandığınızdaki nabzınız.</small>
        </div>
        <button class="hc-btn" onclick="hcFatBurnHrHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-fat-burn-hr-result">
            <strong>İdeal Yağ Yakım Aralığı:</strong>
            <div id="hc-fb-res-val" class="hc-result-value">-</div>
            <span>BPM (Atım/Dakika)</span>
            <p style="margin-top:15px; font-size:0.9rem;">Bu aralık, maksimum nabzınızın %60-%70'ine (Karvonen formülü ile) tekabül eder.</p>
        </div>
    </div>
    <?php
}
