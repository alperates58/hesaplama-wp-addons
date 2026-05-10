<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_su_ihtiyaci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-su-ihtiyaci-hesaplama',
        HC_PLUGIN_URL . 'modules/su-ihtiyaci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-su-ihtiyaci-hesaplama-css',
        HC_PLUGIN_URL . 'modules/su-ihtiyaci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-water-need">
        <h3>Günlük Su İhtiyacı</h3>
        <div class="hc-form-group">
            <label for="hc-wn-weight">Kilonuz (kg)</label>
            <input type="number" id="hc-wn-weight" placeholder="Örn: 70">
        </div>
        <div class="hc-form-group">
            <label for="hc-wn-activity">Günlük Aktivite</label>
            <select id="hc-wn-activity">
                <option value="0">Hareketsiz</option>
                <option value="30">30 Dakika Egzersiz</option>
                <option value="60">60 Dakika Egzersiz</option>
                <option value="90">90+ Dakika Egzersiz</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcSuİhtiyacıHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-wn-result">
            <div class="hc-result-label">İdeal Günlük Tüketim:</div>
            <div class="hc-result-value" id="hc-wn-val">-</div>
        </div>
    </div>
    <?php
}
