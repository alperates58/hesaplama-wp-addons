<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gebelikte_kalan_gun( $atts ) {
    wp_enqueue_script(
        'hc-days-left',
        HC_PLUGIN_URL . 'modules/gebelikte-kalan-gun/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-days-box">
        <h3>Doğuma Kalan Gün Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-dg-edd">Tahmini Doğum Tarihi (TDT)</label>
            <input type="date" id="hc-dg-edd">
        </div>

        <button class="hc-btn" onclick="hcKalanGunHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-days-left-result">
            <div class="hc-result-item">
                <span>Toplam Kalan Gün:</span>
                <div class="hc-result-value" id="hc-dg-value">-</div>
            </div>
            <div id="hc-dg-details" style="margin-top: 15px; font-size: 0.9em; text-align: center;">
                <!-- Detay -->
            </div>
        </div>
    </div>
    <?php
}
