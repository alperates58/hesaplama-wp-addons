<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pizza_kenari_kalori_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pizza-crust-cal-js',
        HC_PLUGIN_URL . 'modules/pizza-kenari-kalori-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pizza-crust-cal-css',
        HC_PLUGIN_URL . 'modules/pizza-kenari-kalori-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pizza-crust-cal">
        <h3>Pizza Kenarı Kalori Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-pcc-diameter">Pizza Çapı (cm)</label>
            <input type="number" id="hc-pcc-diameter" value="30" min="10">
        </div>

        <div class="hc-form-group">
            <label for="hc-pcc-type">Kenar Tipi</label>
            <select id="hc-pcc-type">
                <option value="2.5">İnce Kenar (2.5 kcal/cm)</option>
                <option value="4.5">Klasik Kenar (4.5 kcal/cm)</option>
                <option value="8.0">Peynir Dolgulu (8.0 kcal/cm)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcCrustCalHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-pizza-crust-cal-result">
            <div class="hc-result-item">
                <span>Toplam Kenar Kalorisi:</span>
                <strong class="hc-result-value" id="hc-pcc-res-val">-</strong>
            </div>
            <div class="hc-result-note">Hesaplama, tüm pizzanın dış çeperini (kenarını) kapsar.</div>
        </div>
    </div>
    <?php
}
