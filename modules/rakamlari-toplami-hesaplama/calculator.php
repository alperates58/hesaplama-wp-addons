<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_rakamlari_toplami_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-digit-sum',
        HC_PLUGIN_URL . 'modules/rakamlari-toplami-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-digit-sum">
        <h3>Rakamları Toplamı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ds-input">Sayıyı Giriniz:</label>
            <input type="text" id="hc-ds-input" placeholder="9876">
        </div>
        <button class="hc-btn" onclick="hcDigitSumHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-digit-sum-result">
            <strong>Rakamlar Toplamı:</strong>
            <div id="hc-ds-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
