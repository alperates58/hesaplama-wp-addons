<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yuzde_95_guven_araligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yuzde-95-guven-araligi-hesaplama',
        HC_PLUGIN_URL . 'modules/yuzde-95-guven-araligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yuzde-95-guven-araligi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/yuzde-95-guven-araligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ci95-calc">
        <h3>%95 Güven Aralığı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ci95-mean">Örneklem Ortalaması (x̄):</label>
            <input type="number" id="hc-ci95-mean" class="hc-input" placeholder="Örn: 100" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ci95-sd">Standart Sapma (σ):</label>
            <input type="number" id="hc-ci95-sd" class="hc-input" placeholder="Örn: 15" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ci95-n">Örneklem Büyüklüğü (n):</label>
            <input type="number" id="hc-ci95-n" class="hc-input" placeholder="Örn: 100">
        </div>
        <button class="hc-btn" onclick="hcCI95Hesapla()">Hesapla</button>
        <div class="hc-result" id="hc-yuzde-95-guven-araligi-hesaplama-result">
            <div class="hc-result-label">%95 Güven Aralığı:</div>
            <div class="hc-result-value" id="hc-res-ci95-val">-</div>
            <p style="margin-top:10px; font-size:0.85em; color:#666;">Z-skoru (95%): 1,96</p>
            <div class="hc-res-details" style="margin-top:10px; font-size:0.9em;">
                Hata Payı (ME): <span id="hc-res-ci95-me">-</span>
            </div>
        </div>
    </div>
    <?php
}
