<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_nps_skoru_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-nps-skoru-hesaplama',
        HC_PLUGIN_URL . 'modules/nps-skoru-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-nps-skoru-hesaplama-css',
        HC_PLUGIN_URL . 'modules/nps-skoru-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-nps-skoru-hesaplama">
        <h3>NPS Skoru Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-nps-p">Destekçiler (9-10 Puan Verenler)</label>
            <input type="number" id="hc-nps-p" min="0" placeholder="Sayı">
        </div>
        <div class="hc-form-group">
            <label for="hc-nps-pass">Pasifler (7-8 Puan Verenler)</label>
            <input type="number" id="hc-nps-pass" min="0" placeholder="Sayı">
        </div>
        <div class="hc-form-group">
            <label for="hc-nps-d">Kötüleyenler (0-6 Puan Verenler)</label>
            <input type="number" id="hc-nps-d" min="0" placeholder="Sayı">
        </div>
        <button class="hc-btn" onclick="hcNpsHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-nps-skoru-hesaplama-result">
            <span class="hc-label">NPS Skoru:</span>
            <div class="hc-result-value" id="hc-nps-res-val">0</div>
            <div class="hc-nps-bar">
                <div id="hc-nps-indicator" class="hc-nps-indicator"></div>
            </div>
            <div id="hc-nps-interpretation" style="margin-top:15px; font-weight:bold;"></div>
        </div>
    </div>
    <?php
}
