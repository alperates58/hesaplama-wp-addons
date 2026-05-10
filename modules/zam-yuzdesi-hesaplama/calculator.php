<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_zam_yuzdesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-raise-pct',
        HC_PLUGIN_URL . 'modules/zam-yuzdesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-rp">
        <h3>Zam Yüzdesi Uygulama</h3>
        <div class="hc-form-group">
            <label>Mevcut Fiyat (₺):</label><input type="number" id="hc-rp-val" placeholder="1000">
        </div>
        <div class="hc-form-group">
            <label>Zam Oranı (%):</label><input type="number" id="hc-rp-pct" placeholder="10">
        </div>
        <button class="hc-btn" onclick="hcRaisePctHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-zam-yuzdesi-result">
            <strong>Zamlı Fiyat:</strong>
            <div id="hc-rp-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
