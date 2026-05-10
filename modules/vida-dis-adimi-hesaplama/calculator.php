<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vida_dis_adimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-thread-pitch',
        HC_PLUGIN_URL . 'modules/vida-dis-adimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-thread-pitch-css',
        HC_PLUGIN_URL . 'modules/vida-dis-adimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pitch">
        <h3>Vida Diş Adımı Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-tp-len">Dişli Kısmın Boyu (mm):</label>
            <input type="number" id="hc-tp-len" placeholder="20">
        </div>
        <div class="hc-form-group">
            <label for="hc-tp-count">Toplam Diş Sayısı:</label>
            <input type="number" id="hc-tp-count" placeholder="10">
        </div>
        <button class="hc-btn" onclick="hcThreadPitchHesapla()">Adımı Hesapla</button>
        <div class="hc-result" id="hc-pitch-result">
            <strong>Diş Adımı (Pitch):</strong>
            <div id="hc-tp-res-val" class="hc-result-value">-</div>
            <span>Milimetre (mm)</span>
        </div>
    </div>
    <?php
}
