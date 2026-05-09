<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dairesel_hareket_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dairesel-hareket-hesaplama',
        HC_PLUGIN_URL . 'modules/dairesel-hareket-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dairesel-hareket-hesaplama-css',
        HC_PLUGIN_URL . 'modules/dairesel-hareket-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dairesel-hareket-hesaplama">
        <h3>Dairesel Hareket Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dh-mass">Kütle (m - kg)</label>
            <input type="number" id="hc-dh-mass" placeholder="Örn: 1" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-dh-radius">Yarıçap (r - m)</label>
            <input type="number" id="hc-dh-radius" placeholder="Örn: 2" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-dh-v">Çizgisel Hız (v - m/s)</label>
            <input type="number" id="hc-dh-v" placeholder="Örn: 10" step="any">
        </div>
        <button class="hc-btn" onclick="hcDHHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dh-result">
            <div class="hc-dh-grid">
                <div class="hc-dh-item">
                    <span class="hc-result-label">Merkezcil İvme (a_c):</span>
                    <span class="hc-result-value" id="hc-dh-accel">-</span>
                </div>
                <div class="hc-dh-item">
                    <span class="hc-result-label">Merkezcil Kuvvet (F_c):</span>
                    <span class="hc-result-value" id="hc-dh-force">-</span>
                </div>
            </div>
            <div class="hc-result-note">a_c = v² / r | F_c = m * a_c</div>
        </div>
    </div>
    <?php
}
