<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_video_kare_hizi_yavas_cekim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-video-kare-hizi-yavas-cekim-hesaplama',
        HC_PLUGIN_URL . 'modules/video-kare-hizi-yavas-cekim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-video-kare-hizi-yavas-cekim-hesaplama-css',
        HC_PLUGIN_URL . 'modules/video-kare-hizi-yavas-cekim-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-video-kare-hizi-yavas-cekim-hesaplama">
        <h3>Video Kare Hızı Yavaş Çekim Hesaplama</h3>

        <div class="hc-form-group">
            <label for="hc-slowmo-record-fps">Çekim Kare Hızı (fps)</label>
            <select id="hc-slowmo-record-fps" class="hc-select">
                <option value="60">60 fps</option>
                <option value="120" selected>120 fps</option>
                <option value="240">240 fps</option>
                <option value="480">480 fps</option>
                <option value="960">960 fps</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-slowmo-playback-fps">Oynatma Kare Hızı (fps)</label>
            <select id="hc-slowmo-playback-fps" class="hc-select">
                <option value="24">24 fps (Film)</option>
                <option value="30" selected>30 fps (Video)</option>
                <option value="60">60 fps</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcVideoKareHiziYavasEkimHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-video-kare-hizi-yavas-cekim-hesaplama-result">
            <div class="hc-result-item">
                <span>Yavaşlama Oranı:</span>
                <strong id="hc-slowmo-ratio-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Hız Yüzdesi:</span>
                <strong id="hc-slowmo-percentage-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Zamansal Uzatma:</span>
                <strong id="hc-slowmo-duration-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>1 Saatlik Çekim Sonucu:</span>
                <strong id="hc-slowmo-1hour-val">-</strong>
            </div>
        </div>
    </div>
    <?php
}
