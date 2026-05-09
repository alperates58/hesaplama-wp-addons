<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_atis_hareketi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-atis-hareketi-hesaplama',
        HC_PLUGIN_URL . 'modules/atis-hareketi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-atis-hareketi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/atis-hareketi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-atis-hareketi-hesaplama">
        <h3>Eğik Atış Hareketi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ah-v0">İlk Hız (v₀ - m/s)</label>
            <input type="number" id="hc-ah-v0" placeholder="Örn: 50" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ah-angle">Fırlatma Açısı (θ - Derece)</label>
            <input type="number" id="hc-ah-angle" placeholder="Örn: 45" step="any">
        </div>
        <button class="hc-btn" onclick="hcAHHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ah-result">
            <div class="hc-ah-grid">
                <div class="hc-ah-item">
                    <span class="hc-result-label">Uçuş Süresi:</span>
                    <span class="hc-result-value" id="hc-ah-time">-</span>
                </div>
                <div class="hc-ah-item">
                    <span class="hc-result-label">Maksimum Yükseklik:</span>
                    <span class="hc-result-value" id="hc-ah-hmax">-</span>
                </div>
                <div class="hc-ah-item">
                    <span class="hc-result-label">Menzil (Yatay Uzaklık):</span>
                    <span class="hc-result-value" id="hc-ah-range">-</span>
                </div>
            </div>
            <div class="hc-result-note">Hava sürtünmesi ihmal edilmiştir. (g = 9.81 m/s²)</div>
        </div>
    </div>
    <?php
}
