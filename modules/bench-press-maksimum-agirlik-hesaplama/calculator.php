<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bench_press_maksimum_agirlik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bench-press-maksimum-agirlik-hesaplama',
        HC_PLUGIN_URL . 'modules/bench-press-maksimum-agirlik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bench-press-maksimum-agirlik-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bench-press-maksimum-agirlik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bench-1rm">
        <h3>Bench Press Maksimum (1RM) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bench-weight">Kaldırılan Ağırlık (kg)</label>
            <input type="number" id="hc-bench-weight" placeholder="Örn: 100" step="0.5">
        </div>
        <div class="hc-form-group">
            <label for="hc-bench-reps">Tekrar Sayısı</label>
            <input type="number" id="hc-bench-reps" placeholder="Örn: 5" min="1" max="20">
        </div>
        <button class="hc-btn" onclick="hcBenchPressMaksimumAgirlikHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bench-result">
            <div class="hc-result-label">Tahmini Bench Press 1RM:</div>
            <div class="hc-result-value" id="hc-bench-val">-</div>
            <p id="hc-bench-info" style="font-size: 0.85em; color: #666; margin-top: 10px;"></p>
        </div>
    </div>
    <?php
}
