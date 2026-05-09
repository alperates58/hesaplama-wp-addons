<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_utu_elektrik_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-iron-power',
        HC_PLUGIN_URL . 'modules/utu-elektrik-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-iron-power-css',
        HC_PLUGIN_URL . 'modules/utu-elektrik-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-iron-power">
        <h3>Ütü Elektrik Tüketimi</h3>
        
        <div class="hc-form-group">
            <label for="hc-ue-watt">Ütü Gücü (Watt)</label>
            <input type="number" id="hc-ue-watt" placeholder="Örn: 2400" value="2400" step="10">
        </div>

        <div class="hc-form-group">
            <label for="hc-ue-hours">Haftalık Toplam Kullanım (Saat)</label>
            <input type="number" id="hc-ue-hours" value="2" step="0.5">
        </div>

        <button class="hc-btn" onclick="hcUtuHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-ue-result">
            <div class="hc-result-item">
                <span>Aylık Toplam Tüketim:</span>
                <span class="hc-result-value" id="hc-res-ue-kwh">-</span>
            </div>
            <div class="hc-result-item">
                <span>Aylık Tahmini Maliyet:</span>
                <span class="hc-result-value highlight" id="hc-res-ue-cost">-</span>
            </div>
            <div class="hc-result-note">
                * Ütüler termostatlı olduğu için aktif ısınma süresi toplam sürenin %70'i baz alınmıştır.
            </div>
        </div>
    </div>
    <?php
}
