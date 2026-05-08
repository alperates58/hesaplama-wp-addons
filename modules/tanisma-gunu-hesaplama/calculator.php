<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tanisma_gunu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tanisma-hesaplama',
        HC_PLUGIN_URL . 'modules/tanisma-gunu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-tanisma-hesaplama-wrapper">
        <h3>Tanışma Günü Hesaplama</h3>
        <div class="hc-form-group">
            <label>Tanışma Tarihi</label>
            <input type="date" id="hc-tg-date">
        </div>
        <button class="hc-btn" onclick="hcTanismaHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-tg-result">
            <div class="hc-form-group">
                <label>Tanışmanızdan Bu Yana:</label>
                <div class="hc-result-value" id="hc-tg-val" style="font-size: 24px;">-</div>
            </div>
            <div id="hc-tg-details" style="font-size: 14px; margin-top: 10px;"></div>
        </div>
    </div>
    <?php
}
