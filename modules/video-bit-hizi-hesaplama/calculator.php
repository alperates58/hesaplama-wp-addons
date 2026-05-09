<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_video_bit_hizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-video-bitrate',
        HC_PLUGIN_URL . 'modules/video-bit-hizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-video-bitrate-css',
        HC_PLUGIN_URL . 'modules/video-bit-hizi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-video-bitrate">
        <h3>Video Bitrate Hesaplayıcı</h3>
        <div class="hc-form-group">
            <label for="hc-vb-res">Çözünürlük</label>
            <select id="hc-vb-res">
                <option value="921600">720p (1280x720)</option>
                <option value="2073600" selected>1080p (1920x1080)</option>
                <option value="8294400">4K (3840x2160)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-vb-fps">Kare Hızı (FPS)</label>
            <input type="number" id="hc-vb-fps" value="30" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-vb-quality">Kalite Faktörü (Bits/Pixel)</label>
            <input type="number" id="hc-vb-quality" value="0.1" step="0.01">
            <small>0.1: Standart, 0.2: Yüksek</small>
        </div>
        <button class="hc-btn" onclick="hcVideoBitrateHesapla()">Bit Hızını Hesapla</button>
        <div class="hc-result" id="hc-video-bitrate-result">
            <div class="hc-result-item">
                <span>Önerilen Bitrate:</span>
                <span class="hc-result-value" id="hc-res-vb-val">0 Mbps</span>
            </div>
            <div class="hc-result-item">
                <span>Saatlik Dosya Boyutu:</span>
                <span id="hc-res-vb-size">0 GB</span>
            </div>
        </div>
    </div>
    <?php
}
