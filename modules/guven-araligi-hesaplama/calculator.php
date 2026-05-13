<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_guven_araligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-guven-araligi-hesaplama',
        HC_PLUGIN_URL . 'modules/guven-araligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-guven-araligi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/guven-araligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-conf-interval">
        <h3>Güven Aralığı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ci-mean">Örneklem Ortalaması (x̄):</label>
            <input type="number" id="hc-ci-mean" class="hc-input" placeholder="Örn: 100" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ci-std">Standart Sapma (σ):</label>
            <input type="number" id="hc-ci-std" class="hc-input" placeholder="Örn: 15" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ci-n">Örneklem Boyutu (n):</label>
            <input type="number" id="hc-ci-n" class="hc-input" placeholder="Örn: 50">
        </div>
        <div class="hc-form-group">
            <label for="hc-ci-level">Güven Düzeyi:</label>
            <select id="hc-ci-level" class="hc-input">
                <option value="1.645">%90 (Z=1.645)</option>
                <option value="1.96" selected>%95 (Z=1.96)</option>
                <option value="2.576">%99 (Z=2.576)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcConfidenceIntervalHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-guven-araligi-result">
            <div class="hc-result-label">Güven Aralığı:</div>
            <div class="hc-result-value" id="hc-res-ci-range" style="font-size: 1.8rem;">-</div>
            <div class="hc-result-grid" style="margin-top: 15px;">
                <div class="hc-result-item">
                    <span>Alt Sınır:</span>
                    <strong id="hc-res-ci-lower">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Üst Sınır:</span>
                    <strong id="hc-res-ci-upper">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Hata Payı (E):</span>
                    <strong id="hc-res-ci-margin">-</strong>
                </div>
            </div>
        </div>
    </div>
    <?php
}
