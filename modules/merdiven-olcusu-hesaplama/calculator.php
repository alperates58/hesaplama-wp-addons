<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_merdiven_olcusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-stair-calc',
        HC_PLUGIN_URL . 'modules/merdiven-olcusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-stair-calc-css',
        HC_PLUGIN_URL . 'modules/merdiven-olcusu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-stair">
        <h3>Merdiven Ölçüsü Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-st-height">Toplam Kat Yüksekliği (cm):</label>
            <input type="number" id="hc-st-height" placeholder="300">
        </div>
        <div class="hc-form-group">
            <label for="hc-st-riser">Hedef Rıht Yüksekliği (cm):</label>
            <input type="number" id="hc-st-riser" value="17.5" step="0.1">
            <small>İdeal: 16-18 cm</small>
        </div>
        <button class="hc-btn" onclick="hcStairCalcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-stair-result">
            <div class="hc-st-grid">
                <div class="hc-st-item">
                    <strong>Basamak Sayısı</strong>
                    <div id="hc-st-res-count">-</div>
                </div>
                <div class="hc-st-item">
                    <strong>Net Rıht (cm)</strong>
                    <div id="hc-st-res-riser">-</div>
                </div>
                <div class="hc-st-item">
                    <strong>Basamak Genişliği (cm)</strong>
                    <div id="hc-st-res-tread">-</div>
                    <small>Blondel: 2R + B = 62-64</small>
                </div>
            </div>
        </div>
    </div>
    <?php
}
