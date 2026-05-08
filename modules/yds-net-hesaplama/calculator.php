<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yds_net_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yds-calc',
        HC_PLUGIN_URL . 'modules/yds-net-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-yds-box">
        <h3>YDS Puan Hesaplama</h3>
        <div class="hc-form-group">
            <label>Doğru Sayısı (Maks 80)</label>
            <input type="number" id="hc-yds-correct" max="80" min="0">
        </div>
        <button class="hc-btn" onclick="hcYdsHesapla()">Puanı Hesapla</button>
        <div class="hc-result" id="hc-yds-result">
            <div class="hc-result-title">YDS Puanınız:</div>
            <div class="hc-result-value" id="hc-yds-val">-</div>
            <div id="hc-yds-level" style="font-size: 14px; margin-top: 10px; color: var(--hc-front-muted);"></div>
        </div>
    </div>
    <?php
}
