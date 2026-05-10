<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_deadlift_maksimum_agirlik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-deadlift-maksimum-agirlik-hesaplama',
        HC_PLUGIN_URL . 'modules/deadlift-maksimum-agirlik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-deadlift-maksimum-agirlik-hesaplama-css',
        HC_PLUGIN_URL . 'modules/deadlift-maksimum-agirlik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-deadlift-1rm">
        <h3>Deadlift Maksimum (1RM) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-deadlift-weight">Kaldırılan Ağırlık (kg)</label>
            <input type="number" id="hc-deadlift-weight" placeholder="Örn: 180" step="0.5">
        </div>
        <div class="hc-form-group">
            <label for="hc-deadlift-reps">Tekrar Sayısı</label>
            <input type="number" id="hc-deadlift-reps" placeholder="Örn: 5" min="1" max="20">
        </div>
        <button class="hc-btn" onclick="hcDeadliftMaksimumAgirlikHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-deadlift-result">
            <div class="hc-result-label">Tahmini Deadlift 1RM:</div>
            <div class="hc-result-value" id="hc-deadlift-val">-</div>
            <p style="font-size: 0.85em; color: #666; margin-top: 10px;">Deadlift'te tutuş gücü ve bel sağlığına dikkat edin.</p>
        </div>
    </div>
    <?php
}
