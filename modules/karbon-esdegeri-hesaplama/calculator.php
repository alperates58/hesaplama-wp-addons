<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_karbon_esdegeri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-carbon-equiv',
        HC_PLUGIN_URL . 'modules/karbon-esdegeri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-carbon-equiv-css',
        HC_PLUGIN_URL . 'modules/karbon-esdegeri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ce">
        <h3>Karbon Eşdeğeri (CE) Hesabı</h3>
        <p style="font-size:0.8rem; margin-bottom:15px;">IIW Formülü: C + Mn/6 + (Cr+Mo+V)/5 + (Ni+Cu)/15</p>
        <div class="hc-ce-grid">
            <div class="hc-form-group">
                <label>C (%):</label>
                <input type="number" id="hc-ce-c" step="0.01" value="0.20">
            </div>
            <div class="hc-form-group">
                <label>Mn (%):</label>
                <input type="number" id="hc-ce-mn" step="0.01" value="1.20">
            </div>
            <div class="hc-form-group">
                <label>Cr (%):</label>
                <input type="number" id="hc-ce-cr" step="0.01" value="0">
            </div>
            <div class="hc-form-group">
                <label>Mo (%):</label>
                <input type="number" id="hc-ce-mo" step="0.01" value="0">
            </div>
            <div class="hc-form-group">
                <label>V (%):</label>
                <input type="number" id="hc-ce-v" step="0.01" value="0">
            </div>
            <div class="hc-form-group">
                <label>Ni (%):</label>
                <input type="number" id="hc-ce-ni" step="0.01" value="0">
            </div>
            <div class="hc-form-group">
                <label>Cu (%):</label>
                <input type="number" id="hc-ce-cu" step="0.01" value="0">
            </div>
        </div>
        <button class="hc-btn" onclick="hcCarbonEquivHesapla()">CE Hesapla</button>
        <div class="hc-result" id="hc-ce-result">
            <strong>Karbon Eşdeğeri:</strong>
            <div id="hc-ce-res-val" class="hc-result-value">-</div>
            <p id="hc-ce-msg" style="margin-top:10px; font-weight:bold;"></p>
        </div>
    </div>
    <?php
}
