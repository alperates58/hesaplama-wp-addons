<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hba1c_ortalama_kan_sekeri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hba1c-ortalama-kan-sekeri-hesaplama',
        HC_PLUGIN_URL . 'modules/hba1c-ortalama-kan-sekeri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hba1c-ortalama-kan-sekeri-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hba1c-ortalama-kan-sekeri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hba1c-calc">
        <h3>HbA1c ➔ Ortalama Kan Şekeri</h3>
        <div class="hc-form-group">
            <label for="hc-ha-val">HbA1c Değeri (%)</label>
            <input type="number" id="hc-ha-val" placeholder="Örn: 6.5" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcHbA1cHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ha-result">
            <div class="hc-result-label">Tahmini Ortalama Şeker (eAG):</div>
            <div class="hc-result-value" id="hc-ha-res">-</div>
            <p style="font-size:0.85em; color:#666; margin-top:10px;">*Formül: (28.7 * HbA1c) - 46.7</p>
        </div>
    </div>
    <?php
}
