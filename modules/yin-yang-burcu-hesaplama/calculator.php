<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yin_yang_burcu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yin-yang-zod',
        HC_PLUGIN_URL . 'modules/yin-yang-burcu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-yin-yang-calc">
        <h3>Yin Yang Burcu Hesaplama</h3>
        <div class="hc-form-group">
            <label>Doğum Yılınız</label>
            <input type="number" id="hc-yy-year" placeholder="Örn: 1991" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcYinYangHesapla()">Enerjini Öğren</button>
        <div class="hc-result" id="hc-yin-yang-burcu-result">
            <div class="hc-result-header">Burcunuzun Enerjisi: <span id="hc-yy-value" class="hc-result-value"></span></div>
            <div id="hc-yy-desc" class="hc-result-content"></div>
        </div>
    </div>
    <?php
}
