<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yuzde_puan_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yuzde-puan-hesaplama',
        HC_PLUGIN_URL . 'modules/yuzde-puan-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yuzde-puan-hesaplama-css',
        HC_PLUGIN_URL . 'modules/yuzde-puan-hesaplama/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yuzde-puan-hesaplama">
        <div class="hc-header">
            <h3>Yüzde Puan Hesaplama</h3>
            <p>Aldığınız puanı ve toplam puanı girerek başarı yüzdenizi görün.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>Alınan Puan</label>
                <input type="number" id="hc-score-got" placeholder="Örn: 85" step="any">
            </div>
            <div class="hc-form-group">
                <label>Toplam Puan</label>
                <input type="number" id="hc-score-total" placeholder="Örn: 100" step="any">
            </div>
        </div>

        <button class="hc-btn" onclick="hcPuanHesapla()">Puanı Hesapla</button>

        <div class="hc-result" id="hc-puan-result">
            <div class="hc-res-circle">
                <svg viewBox="0 0 36 36" class="hc-circular-chart">
                    <path class="hc-circle-bg" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                    <path class="hc-circle" id="hc-res-circle-path" stroke-dasharray="0, 100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" />
                    <text x="18" y="20.35" class="hc-percentage" id="hc-res-puan-val">0%</text>
                </svg>
            </div>
            <div class="hc-res-info" id="hc-puan-info"></div>
        </div>
    </div>
    <?php
}
