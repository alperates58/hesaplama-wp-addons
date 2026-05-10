<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yuzde_indirim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pct-disc',
        HC_PLUGIN_URL . 'modules/yuzde-indirim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-pd">
        <h3>Yüzde İndirim Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-pd-price">Etiket Fiyatı (₺):</label>
            <input type="number" id="hc-pd-price" placeholder="1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-pd-pct">İndirim Oranı (%):</label>
            <input type="number" id="hc-pd-pct" placeholder="25">
        </div>
        <button class="hc-btn" onclick="hcPctDiscHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-yuzde-indirim-result">
            <strong>İndirimli Fiyat:</strong>
            <div id="hc-pd-res-val" class="hc-result-value">-</div>
            <p id="hc-pd-save" style="margin-top:10px;"></p>
        </div>
    </div>
    <?php
}
