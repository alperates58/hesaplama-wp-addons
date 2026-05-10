<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yuzde_azalis_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pct-dec',
        HC_PLUGIN_URL . 'modules/yuzde-azalis-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-pd">
        <h3>Yüzde Azalış Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-pd-val">Mevcut Değer:</label>
            <input type="number" id="hc-pd-val" placeholder="1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-pd-pct">Azalış Oranı (%):</label>
            <input type="number" id="hc-pd-pct" placeholder="20">
        </div>
        <button class="hc-btn" onclick="hcPctDecHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-yuzde-azalis-result">
            <strong>Yeni Değer:</strong>
            <div id="hc-pd-res-val" class="hc-result-value">-</div>
            <p id="hc-pd-diff" style="margin-top:10px;"></p>
        </div>
    </div>
    <?php
}
