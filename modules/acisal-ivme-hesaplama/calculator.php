<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_acisal_ivme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-acisal-ivme-hesaplama',
        HC_PLUGIN_URL . 'modules/acisal-ivme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-acisal-ivme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/acisal-ivme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-acisal-ivme-hesaplama">
        <h3>Açısal İvme Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ai-wi">İlk Açısal Hız (ω₀ - rad/s)</label>
            <input type="number" id="hc-ai-wi" placeholder="Örn: 0" value="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-ai-wf">Son Açısal Hız (ω - rad/s)</label>
            <input type="number" id="hc-ai-wf" placeholder="Örn: 10" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ai-time">Geçen Süre (t - s)</label>
            <input type="number" id="hc-ai-time" placeholder="Örn: 2" step="any">
        </div>
        <button class="hc-btn" onclick="hcAIHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ai-result">
            <div class="hc-result-label">Açısal İvme (α):</div>
            <div class="hc-result-value" id="hc-ai-val">-</div>
            <div class="hc-result-note">α = (ω - ω₀) / t</div>
        </div>
    </div>
    <?php
}
