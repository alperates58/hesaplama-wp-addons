<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_spiral_merdiven_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-spiral-stair',
        HC_PLUGIN_URL . 'modules/spiral-merdiven-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-spiral-stair-css',
        HC_PLUGIN_URL . 'modules/spiral-merdiven-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-spiral">
        <h3>Spiral Merdiven Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ss-diam">Merdiven Çapı (cm):</label>
            <input type="number" id="hc-ss-diam" placeholder="200">
        </div>
        <div class="hc-form-group">
            <label for="hc-ss-angle">Toplam Dönüş Açısı (°):</label>
            <input type="number" id="hc-ss-angle" value="360">
        </div>
        <div class="hc-form-group">
            <label for="hc-ss-height">Toplam Yükseklik (cm):</label>
            <input type="number" id="hc-ss-height" placeholder="300">
        </div>
        <button class="hc-btn" onclick="hcSpiralStairHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-spiral-result">
            <div class="hc-ss-grid">
                <div class="hc-ss-item">
                    <strong>Rıht Yüksekliği</strong>
                    <div id="hc-ss-res-riser">-</div>
                    <span>cm</span>
                </div>
                <div class="hc-ss-item">
                    <strong>Basamak Açısı</strong>
                    <div id="hc-ss-res-step-angle">-</div>
                    <span>°</span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
