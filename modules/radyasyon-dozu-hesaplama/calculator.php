<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_radyasyon_dozu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-radiation',
        HC_PLUGIN_URL . 'modules/radyasyon-dozu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-radiation">
        <h3>Radyasyon Dozu (Mesafe Etkisi)</h3>
        
        <div class="hc-form-group">
            <label for="hc-rd-dose1">Başlangıç Doz Oranı (D<sub>1</sub> - μSv/saat)</label>
            <input type="number" id="hc-rd-dose1" placeholder="μSv/h" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-rd-dist1">Başlangıç Mesafesi (r<sub>1</sub> - metre)</label>
            <input type="number" id="hc-rd-dist1" placeholder="metre" step="any" value="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-rd-dist2">Yeni Mesafe (r<sub>2</sub> - metre)</label>
            <input type="number" id="hc-rd-dist2" placeholder="metre" step="any">
        </div>

        <button class="hc-btn" onclick="hcRadiationHesapla()">Yeni Dozu Hesapla</button>

        <div class="hc-result" id="hc-rd-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Yeni Doz Oranı (D<sub>2</sub>):</span>
                <span class="hc-result-value" id="hc-rd-res-total">--</span>
                <span class="hc-result-unit">μSv/saat</span>
            </div>
        </div>
    </div>
    <?php
}
