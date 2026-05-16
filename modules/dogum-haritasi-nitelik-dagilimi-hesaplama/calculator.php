<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogum_haritasi_nitelik_dagilimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-nitelik-dagilimi',
        HC_PLUGIN_URL . 'modules/dogum-haritasi-nitelik-dagilimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-nitelik-dagilimi-css',
        HC_PLUGIN_URL . 'modules/dogum-haritasi-nitelik-dagilimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-nitelik-dagilimi">
        <h3>Doğum Haritası Nitelik Dağılımı</h3>
        <div class="hc-form-group">
            <label>Doğum Tarihiniz</label>
            <input type="date" id="hc-nit-date" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcNitelikDagilimiHesapla()">Nitelikleri Analiz Et</button>
        <div class="hc-result" id="hc-nitelik-dagilimi-result">
            <div class="hc-nit-bars" id="hc-nit-bars">
                <!-- Bar grafikleri -->
            </div>
            <div id="hc-nit-desc" class="hc-nit-desc">
                <!-- Yorum -->
            </div>
        </div>
    </div>
    <?php
}
