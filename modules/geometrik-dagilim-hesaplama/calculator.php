<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_geometrik_dagilim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-geometrik-dagilim-hesaplama',
        HC_PLUGIN_URL . 'modules/geometrik-dagilim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-geometrik-dagilim-hesaplama-css',
        HC_PLUGIN_URL . 'modules/geometrik-dagilim-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-geom-dist">
        <h3>Geometrik Dağılım Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-geom-p">Başarı Olasılığı (p):</label>
            <input type="number" id="hc-geom-p" class="hc-input" placeholder="Örn: 0.2" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-geom-k">Deneme Sayısı (k) (İlk başarının olduğu deneme):</label>
            <input type="number" id="hc-geom-k" class="hc-input" placeholder="Örn: 3">
        </div>
        <button class="hc-btn" onclick="hcGeometrikHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-geometrik-dagilim-result">
            <div class="hc-result-grid">
                <div class="hc-result-item">
                    <span>Olasılık P(X = k):</span>
                    <strong id="hc-res-geom-p">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Olasılık P(X ≤ k):</span>
                    <strong id="hc-res-geom-cum">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Ortalama (E[X]):</span>
                    <strong id="hc-res-geom-mean">-</strong>
                </div>
                <div class="hc-result-item">
                    <span>Varyans:</span>
                    <strong id="hc-res-geom-var">-</strong>
                </div>
            </div>
        </div>
    </div>
    <?php
}
