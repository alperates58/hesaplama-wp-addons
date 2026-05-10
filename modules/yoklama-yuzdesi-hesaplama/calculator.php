<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yoklama_yuzdesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-att-pct',
        HC_PLUGIN_URL . 'modules/yoklama-yuzdesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-att">
        <h3>Yoklama / Katılım Yüzdesi</h3>
        <div class="hc-form-group">
            <label for="hc-ap-present">Katıldığınız Saat/Gün:</label>
            <input type="number" id="hc-ap-present" placeholder="45">
        </div>
        <div class="hc-form-group">
            <label for="hc-ap-total">Toplam Saat/Gün:</label>
            <input type="number" id="hc-ap-total" placeholder="50">
        </div>
        <button class="hc-btn" onclick="hcAttPctHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-yoklama-yuzdesi-result">
            <strong>Katılım Yüzdesi:</strong>
            <div id="hc-ap-res-val" class="hc-result-value">-</div>
            <p id="hc-ap-status" style="margin-top:10px; font-weight:bold;"></p>
        </div>
    </div>
    <?php
}
