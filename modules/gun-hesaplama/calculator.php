<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gun_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gun-hesaplama',
        HC_PLUGIN_URL . 'modules/gun-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-gun-calc">
        <h3>Gün Hesaplama</h3>
        <div class="hc-form-group">
            <label>Hafta Sayısı</label>
            <input type="number" id="hc-g-weeks" value="4">
        </div>
        <div class="hc-form-group">
            <label>Ay Sayısı (30 gün baz alınır)</label>
            <input type="number" id="hc-g-months" value="0">
        </div>
        <button class="hc-btn" onclick="hcGunHesapla()">Güne Çevir</button>
        <div class="hc-result" id="hc-g-result">
            <div class="hc-result-title">Toplam Gün:</div>
            <div class="hc-result-value" id="hc-g-val">-</div>
        </div>
    </div>
    <?php
}
