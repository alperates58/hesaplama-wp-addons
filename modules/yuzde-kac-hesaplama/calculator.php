<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yuzde_kac_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pct-what',
        HC_PLUGIN_URL . 'modules/yuzde-kac-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-pw">
        <h3>Yüzde Kaç Hesaplama</h3>
        <div class="hc-form-group">
            <input type="number" id="hc-pw-x" placeholder="15" style="width:80px">
            <span> sayısı, </span>
            <input type="number" id="hc-pw-y" placeholder="60" style="width:80px">
            <span> sayısının yüzde kaçıdır?</span>
        </div>
        <button class="hc-btn" onclick="hcPctWhatHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-yuzde-what-result">
            <strong>Oran:</strong>
            <div id="hc-pw-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
