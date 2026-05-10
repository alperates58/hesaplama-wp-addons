<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_derz_dolgu_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-grout-calc',
        HC_PLUGIN_URL . 'modules/derz-dolgu-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-grout-calc-css',
        HC_PLUGIN_URL . 'modules/derz-dolgu-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-grout-calc">
        <h3>Derz Dolgu Miktarı Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-gc-area">Toplam Alan (m²):</label>
            <input type="number" id="hc-gc-area" step="0.1" placeholder="20.0">
        </div>
        <div class="hc-gc-grid">
            <div class="hc-form-group">
                <label>Fayans Boyutu (cm):</label>
                <div style="display:flex; gap:5px;">
                    <input type="number" id="hc-gc-tw" placeholder="30">
                    <input type="number" id="hc-gc-th" placeholder="60">
                </div>
            </div>
            <div class="hc-form-group">
                <label>Kalınlık & Derz (mm):</label>
                <div style="display:flex; gap:5px;">
                    <input type="number" id="hc-gc-td" placeholder="8" title="Fayans Kalınlığı">
                    <input type="number" id="hc-gc-gw" placeholder="3" title="Derz Genişliği">
                </div>
            </div>
        </div>
        <button class="hc-btn" onclick="hcGroutCalcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-grout-calc-result">
            <strong>Gereken Derz Dolgu:</strong>
            <div id="hc-gc-res-val" class="hc-result-value">-</div>
            <span>Kilogram (kg)</span>
        </div>
    </div>
    <?php
}
