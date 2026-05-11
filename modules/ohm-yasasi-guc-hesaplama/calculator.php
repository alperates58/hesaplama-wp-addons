<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ohm_yasasi_guc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ohm-guc',
        HC_PLUGIN_URL . 'modules/ohm-yasasi-guc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ohm-guc">
        <h3>Ohm Yasası Güç Hesaplama (P = V × I)</h3>
        
        <div class="hc-form-group">
            <label for="hc-og-v">Gerilim (Volt - V)</label>
            <input type="number" id="hc-og-v" placeholder="V" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-og-i">Akım (Amper - A)</label>
            <input type="number" id="hc-og-i" placeholder="A" step="any">
        </div>

        <button class="hc-btn" onclick="hcOhmGucHesapla()">Gücü Hesapla</button>

        <div class="hc-result" id="hc-og-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Elektriksel Güç (P):</span>
                <span class="hc-result-value" id="hc-og-res-total">--</span>
                <span class="hc-result-unit">Watt (W)</span>
            </div>
        </div>
    </div>
    <?php
}
