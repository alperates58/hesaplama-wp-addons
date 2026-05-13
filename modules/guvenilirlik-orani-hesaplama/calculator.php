<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_guvenilirlik_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-guvenilirlik-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/guvenilirlik-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-guvenilirlik-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/guvenilirlik-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-reliability">
        <h3>Güvenilirlik Oranı (Reliability) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-rel-mtbf">MTBF - Arızalar Arası Ortalama Süre (Saat):</label>
            <input type="number" id="hc-rel-mtbf" class="hc-input" placeholder="Örn: 10000">
        </div>
        <div class="hc-form-group">
            <label for="hc-rel-time">Çalışma Süresi (Saat):</label>
            <input type="number" id="hc-rel-time" class="hc-input" placeholder="Örn: 1000">
        </div>
        <button class="hc-btn" onclick="hcReliabilityHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-guvenilirlik-orani-result">
            <div class="hc-result-label">Güvenilirlik R(t):</div>
            <div class="hc-result-value" id="hc-res-rel-ratio">-</div>
            <p id="hc-rel-desc" style="margin-top:10px; font-size:0.9em;"></p>
            <p style="margin-top:5px; font-size:0.8em; color:#666;">Formül: R(t) = e^(-t / MTBF)</p>
        </div>
    </div>
    <?php
}
