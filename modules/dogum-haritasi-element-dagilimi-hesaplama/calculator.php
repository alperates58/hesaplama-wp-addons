<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogum_haritasi_element_dagilimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-element-dagilimi',
        HC_PLUGIN_URL . 'modules/dogum-haritasi-element-dagilimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-element-dagilimi-css',
        HC_PLUGIN_URL . 'modules/dogum-haritasi-element-dagilimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-element-dagilimi">
        <h3>Doğum Haritası Element Dağılımı</h3>
        <div class="hc-form-group">
            <label>Doğum Tarihiniz</label>
            <input type="date" id="hc-elem-date" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcElementDagilimiHesapla()">Elementleri Analiz Et</button>
        <div class="hc-result" id="hc-element-dagilimi-result">
            <div class="hc-element-bars" id="hc-element-bars">
                <!-- Bar grafikleri -->
            </div>
            <div id="hc-element-desc" class="hc-element-desc">
                <!-- Yorum -->
            </div>
        </div>
    </div>
    <?php
}
