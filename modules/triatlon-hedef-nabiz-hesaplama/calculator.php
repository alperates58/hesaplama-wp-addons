<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_triatlon_hedef_nabiz_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hr-tri',
        HC_PLUGIN_URL . 'modules/triatlon-hedef-nabiz-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hr-tri-css',
        HC_PLUGIN_URL . 'modules/triatlon-hedef-nabiz-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hr-tri">
        <h3>Triatlon Hedef Nabız</h3>
        <div class="hc-form-group">
            <label for="hc-ht-age-tri">Yaşınız:</label>
            <input type="number" id="hc-ht-age-tri" placeholder="30">
        </div>
        <div class="hc-form-group">
            <label for="hc-ht-rest-tri">Dinlenik Nabız:</label>
            <input type="number" id="hc-ht-rest-tri" placeholder="60">
        </div>
        <button class="hc-btn" onclick="hcHrTriHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-hr-tri-result">
            <div class="hc-tri-grid">
                <div class="hc-tri-item">
                    <strong>Yüzme (Z2)</strong>
                    <div id="hc-tri-swim">-</div>
                </div>
                <div class="hc-tri-item">
                    <strong>Bisiklet (Z2-Z3)</strong>
                    <div id="hc-tri-bike">-</div>
                </div>
                <div class="hc-tri-item">
                    <strong>Koşu (Z3-Z4)</strong>
                    <div id="hc-tri-run">-</div>
                </div>
            </div>
            <p style="margin-top:15px; font-size:0.8rem;">Uzun mesafe triatlon (Ironman) yarış temposu hedefleridir.</p>
        </div>
    </div>
    <?php
}
