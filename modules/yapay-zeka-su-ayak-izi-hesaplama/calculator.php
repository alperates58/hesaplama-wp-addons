<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yapay_zeka_su_ayak_izi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yapay-zeka-su-ayak-izi-hesaplama',
        HC_PLUGIN_URL . 'modules/yapay-zeka-su-ayak-izi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yapay-zeka-su-ayak-izi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/yapay-zeka-su-ayak-izi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ai-water">
        <h3>AI Su Ayak İzi</h3>
        <div class="hc-form-group">
            <label for="hc-ai-prompts">Haftalık Soru (Prompt) Sayısı</label>
            <input type="number" id="hc-ai-prompts" placeholder="Örn: 50">
        </div>
        <button class="hc-btn" onclick="hcYapayZekaSuAyakİziHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ai-result">
            <div class="hc-result-label">Yıllık Su Tüketimi:</div>
            <div class="hc-result-value" id="hc-ai-val">-</div>
            <p id="hc-ai-info" style="margin-top:10px; font-size:0.85em; color:#666;"></p>
        </div>
    </div>
    <?php
}
