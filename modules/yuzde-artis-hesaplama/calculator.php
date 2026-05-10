<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yuzde_artis_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pct-inc',
        HC_PLUGIN_URL . 'modules/yuzde-artis-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-pi">
        <h3>Yüzde Artış Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-pi-val">Mevcut Değer:</label>
            <input type="number" id="hc-pi-val" placeholder="1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-pi-pct">Artış Oranı (%):</label>
            <input type="number" id="hc-pi-pct" placeholder="20">
        </div>
        <button class="hc-btn" onclick="hcPctIncHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-yuzde-artis-result">
            <strong>Yeni Değer:</strong>
            <div id="hc-pi-res-val" class="hc-result-value">-</div>
            <p id="hc-pi-diff" style="margin-top:10px;"></p>
        </div>
    </div>
    <?php
}
