<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_time_lapse_cekim_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-time-lapse-cekim-suresi-hesaplama',
        HC_PLUGIN_URL . 'modules/time-lapse-cekim-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-time-lapse-cekim-suresi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/time-lapse-cekim-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-time-lapse-cekim-suresi-hesaplama">
        <h3>Time Lapse Çekim Süresi Hesaplama</h3>

        <div class="hc-form-group">
            <label for="hc-timelapse-mode">Hesaplama Modu</label>
            <select id="hc-timelapse-mode" class="hc-select" onchange="hcTimelapsModDegis()">
                <option value="capture-to-video" selected>Çekim Süresinden Video Uzunluğu</option>
                <option value="video-to-capture">Video Uzunluğundan Çekim Süresi</option>
                <option value="interval">Interval Belirleme</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-timelapse-capture-group">
            <label for="hc-timelapse-capture-hours">Çekim Süresi (saat)</label>
            <input type="number" id="hc-timelapse-capture-hours" class="hc-input" placeholder="Örn: 1" value="1" min="0.1" step="0.1">
        </div>

        <div class="hc-form-group" id="hc-timelapse-video-group" style="display: none;">
            <label for="hc-timelapse-video-seconds">İstenilen Video Uzunluğu (saniye)</label>
            <input type="number" id="hc-timelapse-video-seconds" class="hc-input" placeholder="Örn: 30" value="30" min="1" step="1">
        </div>

        <div class="hc-form-group" id="hc-timelapse-interval-group" style="display: none;">
            <label for="hc-timelapse-interval">Interval (saniye)</label>
            <input type="number" id="hc-timelapse-interval" class="hc-input" placeholder="Örn: 2" value="2" min="0.5" step="0.5">
        </div>

        <div class="hc-form-group">
            <label for="hc-timelapse-fps">Video Kare Hızı (fps)</label>
            <select id="hc-timelapse-fps" class="hc-select">
                <option value="24">24 fps (Film)</option>
                <option value="30" selected>30 fps (Video)</option>
                <option value="60">60 fps</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcTimeLapseCekimSuresiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-time-lapse-cekim-suresi-hesaplama-result">
            <div class="hc-result-item">
                <span id="hc-timelapse-result-label1">Video Uzunluğu:</span>
                <strong id="hc-timelapse-result-val1">-</strong>
            </div>
            <div class="hc-result-item">
                <span id="hc-timelapse-result-label2">Toplam Kare Sayısı:</span>
                <strong id="hc-timelapse-result-val2">-</strong>
            </div>
            <div class="hc-result-item">
                <span id="hc-timelapse-result-label3">Interval:</span>
                <strong id="hc-timelapse-result-val3">-</strong>
            </div>
        </div>
    </div>
    <?php
}
