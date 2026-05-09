<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_talas_kaldirma_hizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mrr',
        HC_PLUGIN_URL . 'modules/talas-kaldirma-hizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mrr-css',
        HC_PLUGIN_URL . 'modules/talas-kaldirma-hizi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mrr">
        <h3>Talaş Kaldırma Hızı (MRR)</h3>
        <div class="hc-form-group">
            <label for="hc-mrr-v">Kesme Hızı (v) [m/dk]</label>
            <input type="number" id="hc-mrr-v" value="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-mrr-f">İlerleme (f) [mm/dev]</label>
            <input type="number" id="hc-mrr-f" value="0.2" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-mrr-d">Kesme Derinliği (d) [mm]</label>
            <input type="number" id="hc-mrr-d" value="1.5" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcMrrHesapla()">Hızı Hesapla</button>
        <div class="hc-result" id="hc-mrr-result">
            <div class="hc-result-item">
                <span>Talaş Kaldırma Hızı (MRR):</span>
                <span class="hc-result-value" id="hc-res-mrr-val">0 cm³/dk</span>
            </div>
            <p class="hc-mrr-note">MRR = v * f * d (Litre/dk cinsinden değil, cm³/dk cinsinden sonuç verilir)</p>
        </div>
    </div>
    <?php
}
