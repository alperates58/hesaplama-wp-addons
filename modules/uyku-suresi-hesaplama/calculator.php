<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_uyku_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-uyku-suresi',
        HC_PLUGIN_URL . 'modules/uyku-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-uyku-suresi-css',
        HC_PLUGIN_URL . 'modules/uyku-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-uyku-suresi">
        <h3>Uyku Süresi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-us-bed">Yatış Saati:</label>
            <input type="time" id="hc-us-bed" value="23:00">
        </div>
        <div class="hc-form-group">
            <label for="hc-us-wake">Uyanma Saati:</label>
            <input type="time" id="hc-us-wake" value="07:00">
        </div>
        <button class="hc-btn" onclick="hcUykuSuresiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-uyku-suresi-result">
            <strong>Toplam Uyku Süresi:</strong>
            <div id="hc-us-res-val" class="hc-result-value">-</div>
            <div id="hc-us-res-desc" style="margin-top:10px;"></div>
        </div>
    </div>
    <?php
}
