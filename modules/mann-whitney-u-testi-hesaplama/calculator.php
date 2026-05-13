<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mann_whitney_u_testi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mann-whitney-u-testi-hesaplama',
        HC_PLUGIN_URL . 'modules/mann-whitney-u-testi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mann-whitney-u-testi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/mann-whitney-u-testi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mann-whitney-u-testi">
        <h3>Mann Whitney U Testi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-mw-group1">Grup 1 Verileri (Virgül veya boşlukla ayırın):</label>
            <textarea id="hc-mw-group1" class="hc-input" placeholder="Örn: 10, 12, 15, 14"></textarea>
        </div>
        <div class="hc-form-group">
            <label for="hc-mw-group2">Grup 2 Verileri (Virgül veya boşlukla ayırın):</label>
            <textarea id="hc-mw-group2" class="hc-input" placeholder="Örn: 11, 13, 16, 15"></textarea>
        </div>
        <button class="hc-btn" onclick="hcMannWhitneyUHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mann-whitney-u-testi-result">
            <div class="hc-result-grid">
                <div class="hc-result-item">
                    <span>U1 Değeri:</span>
                    <strong id="hc-res-u1">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>U2 Değeri:</span>
                    <strong id="hc-res-u2">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>U İstatistiği:</span>
                    <strong id="hc-res-u-stat">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Z Değeri (Yaklaşık):</span>
                    <strong id="hc-res-z">-</strong>
                </div>
            </div>
            <p id="hc-mw-note" style="margin-top:10px; font-size:0.9em; color:#666;"></p>
        </div>
    </div>
    <?php
}
