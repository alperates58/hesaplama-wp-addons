<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gebelikte_kilo_alimi( $atts ) {
    wp_enqueue_script(
        'hc-preg-weight',
        HC_PLUGIN_URL . 'modules/gebelikte-kilo-alimi/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-pw-box">
        <h3>Gebelikte İdeal Kilo Alımı</h3>
        
        <div class="hc-form-group">
            <label for="hc-pw-height">Boyunuz (cm)</label>
            <input type="number" id="hc-pw-height" placeholder="cm">
        </div>

        <div class="hc-form-group">
            <label for="hc-pw-weight">Hamilelik Öncesi Kilonuz (kg)</label>
            <input type="number" id="hc-pw-weight" placeholder="kg">
        </div>

        <button class="hc-btn" onclick="hcGebelikteKiloHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-preg-weight-result">
            <div class="hc-result-item">
                <span>Önerilen Toplam Artış:</span>
                <div class="hc-result-value" id="hc-pw-value">-</div>
            </div>
            <div id="hc-pw-details" style="margin-top: 15px; font-size: 0.9em; text-align: center;">
                <!-- Detaylar -->
            </div>
        </div>
    </div>
    <?php
}
