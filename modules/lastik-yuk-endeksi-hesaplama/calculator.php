<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lastik_yuk_endeksi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-load-index',
        HC_PLUGIN_URL . 'modules/lastik-yuk-endeksi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-lye-box">
        <h3>Lastik Yük Endeksi Sorgulama</h3>
        <div class="hc-form-group">
            <label>Yük Endeksi Kodu (örn: 91)</label>
            <input type="number" id="hc-lye-input" placeholder="91">
        </div>
        <button class="hc-btn" onclick="hcLyeSorgula()">Sorgula</button>
        <div class="hc-result" id="hc-lye-result">
            <div class="hc-result-title">Lastik Başına Taşıma Kapasitesi:</div>
            <div class="hc-result-value" id="hc-lye-val">-</div>
            <div id="hc-lye-total" style="margin-top: 10px; font-weight: bold;"></div>
        </div>
    </div>
    <?php
}
