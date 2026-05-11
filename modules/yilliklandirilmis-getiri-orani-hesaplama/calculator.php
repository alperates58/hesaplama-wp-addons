<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yilliklandirilmis_getiri_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yillik-getiri',
        HC_PLUGIN_URL . 'modules/yilliklandirilmis-getiri-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yillik-getiri-css',
        HC_PLUGIN_URL . 'modules/yilliklandirilmis-getiri-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yillik-g">
        <h3>Yıllıklandırılmış Getiri Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-yg-total">Toplam Getiri Oranı (%)</label>
            <input type="number" id="hc-yg-total" placeholder="Örn: 15">
        </div>
        <div class="hc-form-group">
            <label for="hc-yg-days">Yatırım Süresi (Gün)</label>
            <input type="number" id="hc-yg-days" placeholder="Örn: 90">
        </div>
        <button class="hc-btn" onclick="hcYillikGetiriHesapla()">Yıllıklandır</button>
        <div class="hc-result" id="hc-yg-result">
            <div class="hc-result-item">
                <span>Yıllıklandırılmış Getiri Oranı:</span>
                <strong class="hc-result-value" id="hc-yg-res-total">-</strong>
            </div>
            <p class="hc-small-text">Farklı vadelerdeki yatırımları (örn. 3 aylık vs 1 yıllık) elma elma kıyaslamak için kullanılır.</p>
        </div>
    </div>
    <?php
}
