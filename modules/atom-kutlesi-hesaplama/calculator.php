<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_atom_kutlesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-atom-kutlesi',
        HC_PLUGIN_URL . 'modules/atom-kutlesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-atom-kutlesi-css',
        HC_PLUGIN_URL . 'modules/atom-kutlesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-atom-kutlesi">
        <h3>Ortalama Atom Kütlesi Hesaplama</h3>
        <div id="hc-ak-isotopes">
            <div class="hc-ak-row" style="display:flex; gap:10px; margin-bottom:10px;">
                <input type="number" class="hc-ak-mass" placeholder="Kütle (amu)" step="any">
                <input type="number" class="hc-ak-perc" placeholder="Bolluk (%)" step="any">
            </div>
            <div class="hc-ak-row" style="display:flex; gap:10px; margin-bottom:10px;">
                <input type="number" class="hc-ak-mass" placeholder="Kütle (amu)" step="any">
                <input type="number" class="hc-ak-perc" placeholder="Bolluk (%)" step="any">
            </div>
        </div>
        <button class="hc-btn-alt" onclick="hcAKAddIsotope()">+ İzotop Ekle</button>
        <button class="hc-btn" onclick="hcAKHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ak-result">
            <div class="hc-result-label">Ortalama Atom Kütlesi:</div>
            <div class="hc-result-value" id="hc-ak-val">-</div>
            <div class="hc-result-note">Σ (İzotop Kütlesi * Bolluk / 100)</div>
        </div>
    </div>
    <?php
}
