<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ortalama_atom_kutlesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ortalama-atom-kutlesi-hesaplama',
        HC_PLUGIN_URL . 'modules/ortalama-atom-kutlesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ortalama-atom-kutlesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ortalama-atom-kutlesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-avg-atomic">
        <h3>Ortalama Atom Kütlesi Hesaplama</h3>
        <div id="hc-aa-inputs">
            <div class="hc-form-group hc-aa-row">
                <input type="number" class="hc-aa-mass" placeholder="İzotop Kütlesi" style="width:48%">
                <input type="number" class="hc-aa-percent" placeholder="Bolluk (%)" style="width:48%">
            </div>
            <div class="hc-form-group hc-aa-row">
                <input type="number" class="hc-aa-mass" placeholder="İzotop Kütlesi" style="width:48%">
                <input type="number" class="hc-aa-percent" placeholder="Bolluk (%)" style="width:48%">
            </div>
        </div>
        <button class="hc-btn-secondary" onclick="hcAddIsotopeInput()" style="margin-bottom:10px;">+ İzotop Ekle</button>
        <button class="hc-btn" onclick="hcOrtalamaAtomKütlesiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-aa-result">
            <div class="hc-result-label">Ortalama Atom Kütlesi:</div>
            <div class="hc-result-value" id="hc-aa-val">-</div>
        </div>
    </div>
    <?php
}
