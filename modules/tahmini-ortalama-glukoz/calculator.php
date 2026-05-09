<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tahmini_ortalama_glukoz( $atts ) {
    wp_enqueue_script(
        'hc-eag-calc',
        HC_PLUGIN_URL . 'modules/tahmini-ortalama-glukoz/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-eag-calc-box">
        <h3>Tahmini Ortalama Glukoz (eAG) ve HbA1c</h3>
        
        <div class="hc-form-group">
            <label for="hc-eag-input">Ortalama Kan Şekeri (mg/dL)</label>
            <input type="number" id="hc-eag-input" placeholder="Örn: 154" oninput="hcEAGConvert('eag')">
        </div>

        <div style="text-align: center; margin: 10px 0; font-size: 1.2em;">⇅</div>

        <div class="hc-form-group">
            <label for="hc-hba1c-input">HbA1c Seviyesi (%)</label>
            <input type="number" id="hc-hba1c-input" step="0.1" placeholder="Örn: 7.0" oninput="hcEAGConvert('hba1c')">
        </div>

        <div class="hc-result" id="hc-eag-calc-result">
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *Bu araç, günlük kan şekeri ölçümlerinizin ortalamasını HbA1c değerine (veya tersine) dönüştürmenize yardımcı olur.
            </p>
        </div>
    </div>
    <?php
}
