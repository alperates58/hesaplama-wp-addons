<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ielts_band_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ielts-calc',
        HC_PLUGIN_URL . 'modules/ielts-band-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ielts-calc-box">
        <h3>IELTS Band Skor Hesaplama</h3>
        <div class="hc-form-group">
            <label>Listening (0-9)</label>
            <input type="number" id="hc-ielts-l" step="0.5" max="9" min="0">
        </div>
        <div class="hc-form-group">
            <label>Reading (0-9)</label>
            <input type="number" id="hc-ielts-r" step="0.5" max="9" min="0">
        </div>
        <div class="hc-form-group">
            <label>Writing (0-9)</label>
            <input type="number" id="hc-ielts-w" step="0.5" max="9" min="0">
        </div>
        <div class="hc-form-group">
            <label>Speaking (0-9)</label>
            <input type="number" id="hc-ielts-s" step="0.5" max="9" min="0">
        </div>
        <button class="hc-btn" onclick="hcIeltsHesapla()">Band Skoru Hesapla</button>
        <div class="hc-result" id="hc-ielts-result">
            <div class="hc-result-title">Genel Band Skoru:</div>
            <div class="hc-result-value" id="hc-ielts-val">-</div>
        </div>
    </div>
    <?php
}
