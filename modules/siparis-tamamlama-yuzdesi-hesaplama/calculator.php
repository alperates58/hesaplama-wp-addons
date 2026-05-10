<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_siparis_tamamlama_yuzdesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-order-pct',
        HC_PLUGIN_URL . 'modules/siparis-tamamlama-yuzdesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-order-pct">
        <h3>Sipariş Tamamlama Yüzdesi</h3>
        <div class="hc-form-group">
            <label for="hc-op-done">Tamamlanan Sipariş Sayısı:</label>
            <input type="number" id="hc-op-done" placeholder="85">
        </div>
        <div class="hc-form-group">
            <label for="hc-op-total">Toplam Sipariş Sayısı:</label>
            <input type="number" id="hc-op-total" placeholder="100">
        </div>
        <button class="hc-btn" onclick="hcOrderPctHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-siparis-tamamlama-result">
            <strong>Tamamlanma Oranı:</strong>
            <div id="hc-op-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
