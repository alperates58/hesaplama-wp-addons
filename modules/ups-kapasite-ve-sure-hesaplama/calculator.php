<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ups_kapasite_ve_sure_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ups-calc',
        HC_PLUGIN_URL . 'modules/ups-kapasite-ve-sure-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ups-calc-css',
        HC_PLUGIN_URL . 'modules/ups-kapasite-ve-sure-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ups-calc">
        <h3>UPS Besleme Süresi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-us-load">Bağlı Toplam Yük (Watt)</label>
            <input type="number" id="hc-us-load" placeholder="Örn: 300" step="1">
            <small>PC, monitör ve modem toplam gücü.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-us-batt-v">Akü Voltajı (V)</label>
            <select id="hc-us-batt-v">
                <option value="12" selected>12V (Tek Akü)</option>
                <option value="24">24V (Çift Akü)</option>
                <option value="48">48V</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-us-batt-ah">Toplam Akü Kapasitesi (Ah)</label>
            <input type="number" id="hc-us-batt-ah" placeholder="Örn: 9" value="9" step="0.5">
            <small>UPS içindeki akülerin toplam Amper-saat değeri.</small>
        </div>

        <button class="hc-btn" onclick="hcUpsHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-us-result">
            <div class="hc-result-item">
                <span>Tahmini Besleme Süresi:</span>
                <span class="hc-result-value highlight" id="hc-res-us-time">-</span>
            </div>
            <div class="hc-result-note">
                * Süre = (V * Ah * 0.8) / Yük formülü ile %80 verim baz alınarak hesaplanmıştır.
            </div>
        </div>
    </div>
    <?php
}
