<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_eyt_emeklilik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-eyt-emeklilik-hesaplama',
        HC_PLUGIN_URL . 'modules/eyt-emeklilik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-eyt-emeklilik-css',
        HC_PLUGIN_URL . 'modules/eyt-emeklilik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-eyt-emeklilik-hesaplama">
        <h3>EYT Emeklilik Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-eyt-gender">Cinsiyet</label>
            <select id="hc-eyt-gender">
                <option value="male">Erkek</option>
                <option value="female">Kadın</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-eyt-start">Sigorta Başlangıç Tarihi</label>
            <input type="date" id="hc-eyt-start" max="1999-09-08">
            <small>EYT için 08.09.1999 öncesi giriş gereklidir.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-eyt-days">Mevcut Prim Gün Sayısı</label>
            <input type="number" id="hc-eyt-days" placeholder="Örn: 5000">
        </div>
        
        <button class="hc-btn" onclick="hcEYTHesapla()">Sorgula</button>
        
        <div class="hc-result" id="hc-eyt-result">
            <div class="hc-result-item">
                <span>EYT Durumu:</span>
                <strong id="hc-eyt-res-status">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Gerekli Prim Gün:</span>
                <strong id="hc-eyt-res-req">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Kalan Prim Gün:</span>
                <strong id="hc-eyt-res-left">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Sigortalılık Süresi:</span>
                <strong id="hc-eyt-res-period">-</strong>
            </div>
            <div class="hc-result-value" id="hc-eyt-res-final">
                -
            </div>
        </div>
    </div>
    <?php
}
