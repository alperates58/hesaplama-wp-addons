<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_drenaj_hatti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-drainage-calc',
        HC_PLUGIN_URL . 'modules/drenaj-hatti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-drainage-calc-css',
        HC_PLUGIN_URL . 'modules/drenaj-hatti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-drainage">
        <h3>Drenaj Hattı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dh-len">Hattın Uzunluğu (m):</label>
            <input type="number" id="hc-dh-len" placeholder="50">
        </div>
        <div class="hc-form-group">
            <label for="hc-dh-slope">Eğim (%):</label>
            <input type="number" id="hc-dh-slope" value="1" step="0.1">
            <small>Önerilen min: %1</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-dh-width">Hendek Genişliği (cm):</label>
            <input type="number" id="hc-dh-width" value="40">
        </div>
        <button class="hc-btn" onclick="hcDrainageCalcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-drainage-result">
            <div class="hc-dh-grid">
                <div class="hc-dh-item">
                    <strong>Kot Farkı</strong>
                    <div id="hc-dh-res-drop">-</div>
                    <span>cm</span>
                </div>
                <div class="hc-dh-item">
                    <strong>Kazı Hacmi</strong>
                    <div id="hc-dh-res-vol">-</div>
                    <span>m³</span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
