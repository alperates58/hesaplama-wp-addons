<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tek_tekrar_maksimum_agirlik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tek-tekrar-maksimum-agirlik-hesaplama',
        HC_PLUGIN_URL . 'modules/tek-tekrar-maksimum-agirlik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tek-tekrar-maksimum-agirlik-hesaplama-css',
        HC_PLUGIN_URL . 'modules/tek-tekrar-maksimum-agirlik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-1rm">
        <h3>Tek Tekrar Maksimum (1RM) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-1rm-weight">Kaldırılan Ağırlık (kg)</label>
            <input type="number" id="hc-1rm-weight" placeholder="Örn: 80" step="0.5">
        </div>
        <div class="hc-form-group">
            <label for="hc-1rm-reps">Tekrar Sayısı</label>
            <input type="number" id="hc-1rm-reps" placeholder="Örn: 5" min="1" max="30">
        </div>
        <button class="hc-btn" onclick="hcTekTekrarMaksimumAgirlikHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-1rm-result">
            <div class="hc-result-label">Tahmini 1RM Değeriniz:</div>
            <div class="hc-result-value" id="hc-1rm-val">-</div>
            <div id="hc-1rm-levels" style="margin-top: 15px; font-size: 0.9em; line-height: 1.6;"></div>
        </div>
    </div>
    <?php
}
