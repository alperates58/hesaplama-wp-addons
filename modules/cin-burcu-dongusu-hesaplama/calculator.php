<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cin_burcu_dongusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cin-cycle',
        HC_PLUGIN_URL . 'modules/cin-burcu-dongusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cin-cycle-calc">
        <h3>Çin Burcu Döngüsü (60 Yıllık)</h3>
        <div class="hc-form-group">
            <label>Doğum Yılınız</label>
            <input type="number" id="hc-cbd-year" placeholder="Örn: 1984" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcCinDongusuHesapla()">Döngüyü Hesapla</button>
        <div class="hc-result" id="hc-cin-burcu-dongusu-result">
            <div class="hc-result-header">Döngüdeki Yeriniz: <span id="hc-cbd-value" class="hc-result-value"></span></div>
            <div id="hc-cbd-desc" class="hc-result-content"></div>
        </div>
    </div>
    <?php
}
