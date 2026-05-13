<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bonferroni_duzeltmesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bonferroni-duzeltmesi-hesaplama',
        HC_PLUGIN_URL . 'modules/bonferroni-duzeltmesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bonferroni-duzeltmesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bonferroni-duzeltmesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bonferroni">
        <h3>Bonferroni Düzeltmesi</h3>
        <div class="hc-form-group">
            <label for="hc-bonf-alpha">Hedef Anlamlılık Düzeyi (α):</label>
            <input type="number" id="hc-bonf-alpha" class="hc-input" value="0.05" step="0.001">
        </div>
        <div class="hc-form-group">
            <label for="hc-bonf-n">Test/Karşılaştırma Sayısı (n):</label>
            <input type="number" id="hc-bonf-n" class="hc-input" placeholder="Örn: 5">
        </div>
        <button class="hc-btn" onclick="hcBonferroniHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bonferroni-duzeltmesi-hesaplama-result">
            <div class="hc-result-label">Düzeltilmiş Alfa (α_adj):</div>
            <div class="hc-result-value" id="hc-res-bonf-val">-</div>
            <p style="margin-top:10px; font-size:0.9em;">Her bir test için kullanılması gereken yeni p-değeri eşiği budur.</p>
        </div>
    </div>
    <?php
}
