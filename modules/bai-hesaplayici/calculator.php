<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bai_hesaplayici( $atts ) {
    wp_enqueue_script(
        'hc-bai-hesaplayici',
        HC_PLUGIN_URL . 'modules/bai-hesaplayici/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bai-hesaplayici-css',
        HC_PLUGIN_URL . 'modules/bai-hesaplayici/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bai-hesaplayici">
        <div class="hc-header">
            <h3>BAI (Vücut Yağlanma İndeksi)</h3>
            <p>Sadece boy ve kalça ölçümü kullanarak yağ oranınızı tahmin edin.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>Boy (cm)</label>
                <input type="number" id="hc-bai-boy" placeholder="175">
            </div>
            <div class="hc-form-group">
                <label>Kalça Çevresi (cm)</label>
                <input type="number" id="hc-bai-kalca" placeholder="100">
            </div>
        </div>

        <button class="hc-btn" onclick="hcBaiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-bai-result">
            <div class="hc-res-box">
                <div class="hc-res-label">BAI SKORU</div>
                <div class="hc-res-main">
                    %<span id="hc-res-bai-val">0</span>
                </div>
                <div class="hc-res-info" id="hc-res-bai-info"></div>
            </div>
        </div>
    </div>
    <?php
}
