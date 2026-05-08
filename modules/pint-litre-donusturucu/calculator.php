<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pint_litre_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-pint-l-conv',
        HC_PLUGIN_URL . 'modules/pint-litre-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-pintl-box">
        <h3>Pint Litre Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Pint Tipi</label>
            <select id="hc-pintl-type" onchange="hcPintToL()">
                <option value="0.473176">ABD Pinti (Liquid - 473 ml)</option>
                <option value="0.568261">İngiliz Pinti (Imperial - 568 ml)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>Pint Miktarı</label>
            <input type="number" id="hc-pintl-pint" value="1" oninput="hcPintToL()">
        </div>
        <div class="hc-form-group">
            <label>Litre (L)</label>
            <input type="number" id="hc-pintl-l" value="0.473" oninput="hcLToPint()">
        </div>
    </div>
    <?php
}
