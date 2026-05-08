<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lastik_omru_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tire-life',
        HC_PLUGIN_URL . 'modules/lastik-omru-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-tl-box">
        <h3>Lastik Ömrü Hesaplama</h3>
        <div class="hc-form-group">
            <label>DOT Kodu (HaftaYıl, Örn: 1222)</label>
            <input type="text" id="hc-tl-dot" placeholder="1222">
        </div>
        <button class="hc-btn" onclick="hcTlHesapla()">Kalan Ömrü Hesapla</button>
        <div class="hc-result" id="hc-tl-result">
            <div id="hc-tl-status" style="font-weight: bold; margin-bottom: 10px;"></div>
            <div id="hc-tl-desc"></div>
        </div>
    </div>
    <?php
}
