<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_youtube_vergi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-youtube-vergi-hesaplama',
        HC_PLUGIN_URL . 'modules/youtube-vergi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-youtube-vergi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/youtube-vergi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-youtube-vergi-hesaplama">
        <h3>YouTube Vergi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-yt-income">Yıllık Toplam YouTube Geliri (TL)</label>
            <input type="number" id="hc-yt-income" placeholder="Örn: 250000">
            <small>AdSense ve Sponsorluk dahil brüt kazanç.</small>
        </div>
        
        <button class="hc-btn" onclick="hcYoutubeVergiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-youtube-result">
            <div class="hc-result-item">
                <span>Vergi Rejimi:</span>
                <strong id="hc-yt-status">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Banka Kesintisi (%15):</span>
                <strong id="hc-yt-stopaj">-</strong>
            </div>
            <div class="hc-result-item" id="hc-yt-extra-tax-row" style="display:none;">
                <span>Ek Vergi Yükü:</span>
                <strong id="hc-yt-extra-tax">-</strong>
            </div>
            <div class="hc-result-value" id="hc-yt-net">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Net Kazanç (Vergi Sonrası)</p>
        </div>
    </div>
    <?php
}
