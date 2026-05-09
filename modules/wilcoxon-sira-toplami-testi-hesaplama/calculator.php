<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_wilcoxon_sira_toplami_testi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-wilcoxon',
        HC_PLUGIN_URL . 'modules/wilcoxon-sira-toplami-testi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-wilcoxon-css',
        HC_PLUGIN_URL . 'modules/wilcoxon-sira-toplami-testi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-wilcoxon">
        <h3>Wilcoxon Sıra Toplamı (Mann-Whitney U)</h3>
        <div class="hc-form-group">
            <label for="hc-ws-g1">Grup 1 Verileri (Virgül ile ayırın)</label>
            <input type="text" id="hc-ws-g1" placeholder="Örn: 12, 15, 11, 14">
        </div>
        <div class="hc-form-group">
            <label for="hc-ws-g2">Grup 2 Verileri (Virgül ile ayırın)</label>
            <input type="text" id="hc-ws-g2" placeholder="Örn: 18, 20, 17, 19">
        </div>
        <button class="hc-btn" onclick="hcWilcoxonHesapla()">Testi Çalıştır</button>
        <div class="hc-result" id="hc-wilcoxon-result">
            <div class="hc-result-item"> <span>Mann-Whitney U:</span> <b id="hc-res-ws-u">0</b> </div>
            <div class="hc-result-item"> <span>Z-Değeri:</span> <b id="hc-res-ws-z">0</b> </div>
            <p id="hc-ws-note" class="hc-ws-note"></p>
        </div>
    </div>
    <?php
}
