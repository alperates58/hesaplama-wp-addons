<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_poiseuille_yasasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-poiseuille',
        HC_PLUGIN_URL . 'modules/poiseuille-yasasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-poiseuille">
        <h3>Poiseuille Yasası (Debi Hesabı)</h3>
        
        <div class="hc-form-group">
            <label for="hc-py-radius">Boru Yarıçapı (R - m)</label>
            <input type="number" id="hc-py-radius" placeholder="m" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-py-pressure">Basınç Farkı (ΔP - Pa)</label>
            <input type="number" id="hc-py-pressure" placeholder="Pa" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-py-length">Boru Uzunluğu (L - m)</label>
            <input type="number" id="hc-py-length" placeholder="m" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-py-mu">Dinamik Viskozite (μ - Pa·s)</label>
            <input type="number" id="hc-py-mu" placeholder="Pa·s" step="any">
        </div>

        <button class="hc-btn" onclick="hcPoiseuilleHesapla()">Debi (Q) Hesapla</button>

        <div class="hc-result" id="hc-py-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Hacimsel Debi (Q):</span>
                <span class="hc-result-value" id="hc-py-res-total">--</span>
                <span class="hc-result-unit">m³/s</span>
            </div>
        </div>
    </div>
    <?php
}
