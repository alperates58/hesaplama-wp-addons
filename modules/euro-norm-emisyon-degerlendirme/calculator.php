<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_euro_norm_emisyon_degerlendirme( $atts ) {
    wp_enqueue_script(
        'hc-euro-norm',
        HC_PLUGIN_URL . 'modules/euro-norm-emisyon-degerlendirme/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-en-box">
        <h3>Euro Norm Değerlendirme</h3>
        <div class="hc-form-group">
            <label>Araç Üretim / Tescil Yılı</label>
            <input type="number" id="hc-en-year" value="2024">
        </div>
        <button class="hc-btn" onclick="hcEnHesapla()">Normu Belirle</button>
        <div class="hc-result" id="hc-en-result">
            <div class="hc-result-title">Tahmini Euro Normu:</div>
            <div class="hc-result-value" id="hc-en-val">-</div>
            <div id="hc-en-details" style="margin-top: 10px; font-size: 14px; line-height: 1.5;"></div>
        </div>
    </div>
    <?php
}
