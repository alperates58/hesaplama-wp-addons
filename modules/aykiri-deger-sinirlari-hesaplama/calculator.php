<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_aykiri_deger_sinirlari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-aykiri-deger-sinirlari-hesaplama',
        HC_PLUGIN_URL . 'modules/aykiri-deger-sinirlari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-aykiri-deger-sinirlari-hesaplama-css',
        HC_PLUGIN_URL . 'modules/aykiri-deger-sinirlari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-outlier-bounds">
        <h3>Aykırı Değer Sınırları Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ob-data">Veri Seti (Virgül veya boşlukla ayırın):</label>
            <textarea id="hc-ob-data" class="hc-input" placeholder="Örn: 10, 15, 20, 25, 100"></textarea>
        </div>
        <button class="hc-btn" onclick="hcOutlierBoundsHesapla()">Sınırları Hesapla</button>
        <div class="hc-result" id="hc-aykiri-deger-sinirlari-hesaplama-result">
            <div class="hc-result-grid">
                <div class="hc-result-item">
                    <span>Alt Sınır:</span>
                    <strong id="hc-res-ob-lower">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Üst Sınır:</span>
                    <strong id="hc-res-ob-upper">-</strong>
                </div>
                <div class="hc-result-item" style="grid-column: span 2;">
                    <span>Çeyrekler Açıklığı (IQR):</span>
                    <strong id="hc-res-ob-iqr">-</strong>
                </div>
            </div>
            <p style="margin-top:10px; font-size:0.85em; color:#666;">Formül: [Q1 - 1.5*IQR, Q3 + 1.5*IQR]</p>
        </div>
    </div>
    <?php
}
