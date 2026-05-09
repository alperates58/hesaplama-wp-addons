<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_uyku_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sleep-time',
        HC_PLUGIN_URL . 'modules/uyku-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sleep-time-css',
        HC_PLUGIN_URL . 'modules/uyku-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sleep-time">
        <h3>İdeal Uyku Hesaplayıcı</h3>
        <div class="hc-form-group">
            <label for="hc-wake-time">Kaçta Uyanmak İstiyorsunuz?</label>
            <input type="time" id="hc-wake-time" value="07:30">
        </div>
        <button class="hc-btn" onclick="hcSleepTimeHesapla()">Yatış Saatlerini Gör</button>
        <div class="hc-result" id="hc-sleep-time-result">
            <p>Dinç uyanmak için şu saatlerde yatmalısınız:</p>
            <div class="hc-sleep-slots" id="hc-res-sleep-slots"></div>
            <p class="hc-note">Hesaplamaya 15 dakikalık uykuya dalma süresi dahil edilmiştir.</p>
        </div>
    </div>
    <?php
}
