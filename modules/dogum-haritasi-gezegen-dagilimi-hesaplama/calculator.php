<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogum_haritasi_gezegen_dagilimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gezegen-dagilimi',
        HC_PLUGIN_URL . 'modules/dogum-haritasi-gezegen-dagilimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gezegen-dagilimi-css',
        HC_PLUGIN_URL . 'modules/dogum-haritasi-gezegen-dagilimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gezegen-dagilimi">
        <h3>Doğum Haritası Gezegen Dağılımı</h3>
        <div class="hc-form-group">
            <label>Doğum Tarihiniz</label>
            <input type="date" id="hc-gez-date" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcGezegenDagilimiHesapla()">Dağılımı Analiz Et</button>
        <div class="hc-result" id="hc-gezegen-dagilimi-result">
            <div class="hc-dist-chart" id="hc-dist-chart">
                <!-- Dağılım özeti -->
            </div>
            <div id="hc-dist-desc" class="hc-dist-desc">
                <!-- Yorum -->
            </div>
        </div>
    </div>
    <?php
}
