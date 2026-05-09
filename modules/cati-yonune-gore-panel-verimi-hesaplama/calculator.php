<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cati_yonune_gore_panel_verimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-solar-direction',
        HC_PLUGIN_URL . 'modules/cati-yonune-gore-panel-verimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-solar-direction-css',
        HC_PLUGIN_URL . 'modules/cati-yonune-gore-panel-verimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-solar-direction">
        <h3>Çatı Yönüne Göre Panel Verimi</h3>
        
        <div class="hc-form-group">
            <label for="hc-sd-power">Sistem Gücü (kWp)</label>
            <input type="number" id="hc-sd-power" value="1" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-sd-direction">Çatı Yönü</label>
            <select id="hc-sd-direction">
                <option value="1.0">Güney (Tam Verim - %100)</option>
                <option value="0.95">Güney Doğu / Güney Batı (%95)</option>
                <option value="0.85">Doğu / Batı (%85)</option>
                <option value="0.60">Kuzey Doğu / Kuzey Batı (%60)</option>
                <option value="0.40">Kuzey (%40)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-sd-tilt">Çatı Eğimi</label>
            <select id="hc-sd-tilt">
                <option value="1.0">30° - 35° (İdeal)</option>
                <option value="0.98">15° - 30°</option>
                <option value="0.95">Düz Çatı (0° - 15°)</option>
                <option value="0.90">Dik Çatı (>45°)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcSolarYonHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-sd-result">
            <div class="hc-result-item">
                <span>Yön/Eğim Verimlilik Katsayısı:</span>
                <span class="hc-result-value" id="hc-res-sd-coeff">-</span>
            </div>
            <div class="hc-result-item">
                <span>Tahmini Üretim Kaybı:</span>
                <span class="hc-result-value" id="hc-res-sd-loss">-</span>
            </div>
            <div class="hc-result-note">
                * Bu hesaplama Türkiye (Kuzey Yarımküre) coğrafi konumuna göre genel yaklaşımdır.
            </div>
        </div>
    </div>
    <?php
}
