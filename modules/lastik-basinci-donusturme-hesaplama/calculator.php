<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lastik_basinci_donusturme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pressure-conv',
        HC_PLUGIN_URL . 'modules/lastik-basinci-donusturme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-pc-box">
        <h3>Lastik Basınç Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Basınç (PSI)</label>
            <input type="number" id="hc-pc-input-psi" value="32" oninput="hcPcConvert('psi')">
        </div>
        <div class="hc-result visible">
            <div class="hc-result-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                <div><strong>Bar:</strong><br><span id="hc-pc-bar">-</span></div>
                <div><strong>kPa:</strong><br><span id="hc-pc-kpa">-</span></div>
                <div><strong>kg/cm²:</strong><br><span id="hc-pc-kgcm">-</span></div>
            </div>
        </div>
    </div>
    <?php
}
