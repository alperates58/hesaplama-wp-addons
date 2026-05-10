<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ebob_ekok_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ebob-ekok',
        HC_PLUGIN_URL . 'modules/ebob-ekok-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ebob-ekok-css',
        HC_PLUGIN_URL . 'modules/ebob-ekok-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ebob-ekok">
        <h3>EBOB EKOK Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ee-s1">1. Sayı:</label>
            <input type="number" id="hc-ee-s1" placeholder="örn: 12">
        </div>
        <div class="hc-form-group">
            <label for="hc-ee-s2">2. Sayı:</label>
            <input type="number" id="hc-ee-s2" placeholder="örn: 18">
        </div>
        <button class="hc-btn" onclick="hcEbobEkokHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ebob-ekok-result">
            <div class="hc-ee-grid">
                <div class="hc-ee-item">
                    <strong>EBOB</strong>
                    <div id="hc-ee-res-ebob" class="hc-ee-val">-</div>
                </div>
                <div class="hc-ee-item">
                    <strong>EKOK</strong>
                    <div id="hc-ee-res-ekok" class="hc-ee-val">-</div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
