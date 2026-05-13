<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_populasyon_varyansi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-populasyon-varyansi-hesaplama',
        HC_PLUGIN_URL . 'modules/populasyon-varyansi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-populasyon-varyansi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/populasyon-varyansi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-populasyon-varyansi-hesaplama">
        <h3>Popülasyon Varyansı Hesaplama</h3>
        <p>Verileri virgül, boşluk veya yeni satır ile ayırarak giriniz.</p>
        <div class="hc-form-group">
            <label for="hc-var-data">Veri Seti</label>
            <textarea id="hc-var-data" rows="5" placeholder="10, 20, 30, 40, 50"></textarea>
        </div>
        <button class="hc-btn" onclick="hcVaryansHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-populasyon-varyansi-hesaplama-result">
            <div class="hc-result-grid">
                <div class="hc-res-item">
                    <span class="hc-label">Varyans (σ²):</span>
                    <span class="hc-value" id="hc-res-variance">-</span>
                </div>
                <div class="hc-res-item">
                    <span class="hc-label">Standart Sapma (σ):</span>
                    <span class="hc-value" id="hc-res-std-dev">-</span>
                </div>
                <div class="hc-res-item">
                    <span class="hc-label">Ortalama (μ):</span>
                    <span class="hc-value" id="hc-res-mean">-</span>
                </div>
                <div class="hc-res-item">
                    <span class="hc-label">Eleman Sayısı (N):</span>
                    <span class="hc-value" id="hc-res-n">-</span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
