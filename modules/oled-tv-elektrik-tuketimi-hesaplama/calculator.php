<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_oled_tv_elektrik_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-oled-tv',
        HC_PLUGIN_URL . 'modules/oled-tv-elektrik-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-oled-tv-css',
        HC_PLUGIN_URL . 'modules/oled-tv-elektrik-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-oled-tv">
        <h3>OLED TV Elektrik Tüketimi</h3>
        
        <div class="hc-form-group">
            <label for="hc-ot-size">Ekran Boyutu</label>
            <select id="hc-ot-size">
                <option value="80">55 inç (80W ortalama)</option>
                <option value="110">65 inç (110W ortalama)</option>
                <option value="150">77 inç (150W ortalama)</option>
                <option value="190">83 inç (190W ortalama)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-ot-hours">Günlük İzleme Süresi (Saat)</label>
            <input type="number" id="hc-ot-hours" value="6" step="1">
        </div>

        <button class="hc-btn" onclick="hcTvHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-ot-result">
            <div class="hc-result-item">
                <span>Aylık Tüketim:</span>
                <span class="hc-result-value" id="hc-res-ot-kwh">-</span>
            </div>
            <div class="hc-result-item">
                <span>Aylık Maliyet:</span>
                <span class="hc-result-value highlight" id="hc-res-ot-cost">-</span>
            </div>
            <div class="hc-result-note">
                * OLED TV'lerde parlaklık seviyesi ve HDR kullanımı tüketimi %30 oranında etkileyebilir.
            </div>
        </div>
    </div>
    <?php
}
