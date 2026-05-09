<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_podcast_dinleme_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-podcast-time',
        HC_PLUGIN_URL . 'modules/podcast-dinleme-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-podcast-time-css',
        HC_PLUGIN_URL . 'modules/podcast-dinleme-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-podcast-time">
        <h3>Podcast Süre Hesapla</h3>
        <div class="hc-form-group">
            <label for="hc-pod-count">Bölüm Sayısı</label>
            <input type="number" id="hc-pod-count" value="10" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-pod-avg">Ortalama Süre (Dakika)</label>
            <input type="number" id="hc-pod-avg" value="45" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-pod-speed">Oynatma Hızı</label>
            <input type="number" id="hc-pod-speed" value="1.5" step="0.1" min="1" max="3">
        </div>
        <button class="hc-btn" onclick="hcPodcastTimeHesapla()">Süreyi Hesapla</button>
        <div class="hc-result" id="hc-podcast-time-result">
            <div class="hc-result-item">
                <span>Toplam Dinleme:</span>
                <span class="hc-result-value" id="hc-res-pod-total">-</span>
            </div>
            <div class="hc-result-item">
                <span>Zaman Kazancı:</span>
                <span id="hc-res-pod-saved" style="color: #27ae60; font-weight: bold;">-</span>
            </div>
        </div>
    </div>
    <?php
}
