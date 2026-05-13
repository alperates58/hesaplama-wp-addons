<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_binom_dagilimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-binom-dagilimi-hesaplama',
        HC_PLUGIN_URL . 'modules/binom-dagilimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-binom-dagilimi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/binom-dagilimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-binom-calc">
        <h3>Binom Dağılımı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-binom-n">Deneme Sayısı (n):</label>
            <input type="number" id="hc-binom-n" class="hc-input" placeholder="Örn: 10">
        </div>
        <div class="hc-form-group">
            <label for="hc-binom-k">Başarı Sayısı (k):</label>
            <input type="number" id="hc-binom-k" class="hc-input" placeholder="Örn: 3">
        </div>
        <div class="hc-form-group">
            <label for="hc-binom-p">Başarı Olasılığı (p) (0-1 arası):</label>
            <input type="number" id="hc-binom-p" class="hc-input" placeholder="Örn: 0.5" step="0.01">
        </div>
        <button class="hc-btn" onclick="hcBinomHesapla()">Olasılık Hesapla</button>
        <div class="hc-result" id="hc-binom-dagilimi-hesaplama-result">
            <div class="hc-result-grid">
                <div class="hc-result-item">
                    <span>Tam Olasılık P(X = k):</span>
                    <strong id="hc-res-binom-p-val">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Birikimli P(X ≤ k):</span>
                    <strong id="hc-res-binom-cum-val">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Beklenen Değer (E[X]):</span>
                    <strong id="hc-res-binom-mean">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Varyans (Var[X]):</span>
                    <strong id="hc-res-binom-var">-</strong>
                </div>
            </div>
        </div>
    </div>
    <?php
}
