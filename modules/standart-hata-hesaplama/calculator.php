<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_standart_hata_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-std-err',
        HC_PLUGIN_URL . 'modules/standart-hata-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-std-err-css',
        HC_PLUGIN_URL . 'modules/standart-hata-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-std-err">
        <h3>Standart Hata (Standard Error)</h3>
        <div class="hc-form-group">
            <label for="hc-se-std">Standart Sapma (s)</label>
            <input type="number" id="hc-se-std" value="10" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-se-n">Örneklem Boyutu (n)</label>
            <input type="number" id="hc-se-n" value="100" min="1">
        </div>
        <button class="hc-btn" onclick="hcStdErrHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-std-err-result">
            <div class="hc-result-item">
                <span>Standart Hata (SE):</span>
                <span class="hc-result-value" id="hc-res-se-val">0</span>
            </div>
            <p class="hc-se-note">Formül: SE = Standart Sapma / √n</p>
        </div>
    </div>
    <?php
}
