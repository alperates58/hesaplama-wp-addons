<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_progres_harita_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-progres-harita',
        HC_PLUGIN_URL . 'modules/progres-harita-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-progres-harita-css',
        HC_PLUGIN_URL . 'modules/progres-harita-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-progres-harita">
        <h3>Progres (İlerletilmiş) Harita Hesaplama</h3>
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>Doğum Tarihiniz</label>
                <input type="date" id="hc-prog-birth" class="hc-input">
            </div>
            <div class="hc-form-group">
                <label>Hedef Yıl</label>
                <input type="number" id="hc-prog-year" class="hc-input" value="2026">
            </div>
        </div>
        <button class="hc-btn" onclick="hcProgresHaritaHesapla()">Progres Haritayı Hesapla</button>
        <div class="hc-result" id="hc-progres-harita-result">
            <div id="hc-prog-summary" class="hc-prog-summary">
                <!-- Özet -->
            </div>
            <div id="hc-prog-planets" class="hc-prog-planets">
                <!-- Gezegenler -->
            </div>
        </div>
    </div>
    <?php
}
