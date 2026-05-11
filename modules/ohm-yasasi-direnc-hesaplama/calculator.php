<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ohm_yasasi_direnc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ohm-direnc',
        HC_PLUGIN_URL . 'modules/ohm-yasasi-direnc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ohm-direnc">
        <h3>Ohm Yasası Direnç Hesaplama (R = V / I)</h3>
        
        <div class="hc-form-group">
            <label for="hc-od-v">Gerilim (Volt - V)</label>
            <input type="number" id="hc-od-v" placeholder="V" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-od-i">Akım (Amper - A)</label>
            <input type="number" id="hc-od-i" placeholder="A" step="any">
        </div>

        <button class="hc-btn" onclick="hcOhmDirencHesapla()">Direnci Hesapla</button>

        <div class="hc-result" id="hc-od-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Direnç (R):</span>
                <span class="hc-result-value" id="hc-od-res-total">--</span>
                <span class="hc-result-unit">Ohm (Ω)</span>
            </div>
        </div>
    </div>
    <?php
}
