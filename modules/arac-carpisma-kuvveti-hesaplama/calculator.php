<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_arac_carpisma_kuvveti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-arac-carpisma-kuvveti-hesaplama',
        HC_PLUGIN_URL . 'modules/arac-carpisma-kuvveti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-arac-carpisma-kuvveti-hesaplama-css',
        HC_PLUGIN_URL . 'modules/arac-carpisma-kuvveti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-arac-carpisma-kuvveti-hesaplama">
        <h3>Araç Çarpışma Kuvveti Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ack-mass">Araç Kütlesi (kg)</label>
            <input type="number" id="hc-ack-mass" placeholder="Örn: 1500" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ack-speed">Çarpışma Hızı (km/h)</label>
            <input type="number" id="hc-ack-speed" placeholder="Örn: 50" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ack-dist">Durma/Ezilme Mesafesi (cm)</label>
            <input type="number" id="hc-ack-dist" placeholder="Örn: 50" step="any">
        </div>
        <button class="hc-btn" onclick="hcACKHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ack-result">
            <div class="hc-result-label">Ortalama Çarpışma Kuvveti:</div>
            <div class="hc-result-value" id="hc-ack-val">-</div>
            <div class="hc-result-note">F = (0.5 * m * v²) / d</div>
        </div>
    </div>
    <?php
}
