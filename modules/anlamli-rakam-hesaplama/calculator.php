<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_anlamli_rakam_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sig-figs',
        HC_PLUGIN_URL . 'modules/anlamli-rakam-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sig-figs-css',
        HC_PLUGIN_URL . 'modules/anlamli-rakam-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sigfigs">
        <h3>Anlamlı Rakam Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-sf-val">Sayı</label>
            <input type="text" id="hc-sf-val" placeholder="Örn: 0.00450">
        </div>

        <button class="hc-btn" onclick="hcSigFigsHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-sf-result">
            <div class="hc-result-item">
                <span>Anlamlı Rakam Sayısı:</span>
                <span class="hc-result-value highlight" id="hc-res-sf-count">-</span>
            </div>
            <div class="hc-result-item">
                <span>Anlamlı Rakamlar:</span>
                <span class="hc-result-value" id="hc-res-sf-digits">-</span>
            </div>
            <div class="hc-result-note">
                * Sıfır kuralları (başta, ortada, sonda) baz alınmıştır.
            </div>
        </div>
    </div>
    <?php
}
