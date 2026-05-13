<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_aykiri_deger_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-aykiri-deger-hesaplama',
        HC_PLUGIN_URL . 'modules/aykiri-deger-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-aykiri-deger-hesaplama-css',
        HC_PLUGIN_URL . 'modules/aykiri-deger-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-outlier-detect">
        <h3>Aykırı Değer Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-od-data">Veri Seti (Virgül veya boşlukla ayırın):</label>
            <textarea id="hc-od-data" class="hc-input" placeholder="Örn: 10, 12, 11, 13, 10, 100, 2"></textarea>
        </div>
        <button class="hc-btn" onclick="hcOutlierDetectHesapla()">Aykırı Değerleri Bul</button>
        <div class="hc-result" id="hc-aykiri-deger-hesaplama-result">
            <div class="hc-result-grid">
                <div class="hc-result-item">
                    <span>Aykırı Değerler:</span>
                    <strong id="hc-res-od-list">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Aykırı Değer Sayısı:</span>
                    <strong id="hc-res-od-count">-</strong>
                </div>
            </div>
            <div class="hc-info-box" style="margin-top:15px; font-size:0.85em; background:#f9f9f9; padding:10px; border-radius:5px;">
                <strong>Kullanılan Sınırlar:</strong><br>
                Alt Sınır: <span id="hc-res-od-lower">-</span><br>
                Üst Sınır: <span id="hc-res-od-upper">-</span>
            </div>
        </div>
    </div>
    <?php
}
