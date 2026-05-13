<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kareler_toplami_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kareler-toplami-hesaplama',
        HC_PLUGIN_URL . 'modules/kareler-toplami-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kareler-toplami-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kareler-toplami-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kareler-toplami">
        <h3>Kareler Toplamı (Sum of Squares) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ss-data">Veri Seti (Virgül veya boşlukla ayırın):</label>
            <textarea id="hc-ss-data" class="hc-input" placeholder="Örn: 2, 4, 6, 8, 10"></textarea>
        </div>
        <button class="hc-btn" onclick="hcKarelerToplamiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kareler-toplami-result">
            <div class="hc-result-grid">
                <div class="hc-result-item">
                    <span>Ortalama (x̄):</span>
                    <strong id="hc-res-ss-mean">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Kareler Toplamı (SS):</span>
                    <strong id="hc-res-ss-val">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Varyans (Örneklem):</span>
                    <strong id="hc-res-ss-var">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Standart Sapma:</span>
                    <strong id="hc-res-ss-std">-</strong>
                </div>
            </div>
        </div>
    </div>
    <?php
}
