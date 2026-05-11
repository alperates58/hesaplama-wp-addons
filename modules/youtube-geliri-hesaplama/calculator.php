<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_youtube_geliri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-youtube-geliri',
        HC_PLUGIN_URL . 'modules/youtube-geliri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-youtube-geliri-css',
        HC_PLUGIN_URL . 'modules/youtube-geliri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-youtube">
        <h3>YouTube Geliri Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-yt-views">Tahmini İzlenme Sayısı</label>
            <input type="number" id="hc-yt-views" placeholder="Örn: 1.000.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-yt-rpm">Bin İzlenme Başı Kazanç (RPM ₺)</label>
            <input type="number" id="hc-yt-rpm" placeholder="Örn: 40.00" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-yt-tax">Sosyal Medya İstisna Vergisi Kesilsin mi? (%15)</label>
            <select id="hc-yt-tax">
                <option value="0.15">Evet (%15 Stopaj Kesilsin)</option>
                <option value="0">Hayır (Brüt Kazancı Göster)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcYoutubeGeliriHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-yt-result">
            <div class="hc-result-item">
                <span>Brüt Reklam Geliri:</span>
                <strong id="hc-yt-res-gross">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Net Kazanç:</span>
                <strong class="hc-result-value" id="hc-yt-res-net">-</strong>
            </div>
        </div>
    </div>
    <?php
}
