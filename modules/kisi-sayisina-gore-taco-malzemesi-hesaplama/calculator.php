<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisi_sayisina_gore_taco_malzemesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-taco-per-person-js',
        HC_PLUGIN_URL . 'modules/kisi-sayisina-gore-taco-malzemesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-taco-per-person-css',
        HC_PLUGIN_URL . 'modules/kisi-sayisina-gore-taco-malzemesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-taco-per-person">
        <h3>Taco Malzemesi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-taco-count">Kişi Sayısı</label>
            <input type="number" id="hc-taco-count" value="4" min="1">
        </div>

        <button class="hc-btn" onclick="hcTacoHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-taco-per-person-result">
            <div class="hc-result-item">
                <span>Taco Kabuğu:</span>
                <strong id="hc-taco-res-shells">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Kıyma / Et:</span>
                <strong id="hc-taco-res-meat">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Peynir:</span>
                <strong id="hc-taco-res-cheese">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Sos / Garnitür:</span>
                <strong id="hc-taco-res-other">-</strong>
            </div>
        </div>
    </div>
    <?php
}
