<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_video_dosya_boyutu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-video-dosya-boyutu-hesaplama',
        HC_PLUGIN_URL . 'modules/video-dosya-boyutu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-video-dosya-boyutu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/video-dosya-boyutu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-video-dosya-boyutu-hesaplama">
        <h3>Video Dosya Boyutu Hesaplama</h3>

        <div class="hc-form-group">
            <label for="hc-video-resolution">Çözünürlük</label>
            <select id="hc-video-resolution" class="hc-select">
                <option value="4">480p (SD)</option>
                <option value="6.5">720p (HD)</option>
                <option value="20" selected>1080p (Full HD)</option>
                <option value="50">2K</option>
                <option value="100">4K</option>
                <option value="300">8K</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-video-bitrate">Bitrate (Mbps)</label>
            <input type="number" id="hc-video-bitrate" class="hc-input" placeholder="Örn: 25" value="25" min="1" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-video-duration-min">Süre (dakika)</label>
            <input type="number" id="hc-video-duration-min" class="hc-input" placeholder="Örn: 60" value="60" min="1" step="1">
        </div>

        <button class="hc-btn" onclick="hcVideoDosyaBoyutuHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-video-dosya-boyutu-hesaplama-result">
            <div class="hc-result-item">
                <span>Dosya Boyutu (MB):</span>
                <strong id="hc-video-size-mb-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Dosya Boyutu (GB):</span>
                <strong id="hc-video-size-gb-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Dakika Başına Boyut:</span>
                <strong id="hc-video-size-per-min-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>1 Saat Çekim:</span>
                <strong id="hc-video-size-1h-val">-</strong>
            </div>
        </div>
    </div>
    <?php
}
