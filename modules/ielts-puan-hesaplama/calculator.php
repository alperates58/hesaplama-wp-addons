<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ielts_puan_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ielts-p-calc',
        HC_PLUGIN_URL . 'modules/ielts-puan-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ielts-p-calc">
        <h3>IELTS Puan Hesaplama</h3>
        <div class="hc-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
            <div class="hc-form-group"><label>Reading (0-9)</label><input type="number" step="0.5" class="hc-ielts-p-score" placeholder="Band"></div>
            <div class="hc-form-group"><label>Listening (0-9)</label><input type="number" step="0.5" class="hc-ielts-p-score" placeholder="Band"></div>
            <div class="hc-form-group"><label>Speaking (0-9)</label><input type="number" step="0.5" class="hc-ielts-p-score" placeholder="Band"></div>
            <div class="hc-form-group"><label>Writing (0-9)</label><input type="number" step="0.5" class="hc-ielts-p-score" placeholder="Band"></div>
        </div>
        <button class="hc-btn" onclick="hcIeltsPHesapla()">Genel Band Skorunu Hesapla</button>
        <div class="hc-result" id="hc-ielts-p-result">
            <div class="hc-result-title">Overall Band Score:</div>
            <div class="hc-result-value" id="hc-ielts-p-val">-</div>
        </div>
    </div>
    <?php
}
