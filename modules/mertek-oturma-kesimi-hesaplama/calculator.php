<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mertek_oturma_kesimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-birdsmouth',
        HC_PLUGIN_URL . 'modules/mertek-oturma-kesimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-birdsmouth-css',
        HC_PLUGIN_URL . 'modules/mertek-oturma-kesimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-birdsmouth">
        <h3>Kuş Ağzı (Birdsmouth) Kesim Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-bm-depth">Mertek Derinliği / Kalınlığı (mm):</label>
            <input type="number" id="hc-bm-depth" placeholder="150">
        </div>
        <div class="hc-form-group">
            <label for="hc-bm-pitch">Çatı Eğimi (Derece °):</label>
            <input type="number" id="hc-bm-pitch" value="30">
        </div>
        <button class="hc-btn" onclick="hcBirdsmouthHesapla()">Kesim Ölçülerini Bul</button>
        <div class="hc-result" id="hc-birdsmouth-result">
            <div class="hc-bm-grid">
                <div class="hc-bm-item">
                    <strong>Yatay Kesim (Seat)</strong>
                    <div id="hc-bm-seat">-</div>
                    <span>mm</span>
                </div>
                <div class="hc-bm-item">
                    <strong>Dikey Kesim (Heel)</strong>
                    <div id="hc-bm-heel">-</div>
                    <span>mm</span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
