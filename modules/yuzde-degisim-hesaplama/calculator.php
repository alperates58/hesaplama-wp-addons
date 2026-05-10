<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yuzde_degisim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pct-change',
        HC_PLUGIN_URL . 'modules/yuzde-degisim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-pc">
        <h3>Yüzde Değişim Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-pc-v1">Eski Değer:</label>
            <input type="number" id="hc-pc-v1" placeholder="80">
        </div>
        <div class="hc-form-group">
            <label for="hc-pc-v2">Yeni Değer:</label>
            <input type="number" id="hc-pc-v2" placeholder="100">
        </div>
        <button class="hc-btn" onclick="hcPctChangeHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-yuzde-degisim-result">
            <strong>Değişim Oranı:</strong>
            <div id="hc-pc-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
