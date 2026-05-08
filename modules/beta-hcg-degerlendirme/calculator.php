<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_beta_hcg_degerlendirme( $atts ) {
    wp_enqueue_script(
        'hc-hcg-eval',
        HC_PLUGIN_URL . 'modules/beta-hcg-degerlendirme/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-hcg-box">
        <h3>Beta hCG Değer Analizi</h3>
        
        <div class="hc-form-group">
            <label for="hc-be-val">Beta hCG Değeri (mIU/mL)</label>
            <input type="number" id="hc-be-val" placeholder="Örn: 500">
        </div>

        <button class="hc-btn" onclick="hcHCGEvalHesapla()">Analiz Et</button>

        <div class="hc-result" id="hc-hcg-eval-result">
            <div class="hc-result-item">
                <span>Tahmini Gebelik Haftası:</span>
                <div class="hc-result-value" id="hc-be-week">-</div>
            </div>
            <div id="hc-be-desc" style="margin-top: 15px; font-size: 0.9em; line-height: 1.5;">
                <!-- Analiz -->
            </div>
        </div>
    </div>
    <?php
}
