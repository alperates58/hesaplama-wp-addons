<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tiklama_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tiklama-orani',
        HC_PLUGIN_URL . 'modules/tiklama-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tiklama-orani-css',
        HC_PLUGIN_URL . 'modules/tiklama-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tiklama-orani-calc">
        <h3>Tıklama Oranı (CTR) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-to-clicks">Toplam Tıklama Sayısı</label>
            <input type="number" id="hc-to-clicks" placeholder="Örn: 1.500">
        </div>
        <div class="hc-form-group">
            <label for="hc-to-impressions">Toplam Gösterim Sayısı</label>
            <input type="number" id="hc-to-impressions" placeholder="Örn: 100.000">
        </div>
        <button class="hc-btn" onclick="hcTiklamaOraniHesapla()">CTR Hesapla</button>
        <div class="hc-result" id="hc-to-result">
            <div class="hc-result-item">
                <span>CTR (Tıklama Oranı):</span>
                <strong class="hc-result-value" id="hc-to-value">-</strong>
            </div>
            <p id="hc-to-comment" class="hc-small-text"></p>
        </div>
    </div>
    <?php
}
