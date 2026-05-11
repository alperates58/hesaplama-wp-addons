<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_oksijen_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-vo2',
        HC_PLUGIN_URL . 'modules/oksijen-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-vo2">
        <h3>Oksijen Tüketimi (VO<sub>2</sub>) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-vo2-weight">Vücut Ağırlığı (kg)</label>
            <input type="number" id="hc-vo2-weight" placeholder="kg" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-vo2-met">Aktivite Yoğunluğu (MET)</label>
            <input type="number" id="hc-vo2-met" placeholder="MET" step="0.1" value="3.5">
            <small>Dinlenme: 1.0, Yürüyüş: 3.5, Koşu: 10.0</small>
        </div>

        <button class="hc-btn" onclick="hcVo2Hesapla()">Tüketimi Hesapla</button>

        <div class="hc-result" id="hc-vo2-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Dakikalık Oksijen Tüketimi:</span>
                <span class="hc-result-value" id="hc-vo2-res-total">--</span>
                <span class="hc-result-unit">ml/dk</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Litre / Saat:</span>
                <span id="hc-vo2-res-lh">--</span>
                <span class="hc-result-unit">L/saat</span>
            </div>
        </div>
    </div>
    <?php
}
