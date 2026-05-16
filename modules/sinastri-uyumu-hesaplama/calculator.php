<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sinastri_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sinastri-uyumu',
        HC_PLUGIN_URL . 'modules/sinastri-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sinastri-uyumu-css',
        HC_PLUGIN_URL . 'modules/sinastri-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sinastri-uyumu">
        <h3>Sinastri Uyumu Hesaplama</h3>
        <div class="hc-form-grid">
            <div class="hc-person-section">
                <h4>1. Kişi</h4>
                <div class="hc-form-group">
                    <label>Doğum Tarihi</label>
                    <input type="date" id="hc-s1-birthdate" class="hc-input">
                </div>
            </div>
            <div class="hc-person-section">
                <h4>2. Kişi</h4>
                <div class="hc-form-group">
                    <label>Doğum Tarihi</label>
                    <input type="date" id="hc-s2-birthdate" class="hc-input">
                </div>
            </div>
        </div>
        <button class="hc-btn" onclick="hcSinastriUyumuHesapla()">Sinastri Analizi Yap</button>
        <div class="hc-result" id="hc-sinastri-uyumu-result">
            <div class="hc-result-header">
                <span class="hc-result-label">İlişki Potansiyeli</span>
                <div class="hc-result-value" id="hc-sinastri-score">-</div>
            </div>
            <div class="hc-sinastri-aspects" id="hc-sinastri-aspects">
                <!-- Açılar buraya -->
            </div>
        </div>
    </div>
    <?php
}
