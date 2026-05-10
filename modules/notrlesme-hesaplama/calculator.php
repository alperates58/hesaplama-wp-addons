<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_notrlesme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-notrlesme-hesaplama',
        HC_PLUGIN_URL . 'modules/notrlesme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-notrlesme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/notrlesme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-neutralization">
        <h3>Nötrleşme (Asit-Baz) Hesaplama</h3>
        <div class="hc-form-group">
            <label>Asit (Ma * Va * na)</label>
            <div style="display:flex; gap:5px;">
                <input type="number" id="hc-nu-ma" placeholder="Ma (M)" style="width:33%">
                <input type="number" id="hc-nu-va" placeholder="Va (mL)" style="width:33%">
                <input type="number" id="hc-nu-na" placeholder="na" value="1" style="width:33%">
            </div>
        </div>
        <div class="hc-form-group">
            <label>Baz (Mb * Vb * nb)</label>
            <div style="display:flex; gap:5px;">
                <input type="number" id="hc-nu-mb" placeholder="Mb (M)" style="width:33%">
                <input type="number" id="hc-nu-vb" placeholder="Vb (mL)" style="width:33%">
                <input type="number" id="hc-nu-nb" placeholder="nb" value="1" style="width:33%">
            </div>
        </div>
        <p style="font-size:0.8em; color:#666;">*Bilinmeyen değeri boş bırakın.</p>
        <button class="hc-btn" onclick="hcNötrleşmeHesapla()">Bilinmeyeni Hesapla</button>
        <div class="hc-result" id="hc-nu-result">
            <div class="hc-result-label">Sonuç:</div>
            <div class="hc-result-value" id="hc-nu-val">-</div>
        </div>
    </div>
    <?php
}
