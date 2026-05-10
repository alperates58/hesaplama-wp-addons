<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kosucular_icin_vo2_max_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-vo2max-runner',
        HC_PLUGIN_URL . 'modules/kosucular-icin-vo2-max-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-vo2max-runner-css',
        HC_PLUGIN_URL . 'modules/kosucular-icin-vo2-max-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-vo2max-runner">
        <h3>VO₂ Max Tahmini (Cooper Testi)</h3>
        <div class="hc-form-group">
            <label for="hc-vo-dist">12 Dakikada Koşulan Mesafe (Metre):</label>
            <input type="number" id="hc-vo-dist" placeholder="2400">
        </div>
        <button class="hc-btn" onclick="hcVo2MaxRunnerHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-vo2max-runner-result">
            <strong>Tahmini VO₂ Max:</strong>
            <div id="hc-vo-res-val" class="hc-result-value">-</div>
            <span>ml / kg / dk</span>
            <p id="hc-vo-res-desc" style="margin-top:15px; font-weight:bold;"></p>
        </div>
    </div>
    <?php
}
