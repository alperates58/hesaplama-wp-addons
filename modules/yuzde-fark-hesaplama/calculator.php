<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yuzde_fark_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pct-diff',
        HC_PLUGIN_URL . 'modules/yuzde-fark-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-pd">
        <h3>Yüzde Fark Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-pd-s1">1. Sayı:</label>
            <input type="number" id="hc-pd-s1" placeholder="50">
        </div>
        <div class="hc-form-group">
            <label for="hc-pd-s2">2. Sayı:</label>
            <input type="number" id="hc-pd-s2" placeholder="75">
        </div>
        <button class="hc-btn" onclick="hcPctDiffHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-yuzde-fark-result">
            <strong>Yüzde Fark:</strong>
            <div id="hc-pd-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
