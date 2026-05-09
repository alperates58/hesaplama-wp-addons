<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kreatinin_egfr_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-egfr',
        HC_PLUGIN_URL . 'modules/kreatinin-egfr-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-egfr-box">
        <h3>eGFR (Böbrek Süzme Hızı) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-egfr-sex">Cinsiyet</label>
            <select id="hc-egfr-sex">
                <option value="male">Erkek</option>
                <option value="female">Kadın</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-egfr-age">Yaş</label>
            <input type="number" id="hc-egfr-age" placeholder="Yaş">
        </div>

        <div class="hc-form-group">
            <label for="hc-egfr-scr">Serum Kreatinin (mg/dL)</label>
            <input type="number" id="hc-egfr-scr" step="0.01" placeholder="Örn: 1.1">
        </div>

        <button class="hc-btn" onclick="hcEGFRHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-egfr-result">
            <div class="hc-result-item">
                <span>eGFR Değeri:</span>
                <div class="hc-result-value" id="hc-egfr-value">-</div>
            </div>
            <div id="hc-egfr-stage" style="margin-top: 15px; padding: 10px; border-radius: 5px; text-align: center; font-weight: bold;">
                <!-- Evre -->
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *CKD-EPI 2021 denklemi kullanılmıştır. Birim: mL/dk/1.73m².
            </p>
        </div>
    </div>
    <?php
}
