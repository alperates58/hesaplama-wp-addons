<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_okuma_hizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-reading-speed',
        HC_PLUGIN_URL . 'modules/okuma-hizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-reading-speed-css',
        HC_PLUGIN_URL . 'modules/okuma-hizi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-reading-speed">
        <h3>Okuma Hızı Testi</h3>
        <div class="hc-form-group">
            <label for="hc-rs-words">Okunan Kelime Sayısı</label>
            <input type="number" id="hc-rs-words" value="500" min="1">
        </div>
        <div class="hc-form-group">
            <label>Okuma Süresi</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-rs-min" placeholder="Dakika" value="2" min="0">
                <input type="number" id="hc-rs-sec" placeholder="Saniye" value="0" min="0" max="59">
            </div>
        </div>
        <button class="hc-btn" onclick="hcReadingSpeedHesapla()">Hızı Hesapla</button>
        <div class="hc-result" id="hc-reading-speed-result">
            <div class="hc-result-item">
                <span>Okuma Hızınız:</span>
                <span class="hc-result-value" id="hc-res-rs-wpm">0 WPM</span>
            </div>
            <p id="hc-res-rs-desc" class="hc-rs-desc"></p>
        </div>
    </div>
    <?php
}
