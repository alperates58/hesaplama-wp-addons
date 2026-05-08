<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lise_ortalama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lise-ortalama',
        HC_PLUGIN_URL . 'modules/lise-ortalama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-lise-ort-calc">
        <h3>Lise Mezuniyet Ortalaması Hesaplama</h3>
        <div class="hc-form-group">
            <label>9. Sınıf Ortalaması</label>
            <input type="number" step="0.01" class="hc-lo-grade" placeholder="0-100">
        </div>
        <div class="hc-form-group">
            <label>10. Sınıf Ortalaması</label>
            <input type="number" step="0.01" class="hc-lo-grade" placeholder="0-100">
        </div>
        <div class="hc-form-group">
            <label>11. Sınıf Ortalaması</label>
            <input type="number" step="0.01" class="hc-lo-grade" placeholder="0-100">
        </div>
        <div class="hc-form-group">
            <label>12. Sınıf Ortalaması</label>
            <input type="number" step="0.01" class="hc-lo-grade" placeholder="0-100">
        </div>
        <button class="hc-btn" onclick="hcLiseOrtHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-lo-result">
            <div class="hc-result-title">Lise Mezuniyet Puanı:</div>
            <div class="hc-result-value" id="hc-lo-val">-</div>
        </div>
    </div>
    <?php
}
