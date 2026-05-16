<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cin_burcu_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cin-burcu-uyumu',
        HC_PLUGIN_URL . 'modules/cin-burcu-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cin-burcu-uyumu-css',
        HC_PLUGIN_URL . 'modules/cin-burcu-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cin-burcu-uyumu">
        <h3>Çin Burcu Uyumu Hesaplama</h3>
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>1. Kişi Doğum Yılı</label>
                <input type="number" id="hc-c1-year" class="hc-input" placeholder="Örn: 1990" min="1900" max="2100">
            </div>
            <div class="hc-form-group">
                <label>2. Kişi Doğum Yılı</label>
                <input type="number" id="hc-c2-year" class="hc-input" placeholder="Örn: 1992" min="1900" max="2100">
            </div>
        </div>
        <button class="hc-btn" onclick="hcCinBurcuUyumuHesapla()">Uyum Analizi Yap</button>
        <div class="hc-result" id="hc-cin-burcu-uyumu-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Zodyak Uyumu</span>
                <div class="hc-result-value" id="hc-cin-uyum-score">-</div>
            </div>
            <div class="hc-cin-details" id="hc-cin-details">
                <!-- Detaylar -->
            </div>
        </div>
    </div>
    <?php
}
