<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yds_puan_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yds-puan-calc',
        HC_PLUGIN_URL . 'modules/yds-puan-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-yds-p-calc">
        <h3>YDS Puan Hesaplama</h3>
        <div class="hc-form-group">
            <label>Doğru Sayısı (0-80)</label>
            <input type="number" id="hc-yds-p-correct" min="0" max="80" placeholder="Örn: 60">
        </div>
        <button class="hc-btn" onclick="hcYdsPHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-yds-p-result">
            <div class="hc-result-title">YDS Puanı:</div>
            <div class="hc-result-value" id="hc-yds-p-val">-</div>
            <div id="hc-yds-p-level" style="font-size: 16px; font-weight: bold; margin-top: 10px;"></div>
        </div>
    </div>
    <?php
}
