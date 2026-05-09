<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pozitif_gebelik_testi_degerlendirme( $atts ) {
    wp_enqueue_script(
        'hc-positive-eval',
        HC_PLUGIN_URL . 'modules/pozitif-gebelik-testi-degerlendirme/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-pos-box">
        <h3>Pozitif Gebelik Testi Sonrası Yol Haritası</h3>
        
        <div class="hc-form-group">
            <label for="hc-pe-hcg">Beta hCG Değeriniz (Varsa - mIU/mL)</label>
            <input type="number" id="hc-pe-hcg" placeholder="Örn: 500">
        </div>

        <div class="hc-form-group">
            <label for="hc-pe-lmp">Son Adet Tarihi (SAT)</label>
            <input type="date" id="hc-pe-lmp">
        </div>

        <button class="hc-btn" onclick="hcPozitifDegerlendir()">Değerlendir</button>

        <div class="hc-result" id="hc-pos-eval-result">
            <div id="hc-pe-summary" style="margin-bottom: 15px; font-weight: bold;">
                <!-- Özet -->
            </div>
            <div id="hc-pe-steps" style="font-size: 0.9em; line-height: 1.6;">
                <!-- Adımlar -->
            </div>
        </div>
    </div>
    <?php
}
