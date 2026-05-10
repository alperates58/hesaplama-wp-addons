<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yuzde_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pct-gen',
        HC_PLUGIN_URL . 'modules/yuzde-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-pct">
        <h3>Yüzde Hesaplama</h3>
        <div class="hc-form-group">
            <input type="number" id="hc-pg-x" placeholder="X" style="display:inline-block; width:80px;">
            <span> sayısı, </span>
            <input type="number" id="hc-pg-y" placeholder="Y" style="display:inline-block; width:80px;">
            <span> sayısının yüzde kaçıdır?</span>
        </div>
        <button class="hc-btn" onclick="hcPctGenHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-yuzde-gen-result">
            <strong>Sonuç:</strong>
            <div id="hc-pg-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
