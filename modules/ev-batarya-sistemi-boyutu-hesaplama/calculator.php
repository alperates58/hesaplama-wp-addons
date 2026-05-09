<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ev_batarya_sistemi_boyutu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-home-battery',
        HC_PLUGIN_URL . 'modules/ev-batarya-sistemi-boyutu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-home-battery-css',
        HC_PLUGIN_URL . 'modules/ev-batarya-sistemi-boyutu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-home-battery">
        <h3>Ev Batarya Sistemi Boyutu</h3>
        
        <div class="hc-form-group">
            <label for="hc-hbs-daily">Günlük Enerji Tüketimi (kWh)</label>
            <input type="number" id="hc-hbs-daily" placeholder="Örn: 10" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-hbs-days">Otonomi Süresi (Gün)</label>
            <input type="number" id="hc-hbs-days" value="1" step="0.5">
            <small>Güneşsiz veya şebekesiz idare edilmesi istenen gün sayısı.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-hbs-dod">Deşarj Derinliği (DoD - %)</label>
            <input type="number" id="hc-hbs-dod" value="80" step="1">
            <small>Lityum piller için %80-%90, Jel piller için %50 önerilir.</small>
        </div>

        <button class="hc-btn" onclick="hcBataryaBoyutuHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-hbs-result">
            <div class="hc-result-item">
                <span>Gerekli Net Kapasite:</span>
                <span class="hc-result-value" id="hc-res-hbs-net">-</span>
            </div>
            <div class="hc-result-item">
                <span>Önerilen Toplam Kapasite:</span>
                <span class="hc-result-value highlight" id="hc-res-hbs-total">-</span>
            </div>
        </div>
    </div>
    <?php
}
