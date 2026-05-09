<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_obp_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-obp-calc',
        HC_PLUGIN_URL . 'modules/obp-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-obp-calc-box">
        <h3>OBP Hesaplama</h3>
        <div class="hc-form-group">
            <label>Diploma Notu (100 üzerinden)</label>
            <input type="number" step="0.01" id="hc-obp-diploma" placeholder="Örn: 85.50">
        </div>
        <button class="hc-btn" onclick="hcObpHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-obp-result">
            <div class="hc-form-group">
                <label>OBP Puanınız:</label>
                <div class="hc-result-value" id="hc-obp-val">-</div>
            </div>
            <div class="hc-form-group">
                <label>Sınav Puanına Eklenecek (Yerleştirme):</label>
                <div class="hc-result-value" id="hc-obp-impact" style="font-size: 20px;">-</div>
            </div>
        </div>
    </div>
    <?php
}
