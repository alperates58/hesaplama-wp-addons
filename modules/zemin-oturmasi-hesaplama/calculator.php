<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_zemin_oturmasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-soil-settlement',
        HC_PLUGIN_URL . 'modules/zemin-oturmasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-soil-settlement-css',
        HC_PLUGIN_URL . 'modules/zemin-oturmasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-soil-settlement">
        <h3>Zemin Oturması (Konsolidasyon)</h3>
        <div class="hc-form-group">
            <label for="hc-ss-h">Tabaka Kalınlığı (H) [m]</label>
            <input type="number" id="hc-ss-h" value="5" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-ss-cc">Sıkışma İndeksi (Cc)</label>
            <input type="number" id="hc-ss-cc" value="0.3" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-ss-e0">Başlangıç Boşluk Oranı (e0)</label>
            <input type="number" id="hc-ss-e0" value="0.8" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-ss-p0">Başlangıç Gerilmesi (σ'0) [kPa]</label>
            <input type="number" id="hc-ss-p0" value="100" step="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-ss-dp">Gerilme Artışı (Δσ) [kPa]</label>
            <input type="number" id="hc-ss-dp" value="50" step="1">
        </div>
        <button class="hc-btn" onclick="hcSoilSettlementHesapla()">Oturmayı Hesapla</button>
        <div class="hc-result" id="hc-soil-settlement-result">
            <div class="hc-result-item">
                <span>Toplam Oturma:</span>
                <span class="hc-result-value" id="hc-res-ss-val">0 cm</span>
            </div>
            <p class="hc-ss-note">ΔH = H * [Cc / (1 + e0)] * log10[(σ'0 + Δσ) / σ'0]</p>
        </div>
    </div>
    <?php
}
