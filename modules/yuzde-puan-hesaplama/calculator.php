<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yuzde_puan_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pct-point',
        HC_PLUGIN_URL . 'modules/yuzde-puan-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-pp">
        <h3>Yüzde Puan Hesaplama</h3>
        <div class="hc-form-group">
            <label>1. Yüzde (%):</label><input type="number" id="hc-pp-p1" placeholder="10">
        </div>
        <div class="hc-form-group">
            <label>2. Yüzde (%):</label><input type="number" id="hc-pp-p2" placeholder="15">
        </div>
        <button class="hc-btn" onclick="hcPctPointHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-yuzde-puan-result">
            <strong>Yüzde Puan Farkı:</strong>
            <div id="hc-pp-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
