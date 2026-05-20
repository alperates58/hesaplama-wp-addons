<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_video_bitrate_kalite_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-video-bitrate-kalite-hesaplama',
        HC_PLUGIN_URL . 'modules/video-bitrate-kalite-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-video-bitrate-kalite-hesaplama-css',
        HC_PLUGIN_URL . 'modules/video-bitrate-kalite-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-video-bitrate-kalite-hesaplama">
        <h3>Video Bitrate Kalite Hesaplama</h3>

        <div class="hc-form-group">
            <label for="hc-bitrate-resolution">Çözünürlük</label>
            <select id="hc-bitrate-resolution" class="hc-select">
                <option value="480">480p (SD)</option>
                <option value="720">720p (HD)</option>
                <option value="1080" selected>1080p (Full HD)</option>
                <option value="1440">1440p (QHD)</option>
                <option value="2160">2160p (4K)</option>
                <option value="4320">4320p (8K)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-bitrate-fps">Kare Hızı (fps)</label>
            <select id="hc-bitrate-fps" class="hc-select">
                <option value="24">24p (Film)</option>
                <option value="30" selected>30p (Video)</option>
                <option value="60">60p (Smooth)</option>
                <option value="120">120p (Slow-mo)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-bitrate-quality">Hedef Kalite</label>
            <select id="hc-bitrate-quality" class="hc-select">
                <option value="web">Web (Düşük Kalite)</option>
                <option value="streaming" selected>Streaming (Orta)</option>
                <option value="archive">Arşiv (Yüksek)</option>
                <option value="cinema">Sinema (Maksimum)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcVideoBitrateKaliteHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-video-bitrate-kalite-hesaplama-result">
            <div class="hc-result-item">
                <span>Önerilen Bitrate:</span>
                <strong id="hc-bitrate-recommended-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Bitrate Aralığı:</span>
                <strong id="hc-bitrate-range-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>1 Saat Dosya Boyutu:</span>
                <strong id="hc-bitrate-1h-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Kalite Derecesi:</span>
                <strong id="hc-bitrate-grade-val">-</strong>
            </div>
        </div>
    </div>
    <?php
}
