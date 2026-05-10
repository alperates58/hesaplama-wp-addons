<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_zaman_yuzdesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-time-pct',
        HC_PLUGIN_URL . 'modules/zaman-yuzdesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-tp">
        <h3>Zaman Yüzdesi Hesaplama</h3>
        <div class="hc-form-group">
            <label>Geçen Süre (Dakika/Saat):</label><input type="number" id="hc-tp-elapsed" placeholder="30">
        </div>
        <div class="hc-form-group">
            <label>Toplam Süre (Dakika/Saat):</label><input type="number" id="hc-tp-total" placeholder="60">
        </div>
        <button class="hc-btn" onclick="hcTimePctHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-zaman-yuzdesi-result">
            <strong>Geçen Zaman Oranı:</strong>
            <div id="hc-tp-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
