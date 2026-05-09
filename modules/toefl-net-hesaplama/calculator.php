<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_toefl_net_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-toefl-calc',
        HC_PLUGIN_URL . 'modules/toefl-net-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-toefl-calc-box">
        <h3>TOEFL iBT Skor Hesaplama</h3>
        <div class="hc-form-group">
            <label>Reading (0-30)</label>
            <input type="number" id="hc-toefl-r" max="30" min="0">
        </div>
        <div class="hc-form-group">
            <label>Listening (0-30)</label>
            <input type="number" id="hc-toefl-l" max="30" min="0">
        </div>
        <div class="hc-form-group">
            <label>Speaking (0-30)</label>
            <input type="number" id="hc-toefl-s" max="30" min="0">
        </div>
        <div class="hc-form-group">
            <label>Writing (0-30)</label>
            <input type="number" id="hc-toefl-w" max="30" min="0">
        </div>
        <button class="hc-btn" onclick="hcToeflHesapla()">Skoru Hesapla</button>
        <div class="hc-result" id="hc-toefl-result">
            <div class="hc-result-title">Toplam Skor:</div>
            <div class="hc-result-value" id="hc-toefl-val">-</div>
        </div>
    </div>
    <?php
}
