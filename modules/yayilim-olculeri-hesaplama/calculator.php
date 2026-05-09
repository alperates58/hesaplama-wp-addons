<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yayilim_olculeri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dispersion',
        HC_PLUGIN_URL . 'modules/yayilim-olculeri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dispersion-css',
        HC_PLUGIN_URL . 'modules/yayilim-olculeri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dispersion">
        <h3>Yayılım Ölçüleri</h3>
        <div class="hc-form-group">
            <label for="hc-do-data">Veri Seti (Virgül ile ayırın)</label>
            <textarea id="hc-do-data" placeholder="Örn: 10, 20, 30, 40, 50"></textarea>
        </div>
        <button class="hc-btn" onclick="hcDispersionHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dispersion-result">
            <div class="hc-do-grid">
                <div class="hc-do-item"> <span>Açıklık (Range):</span> <b id="hc-res-do-range">0</b> </div>
                <div class="hc-do-item"> <span>Varyans (s²):</span> <b id="hc-res-do-var">0</b> </div>
                <div class="hc-do-item"> <span>Std. Sapma (s):</span> <b id="hc-res-do-std">0</b> </div>
                <div class="hc-do-item"> <span>Değ. Katsayısı:</span> <b id="hc-res-do-cv">%0</b> </div>
            </div>
        </div>
    </div>
    <?php
}
