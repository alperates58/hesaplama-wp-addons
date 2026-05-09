<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_von_mises_gerilmesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-von-mises',
        HC_PLUGIN_URL . 'modules/von-mises-gerilmesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-von-mises-css',
        HC_PLUGIN_URL . 'modules/von-mises-gerilmesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-von-mises">
        <h3>Von Mises Eşdeğer Gerilmesi</h3>
        <div class="hc-form-group">
            <label for="hc-vm-s1">Asal Gerilme 1 (σ1) [MPa]</label>
            <input type="number" id="hc-vm-s1" value="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-vm-s2">Asal Gerilme 2 (σ2) [MPa]</label>
            <input type="number" id="hc-vm-s2" value="50">
        </div>
        <div class="hc-form-group">
            <label for="hc-vm-s3">Asal Gerilme 3 (σ3) [MPa]</label>
            <input type="number" id="hc-vm-s3" value="0">
        </div>
        <button class="hc-btn" onclick="hcVonMisesHesapla()">Eşdeğer Gerilme Hesapla</button>
        <div class="hc-result" id="hc-von-mises-result">
            <div class="hc-result-item">
                <span>Von Mises Gerilmesi (σv):</span>
                <span class="hc-result-value" id="hc-res-vm-val">0 MPa</span>
            </div>
            <p class="hc-vm-note">σv = √[((σ1-σ2)² + (σ2-σ3)² + (σ3-σ1)²) / 2]</p>
        </div>
    </div>
    <?php
}
