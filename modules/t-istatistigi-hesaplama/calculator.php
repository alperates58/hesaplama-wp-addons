<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_t_istatistigi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-t-stat',
        HC_PLUGIN_URL . 'modules/t-istatistigi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-t-stat-css',
        HC_PLUGIN_URL . 'modules/t-istatistigi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-t-stat">
        <h3>T-İstatistiği Hesapla</h3>
        <div class="hc-form-group">
            <label for="hc-ts-mean">Örneklem Ortalaması (x̄)</label>
            <input type="number" id="hc-ts-mean" value="10.5" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-ts-mu">Popülasyon Ortalaması (μ)</label>
            <input type="number" id="hc-ts-mu" value="10.0" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-ts-std">Örneklem Standart Sapması (s)</label>
            <input type="number" id="hc-ts-std" value="1.2" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-ts-n">Örneklem Boyutu (n)</label>
            <input type="number" id="hc-ts-n" value="25" min="2">
        </div>
        <button class="hc-btn" onclick="hcTStatHesapla()">T-İstatistiğini Gör</button>
        <div class="hc-result" id="hc-t-stat-result">
            <div class="hc-result-item">
                <span>T-İstatistiği:</span>
                <span class="hc-result-value" id="hc-res-ts-val">0</span>
            </div>
            <div class="hc-result-item">
                <span>Serbestlik Derecesi (df):</span>
                <span id="hc-res-ts-df">0</span>
            </div>
        </div>
    </div>
    <?php
}
