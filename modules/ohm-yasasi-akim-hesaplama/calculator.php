<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ohm_yasasi_akim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ohm-akim',
        HC_PLUGIN_URL . 'modules/ohm-yasasi-akim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ohm-akim">
        <h3>Ohm Yasası Akım Hesaplama (I = V / R)</h3>
        
        <div class="hc-form-group">
            <label for="hc-oa-v">Gerilim (Volt - V)</label>
            <input type="number" id="hc-oa-v" placeholder="V" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-oa-r">Direnç (Ohm - Ω)</label>
            <input type="number" id="hc-oa-r" placeholder="Ω" step="any">
        </div>

        <button class="hc-btn" onclick="hcOhmAkimHesapla()">Akımı Hesapla</button>

        <div class="hc-result" id="hc-oa-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Akım (I):</span>
                <span class="hc-result-value" id="hc-oa-res-total">--</span>
                <span class="hc-result-unit">Amper (A)</span>
            </div>
        </div>
    </div>
    <?php
}
