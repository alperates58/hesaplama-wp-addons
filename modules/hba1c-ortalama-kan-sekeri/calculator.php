<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hba1c_ortalama_kan_sekeri( $atts ) {
    wp_enqueue_script(
        'hc-hba1c-eag',
        HC_PLUGIN_URL . 'modules/hba1c-ortalama-kan-sekeri/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-hba1c-eag">
        <h3>HbA1c - Tahmini Ortalama Glukoz (eAG)</h3>
        
        <div class="hc-form-group">
            <label for="hc-he-hba1c">HbA1c Seviyesi (%)</label>
            <input type="number" id="hc-he-hba1c" step="0.1" placeholder="Örn: 7.0">
        </div>

        <button class="hc-btn" onclick="hcHbA1cHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-hba1c-eag-result">
            <div class="hc-result-item">
                <span>Tahmini Ortalama Glukoz (eAG):</span>
                <div class="hc-result-value" id="hc-he-value">-</div>
            </div>
            <p id="hc-he-interp" style="margin-top: 10px; font-weight: bold;"></p>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *eAG (Estimated Average Glucose), HbA1c değerinin mg/dL cinsinden karşılığıdır. ADA (Amerikan Diyabet Cemiyeti) formülü kullanılmıştır.
            </p>
        </div>
    </div>
    <?php
}
