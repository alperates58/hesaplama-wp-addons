<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kan_sekeri_donusumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-glucose-conv',
        HC_PLUGIN_URL . 'modules/kan-sekeri-donusumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-glucose-conv">
        <h3>Kan Şekeri Birim Dönüştürücü</h3>
        
        <div class="hc-form-group">
            <label for="hc-gc-mgdl">mg/dL (Miligram/Desilitre)</label>
            <input type="number" id="hc-gc-mgdl" placeholder="Örn: 100" oninput="hcGlucoseConvert('mgdl')">
        </div>

        <div style="text-align: center; margin: 10px 0; font-size: 1.2em;">⇅</div>

        <div class="hc-form-group">
            <label for="hc-gc-mmoll">mmol/L (Milimol/Litre)</label>
            <input type="number" id="hc-gc-mmoll" step="0.1" placeholder="Örn: 5.5" oninput="hcGlucoseConvert('mmoll')">
        </div>

        <div class="hc-result" id="hc-glucose-conv-result">
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *Dönüşüm Katsayısı: 1 mmol/L = 18.01 mg/dL. Kan şekeri takibinde birimler arası geçiş için kullanılır.
            </p>
        </div>
    </div>
    <?php
}
