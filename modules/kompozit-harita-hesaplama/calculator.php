<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kompozit_harita_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kompozit-harita',
        HC_PLUGIN_URL . 'modules/kompozit-harita-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kompozit-harita-css',
        HC_PLUGIN_URL . 'modules/kompozit-harita-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kompozit-harita">
        <h3>Kompozit Harita Hesaplama</h3>
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>1. Kişi Doğum Tarihi</label>
                <input type="date" id="hc-comp-d1" class="hc-input">
            </div>
            <div class="hc-form-group">
                <label>2. Kişi Doğum Tarihi</label>
                <input type="date" id="hc-comp-d2" class="hc-input">
            </div>
        </div>
        <button class="hc-btn" onclick="hcKompozitHaritaHesapla()">Kompozit Haritayı Hesapla</button>
        <div class="hc-result" id="hc-kompozit-harita-result">
            <div id="hc-comp-list" class="hc-comp-list">
                <!-- Kompozit gezegenler -->
            </div>
        </div>
    </div>
    <?php
}
