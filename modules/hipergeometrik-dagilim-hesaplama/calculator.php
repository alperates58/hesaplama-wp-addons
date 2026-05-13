<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hipergeometrik_dagilim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hipergeometrik-dagilim-hesaplama',
        HC_PLUGIN_URL . 'modules/hipergeometrik-dagilim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hipergeometrik-dagilim-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hipergeometrik-dagilim-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hipergeometrik">
        <h3>Hipergeometrik Dağılım Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-hg-N">Popülasyon Boyutu (N):</label>
            <input type="number" id="hc-hg-N" class="hc-input" placeholder="Örn: 50">
        </div>
        <div class="hc-form-group">
            <label for="hc-hg-K">Popülasyondaki Başarı Sayısı (K):</label>
            <input type="number" id="hc-hg-K" class="hc-input" placeholder="Örn: 10">
        </div>
        <div class="hc-form-group">
            <label for="hc-hg-n">Örneklem Boyutu (n):</label>
            <input type="number" id="hc-hg-n" class="hc-input" placeholder="Örn: 5">
        </div>
        <div class="hc-form-group">
            <label for="hc-hg-k">Örneklemdeki Başarı Sayısı (k):</label>
            <input type="number" id="hc-hg-k" class="hc-input" placeholder="Örn: 2">
        </div>
        <button class="hc-btn" onclick="hcHipergeometrikHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-hipergeometrik-result">
            <div class="hc-result-grid">
                <div class="hc-result-item">
                    <span>Olasılık P(X = k):</span>
                    <strong id="hc-res-hg-p">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Ortalama (E[X]):</span>
                    <strong id="hc-res-hg-mean">-</strong>
                </div>
            </div>
        </div>
    </div>
    <?php
}
