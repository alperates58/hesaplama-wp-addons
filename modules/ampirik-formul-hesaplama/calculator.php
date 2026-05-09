<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ampirik_formul_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ampirik',
        HC_PLUGIN_URL . 'modules/ampirik-formul-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ampirik-css',
        HC_PLUGIN_URL . 'modules/ampirik-formul-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ampirik">
        <h3>Ampirik Formül Hesaplama</h3>
        <p style="font-size:0.9em; opacity:0.8;">Element sembolü, % Bolluk (veya kütle) ve Atom Kütlesi girin:</p>
        <div id="hc-af-elements">
            <div class="hc-af-row" style="display:grid; grid-template-columns: 1fr 1fr 1fr; gap:10px; margin-bottom:10px;">
                <input type="text" class="hc-af-sym" placeholder="C">
                <input type="number" class="hc-af-perc" placeholder="%">
                <input type="number" class="hc-af-mw" placeholder="Ma">
            </div>
            <div class="hc-af-row" style="display:grid; grid-template-columns: 1fr 1fr 1fr; gap:10px; margin-bottom:10px;">
                <input type="text" class="hc-af-sym" placeholder="H">
                <input type="number" class="hc-af-perc" placeholder="%">
                <input type="number" class="hc-af-mw" placeholder="Ma">
            </div>
        </div>
        <button class="hc-btn-alt" onclick="hcAFAddElement()">+ Element Ekle</button>
        <button class="hc-btn" onclick="hcAFHesapla()">Formül Hesapla</button>
        <div class="hc-result" id="hc-af-result">
            <div class="hc-result-label">Ampirik Formül:</div>
            <div class="hc-result-value" id="hc-af-val">-</div>
            <div class="hc-result-note">Her elementin mol sayısı en küçük olana bölünerek bulunur.</div>
        </div>
    </div>
    <?php
}
