<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_porsiyon_basina_kalori_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-portion-cal-js',
        HC_PLUGIN_URL . 'modules/porsiyon-basina-kalori-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-portion-cal-css',
        HC_PLUGIN_URL . 'modules/porsiyon-basina-kalori-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-portion-cal">
        <h3>Porsiyon Kalori Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-pc-total">Toplam Kalori (Yemeğin Tamamı)</label>
            <input type="number" id="hc-pc-total" value="2000" min="100">
        </div>

        <div class="hc-form-group">
            <label for="hc-pc-count">Porsiyon Sayısı</label>
            <input type="number" id="hc-pc-count" value="4" min="1">
        </div>

        <button class="hc-btn" onclick="hcPortionCalHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-portion-cal-result">
            <div class="hc-result-item">
                <span>Porsiyon Başı Kalori:</span>
                <strong class="hc-result-value" id="hc-pc-res-val">-</strong>
            </div>
        </div>
    </div>
    <?php
}
