<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lunar_return_haritasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lunar-return',
        HC_PLUGIN_URL . 'modules/lunar-return-haritasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-lunar-return-css',
        HC_PLUGIN_URL . 'modules/lunar-return-haritasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-lunar-return">
        <h3>Lunar Return (Ay Dönüşü) Hesaplama</h3>
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>Doğum Tarihiniz</label>
                <input type="date" id="hc-lr-birth" class="hc-input">
            </div>
            <div class="hc-form-group">
                <label>Hedef Ay ve Yıl</label>
                <input type="month" id="hc-lr-month" class="hc-input" value="2026-05">
            </div>
        </div>
        <button class="hc-btn" onclick="hcLunarReturnHesapla()">Aylık Haritayı Hesapla</button>
        <div class="hc-result" id="hc-lunar-return-result">
            <div class="hc-lr-header">
                <span class="hc-result-label">Aylık Duygusal Odak</span>
                <div class="hc-result-value" id="hc-lr-focus">-</div>
            </div>
            <div id="hc-lr-details" class="hc-lr-details">
                <!-- Detaylar -->
            </div>
        </div>
    </div>
    <?php
}
