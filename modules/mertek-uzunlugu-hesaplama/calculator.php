<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mertek_uzunlugu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rafter-len',
        HC_PLUGIN_URL . 'modules/mertek-uzunlugu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-rafter-len-css',
        HC_PLUGIN_URL . 'modules/mertek-uzunlugu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rafter-len">
        <h3>Mertek Uzunluğu Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-rl-span">Açıklık / Bina Genişliği (m):</label>
            <input type="number" id="hc-rl-span" step="0.1" placeholder="8.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-rl-pitch">Eğim (1:X veya Derece):</label>
            <div style="display:flex; gap:10px;">
                <input type="number" id="hc-rl-pitch-deg" placeholder="30" style="flex:1;">
                <span>Derece</span>
            </div>
        </div>
        <button class="hc-btn" onclick="hcRafterLenHesapla()">Uzunluğu Hesapla</button>
        <div class="hc-result" id="hc-rafter-len-result">
            <strong>Gereken Mertek Boyu:</strong>
            <div id="hc-rl-res-val" class="hc-result-value">-</div>
            <span>Metre (m)</span>
            <p style="margin-top:10px; font-size:0.8rem;">Mahya kalınlığı ve saçak payı hariçtir.</p>
        </div>
    </div>
    <?php
}
