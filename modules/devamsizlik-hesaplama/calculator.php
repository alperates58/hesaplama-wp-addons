<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_devamsizlik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-devamsizlik',
        HC_PLUGIN_URL . 'modules/devamsizlik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-dev-calc">
        <h3>Devamsızlık Hesaplama</h3>
        <div class="hc-form-group">
            <label>Özürsüz Devamsızlık (Gün)</label>
            <input type="number" step="0.5" id="hc-dev-unexcused" placeholder="Maks 10">
        </div>
        <div class="hc-form-group">
            <label>Özürlü / İzinli Devamsızlık (Gün)</label>
            <input type="number" step="0.5" id="hc-dev-excused" placeholder="Toplam maks 30">
        </div>
        <button class="hc-btn" onclick="hcDevHesapla()">Durumu Kontrol Et</button>
        <div class="hc-result" id="hc-dev-result">
            <div class="hc-form-group">
                <label>Kalan Özürsüz Hak:</label>
                <div class="hc-result-value" id="hc-dev-rem-unexcused" style="font-size: 20px;">-</div>
            </div>
            <div class="hc-form-group">
                <label>Toplam Kalan Hak:</label>
                <div class="hc-result-value" id="hc-dev-rem-total" style="font-size: 20px;">-</div>
            </div>
            <div id="hc-dev-status" style="font-size: 16px; font-weight: bold; margin-top: 10px;"></div>
        </div>
    </div>
    <?php
}
