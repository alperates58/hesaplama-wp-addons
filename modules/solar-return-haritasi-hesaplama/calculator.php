<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_solar_return_haritasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-solar-return',
        HC_PLUGIN_URL . 'modules/solar-return-haritasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-solar-return-css',
        HC_PLUGIN_URL . 'modules/solar-return-haritasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-solar-return">
        <h3>Solar Return (Güneş Dönüşü) Hesaplama</h3>
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>Doğum Tarihiniz</label>
                <input type="date" id="hc-sr-birth" class="hc-input">
            </div>
            <div class="hc-form-group">
                <label>Dönüş Yılı</label>
                <input type="number" id="hc-sr-year" class="hc-input" value="2026" min="1900" max="2100">
            </div>
        </div>
        <button class="hc-btn" onclick="hcSolarReturnHesapla()">Yıllık Haritayı Hesapla</button>
        <div class="hc-result" id="hc-solar-return-result">
            <div class="hc-sr-header">
                <span class="hc-result-label">Yıllık Tema</span>
                <div class="hc-result-value" id="hc-sr-theme">-</div>
            </div>
            <div id="hc-sr-details" class="hc-sr-details">
                <!-- Detaylar -->
            </div>
        </div>
    </div>
    <?php
}
