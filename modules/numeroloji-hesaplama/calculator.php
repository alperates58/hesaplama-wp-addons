<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_numeroloji_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-num-full',
        HC_PLUGIN_URL . 'modules/numeroloji-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-num-full-css',
        HC_PLUGIN_URL . 'modules/numeroloji-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-numeroloji-hesaplama">
        <h3>Tam Numeroloji Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-full-name">Tam Adınız</label>
            <input type="text" id="hc-full-name" placeholder="Adınız ve Soyadınız">
        </div>
        <div class="hc-form-group">
            <label for="hc-full-date">Doğum Tarihi</label>
            <input type="date" id="hc-full-date">
        </div>
        <button class="hc-btn" onclick="hcFullNumHesapla()">Analiz Et</button>
        <div class="hc-result" id="hc-numeroloji-result">
            <div class="hc-num-grid">
                <div class="hc-num-item">
                    <span>Yaşam Yolu</span>
                    <div class="hc-num-box" id="hc-val-lp"></div>
                </div>
                <div class="hc-num-item">
                    <span>Kader Sayısı</span>
                    <div class="hc-num-box" id="hc-val-destiny"></div>
                </div>
                <div class="hc-num-item">
                    <span>Ruh Sayısı</span>
                    <div class="hc-num-box" id="hc-val-soul"></div>
                </div>
            </div>
            <hr>
            <div id="hc-full-desc" class="hc-full-desc"></div>
        </div>
    </div>
    <?php
}
