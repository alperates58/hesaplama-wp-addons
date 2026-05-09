<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunes_batarya_sistem_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-solar-battery',
        HC_PLUGIN_URL . 'modules/gunes-batarya-sistem-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-solar-battery-css',
        HC_PLUGIN_URL . 'modules/gunes-batarya-sistem-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-solar-battery">
        <h3>Güneş Batarya Sistem Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-sb-power">Güneş Paneli Kurulu Gücü (kWp)</label>
            <input type="number" id="hc-sb-power" placeholder="Örn: 5" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-sb-cap">Batarya Kapasitesi (kWh)</label>
            <input type="number" id="hc-sb-cap" placeholder="Örn: 10" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-sb-sun">Günlük Güneşlenme Süresi (Saat)</label>
            <input type="number" id="hc-sb-sun" value="5" step="0.5">
            <small>Türkiye ortalaması 5-7 saat arasıdır.</small>
        </div>

        <button class="hc-btn" onclick="hcSolarBataryaHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-sb-result">
            <div class="hc-result-item">
                <span>Tam Şarj İçin Gerekli Süre:</span>
                <span class="hc-result-value" id="hc-res-sb-time">-</span>
            </div>
            <div class="hc-result-item">
                <span>Günlük Maksimum Üretim:</span>
                <span class="hc-result-value" id="hc-res-sb-gen">-</span>
            </div>
            <div class="hc-result-note">
                * Şarj kontrol cihazı ve inverter kayıpları (%15) dahil edilmiştir.
            </div>
        </div>
    </div>
    <?php
}
