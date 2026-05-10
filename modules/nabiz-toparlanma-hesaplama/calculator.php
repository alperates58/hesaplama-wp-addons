<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_nabiz_toparlanma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hr-recovery',
        HC_PLUGIN_URL . 'modules/nabiz-toparlanma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hr-recovery-css',
        HC_PLUGIN_URL . 'modules/nabiz-toparlanma-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hr-recovery">
        <h3>Nabız Toparlanma Testi</h3>
        <div class="hc-form-group">
            <label for="hc-rec-peak">Egzersiz Sonu Nabız (Zirve):</label>
            <input type="number" id="hc-rec-peak" placeholder="170">
        </div>
        <div class="hc-form-group">
            <label for="hc-rec-after">1 Dakika Sonraki Nabız:</label>
            <input type="number" id="hc-rec-after" placeholder="140">
        </div>
        <button class="hc-btn" onclick="hcHrRecoveryHesapla()">Analiz Et</button>
        <div class="hc-result" id="hc-hr-recovery-result">
            <strong>Düşüş Miktarı:</strong>
            <div id="hc-rec-res-val" class="hc-result-value">-</div>
            <span>BPM / Dakika</span>
            <p id="hc-rec-res-desc" style="margin-top:15px; font-weight:bold;"></p>
        </div>
    </div>
    <?php
}
