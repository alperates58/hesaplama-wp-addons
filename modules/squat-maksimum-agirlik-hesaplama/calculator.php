<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_squat_maksimum_agirlik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-squat-maksimum-agirlik-hesaplama',
        HC_PLUGIN_URL . 'modules/squat-maksimum-agirlik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-squat-maksimum-agirlik-hesaplama-css',
        HC_PLUGIN_URL . 'modules/squat-maksimum-agirlik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-squat-1rm">
        <h3>Squat Maksimum (1RM) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-squat-weight">Kaldırılan Ağırlık (kg)</label>
            <input type="number" id="hc-squat-weight" placeholder="Örn: 140" step="0.5">
        </div>
        <div class="hc-form-group">
            <label for="hc-squat-reps">Tekrar Sayısı</label>
            <input type="number" id="hc-squat-reps" placeholder="Örn: 5" min="1" max="20">
        </div>
        <button class="hc-btn" onclick="hcSquatMaksimumAgirlikHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-squat-result">
            <div class="hc-result-label">Tahmini Squat 1RM:</div>
            <div class="hc-result-value" id="hc-squat-val">-</div>
            <p style="font-size: 0.85em; color: #666; margin-top: 10px;">Squat sırasında formunuzu koruduğunuzdan emin olun.</p>
        </div>
    </div>
    <?php
}
