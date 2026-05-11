<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_reklam_roas_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-reklam-roas',
        HC_PLUGIN_URL . 'modules/reklam-roas-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-reklam-roas-css',
        HC_PLUGIN_URL . 'modules/reklam-roas-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-roas">
        <h3>Reklam ROAS Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-roas-revenue">Toplam Reklam Geliri (₺)</label>
            <input type="number" id="hc-roas-revenue" placeholder="Örn: 50.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-roas-spend">Toplam Reklam Harcaması (₺)</label>
            <input type="number" id="hc-roas-spend" placeholder="Örn: 10.000">
        </div>
        <button class="hc-btn" onclick="hcRoasHesapla()">ROAS Hesapla</button>
        <div class="hc-result" id="hc-roas-result">
            <div class="hc-result-item">
                <span>ROAS Oranı:</span>
                <strong class="hc-result-value" id="hc-roas-value">-</strong>
            </div>
            <p id="hc-roas-comment" class="hc-small-text"></p>
        </div>
    </div>
    <?php
}
