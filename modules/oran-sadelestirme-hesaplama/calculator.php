<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_oran_sadelestirme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ratio-simp',
        HC_PLUGIN_URL . 'modules/oran-sadelestirme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ratio-simp">
        <h3>Oran Sadeleştirme</h3>
        <div class="hc-form-group">
            <label for="hc-rs-v1">Pay / 1. Değer:</label>
            <input type="number" id="hc-rs-v1" placeholder="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-rs-v2">Payda / 2. Değer:</label>
            <input type="number" id="hc-rs-v2" placeholder="50">
        </div>
        <button class="hc-btn" onclick="hcRatioSimpHesapla()">Sadeleştir</button>
        <div class="hc-result" id="hc-ratio-simp-result">
            <strong>Sadeleşmiş Oran:</strong>
            <div id="hc-rs-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
