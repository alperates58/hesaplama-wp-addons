<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gebelik_dogum_tarihi( $atts ) {
    wp_enqueue_script(
        'hc-due-date',
        HC_PLUGIN_URL . 'modules/gebelik-dogum-tarihi/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-edd-box">
        <h3>Tahmini Doğum Tarihi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-edd-lmp">Son Adet Tarihi (SAT)</label>
            <input type="date" id="hc-edd-lmp">
        </div>

        <button class="hc-btn" onclick="hcDogumTarihiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-due-date-result">
            <div class="hc-result-item">
                <span>Tahmini Doğum Tarihi:</span>
                <div class="hc-result-value" id="hc-edd-value">-</div>
            </div>
            <div class="hc-result-item">
                <span>Şu Anki Gebelik Haftası:</span>
                <strong id="hc-edd-week">-</strong>
            </div>
            <div id="hc-edd-countdown" style="margin-top: 15px; font-weight: bold; text-align: center; color: #1976d2;">
                <!-- Geri sayım -->
            </div>
        </div>
    </div>
    <?php
}
