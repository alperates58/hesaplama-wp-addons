<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hba1c_donusum_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hba1c-unit-conv',
        HC_PLUGIN_URL . 'modules/hba1c-donusum-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-hba1c-units">
        <h3>HbA1c Birim Dönüştürücü</h3>
        
        <div class="hc-form-group">
            <label for="hc-hu-percent">HbA1c (%) - NGSP</label>
            <input type="number" id="hc-hu-percent" step="0.1" placeholder="Örn: 7.0" oninput="hcHbA1cUnitConvert('percent')">
        </div>

        <div style="text-align: center; margin: 10px 0; font-size: 1.2em;">⇅</div>

        <div class="hc-form-group">
            <label for="hc-hu-mmol">HbA1c (mmol/mol) - IFCC</label>
            <input type="number" id="hc-hu-mmol" placeholder="Örn: 53" oninput="hcHbA1cUnitConvert('mmol')">
        </div>

        <div class="hc-result" id="hc-hba1c-units-result">
            <div class="hc-result-item">
                <span>Tahmini Ortalama Şeker:</span>
                <strong id="hc-hu-eag">-</strong>
            </div>
        </div>
    </div>
    <?php
}
