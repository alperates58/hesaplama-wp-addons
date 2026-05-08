<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_debi_birimi_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-flow-conv',
        HC_PLUGIN_URL . 'modules/debi-birimi-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-flow-box">
        <h3>Debi Birimi Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Değer</label>
            <input type="number" id="hc-flow-input" value="1" oninput="hcFlowConvert()">
        </div>
        <div class="hc-form-group">
            <label>Kaynak Birim</label>
            <select id="hc-flow-from" onchange="hcFlowConvert()">
                <option value="ls">Litre/Saniye (L/s)</option>
                <option value="lm">Litre/Dakika (L/min)</option>
                <option value="m3h">Metreküp/Saat (m³/h)</option>
                <option value="m3s">Metreküp/Saniye (m³/s)</option>
                <option value="gpm">Galon/Dakika (gpm US)</option>
            </select>
        </div>
        <div class="hc-result visible">
            <div id="hc-flow-results" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;"></div>
        </div>
    </div>
    <?php
}
