<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_spearman_sira_korelasyonu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-spearman',
        HC_PLUGIN_URL . 'modules/spearman-sira-korelasyonu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-spearman-css',
        HC_PLUGIN_URL . 'modules/spearman-sira-korelasyonu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-spearman">
        <h3>Spearman Sıra Korelasyonu (ρ)</h3>
        <div class="hc-form-group">
            <label for="hc-sp-x">X Değerleri (Virgül ile)</label>
            <input type="text" id="hc-sp-x" placeholder="Örn: 10, 20, 30, 40">
        </div>
        <div class="hc-form-group">
            <label for="hc-sp-y">Y Değerleri (Virgül ile)</label>
            <input type="text" id="hc-sp-y" placeholder="Örn: 5, 15, 25, 35">
        </div>
        <button class="hc-btn" onclick="hcSpearmanHesapla()">Korelasyonu Hesapla</button>
        <div class="hc-result" id="hc-spearman-result">
            <div class="hc-result-item">
                <span>Spearman ρ:</span>
                <span class="hc-result-value" id="hc-res-sp-val">0</span>
            </div>
            <p id="hc-sp-interpret" class="hc-sp-interpret"></p>
        </div>
    </div>
    <?php
}
