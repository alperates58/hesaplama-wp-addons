<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_doga_yuruyusu_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hiking-time',
        HC_PLUGIN_URL . 'modules/doga-yuruyusu-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hiking-time-css',
        HC_PLUGIN_URL . 'modules/doga-yuruyusu-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hiking-time">
        <h3>Doğa Yürüyüşü Süresi (Naismith Kuralı)</h3>
        <div class="hc-form-group">
            <label for="hc-ht-dist">Mesafe (km):</label>
            <input type="number" id="hc-ht-dist" placeholder="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-ht-elev">Toplam İrtifa Kazancı (Metre):</label>
            <input type="number" id="hc-ht-elev" placeholder="500">
            <small>Yokuş yukarı çıkılan toplam yükseklik.</small>
        </div>
        <button class="hc-btn" onclick="hcHikingTimeHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-hiking-time-result">
            <strong>Tahmini Süre:</strong>
            <div id="hc-ht-res-val" class="hc-result-value">-</div>
            <span>Saat : Dakika</span>
            <p style="margin-top:10px; font-size:0.8rem;">Molalar dahil değildir.</p>
        </div>
    </div>
    <?php
}
