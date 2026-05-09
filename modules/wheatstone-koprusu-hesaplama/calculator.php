<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_wheatstone_koprusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-wheatstone',
        HC_PLUGIN_URL . 'modules/wheatstone-koprusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-wheatstone-css',
        HC_PLUGIN_URL . 'modules/wheatstone-koprusu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-wheatstone">
        <h3>Wheatstone Köprüsü (Rx)</h3>
        <div class="hc-form-group">
            <label for="hc-wb-r1">R1 Direnci [Ω]</label>
            <input type="number" id="hc-wb-r1" value="1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-wb-r2">R2 Direnci [Ω]</label>
            <input type="number" id="hc-wb-r2" value="2000">
        </div>
        <div class="hc-form-group">
            <label for="hc-wb-r3">R3 (Ayarlı) Direnci [Ω]</label>
            <input type="number" id="hc-wb-r3" value="1000">
        </div>
        <button class="hc-btn" onclick="hcWheatstoneHesapla()">Rx Değerini Bul</button>
        <div class="hc-result" id="hc-wheatstone-result">
            <div class="hc-result-item">
                <span>Bilinmeyen Direnç (Rx):</span>
                <span class="hc-result-value" id="hc-res-wb-val">0 Ω</span>
            </div>
            <p class="hc-wb-note">Denge durumunda: Rx = (R2 / R1) * R3</p>
        </div>
    </div>
    <?php
}
