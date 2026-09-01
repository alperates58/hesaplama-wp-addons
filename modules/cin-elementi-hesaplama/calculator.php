<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cin_elementi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cin-elem',
        HC_PLUGIN_URL . 'modules/cin-elementi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cin-elem-css',
        HC_PLUGIN_URL . 'modules/cin-elementi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cin-elementi-hesaplama">
        <div class="hc-header">
            <h3>Çin Elementi (Wu Xing) & Yin-Yang Hesaplama</h3>
            <p class="hc-subtitle">Doğum tarihinizden 5 temel Çin elementinizi (Ağaç, Ateş, Toprak, Metal, Su), Yin/Yang kutbunuzu ve element döngünüzü keşfedin.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-cine-date">Doğum Tarihiniz *</label>
            <input type="date" id="hc-cine-date" class="hc-input" value="1994-08-18" required>
        </div>

        <button type="button" class="hc-btn" onclick="hcCinElemHesapla()">🌿 Çin Elementimi & Enerjimi Hesapla</button>

        <div class="hc-result" id="hc-cine-result">
            <div class="hc-num-hero" id="hc-cine-hero"></div>

            <div class="hc-num-section">
                <h4 class="hc-num-sec-title">🔄 Wu Xing 5 Element Döngüsü & Uyum Matrisi</h4>
                <div class="hc-elem-matrix" id="hc-cine-matrix"></div>
            </div>

            <div class="hc-num-section">
                <h4 class="hc-num-sec-title">📖 Element Mizaç Rehberi, Renkler & Feng Shui</h4>
                <div class="hc-result-content" id="hc-cine-desc"></div>
            </div>
        </div>
    </div>
    <?php
}
