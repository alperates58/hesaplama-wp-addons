<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_solar_arc_haritasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-solar-arc',
        HC_PLUGIN_URL . 'modules/solar-arc-haritasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-solar-arc-css',
        HC_PLUGIN_URL . 'modules/solar-arc-haritasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-solar-arc">
        <h3>Solar Arc (Güneş Yayı) Hesaplama</h3>
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>Doğum Tarihiniz</label>
                <input type="date" id="hc-sa-birth" class="hc-input">
            </div>
            <div class="hc-form-group">
                <label>Hedef Yıl</label>
                <input type="number" id="hc-sa-year" class="hc-input" value="2026">
            </div>
        </div>
        <button class="hc-btn" onclick="hcSolarArcHesapla()">Yönelimleri Hesapla</button>
        <div class="hc-result" id="hc-solar-arc-result">
            <div id="hc-sa-arc-value" class="hc-sa-arc-value">
                <!-- Yay değeri -->
            </div>
            <div id="hc-sa-list" class="hc-sa-list">
                <!-- Listeleme -->
            </div>
        </div>
    </div>
    <?php
}
