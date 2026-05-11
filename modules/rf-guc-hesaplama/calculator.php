<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_rf_guc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rf-guc',
        HC_PLUGIN_URL . 'modules/rf-guc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-rf-guc-css',
        HC_PLUGIN_URL . 'modules/rf-guc-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rf-guc">
        <h3>RF Güç Hesaplama (dBm ↔ Watt)</h3>
        
        <div class="hc-form-group">
            <label for="hc-rf-dbm">Güç (dBm)</label>
            <input type="number" id="hc-rf-dbm" placeholder="dBm cinsinden değer" step="any" oninput="hcRfDbmToWatt()">
        </div>

        <div class="hc-form-group">
            <label for="hc-rf-watt">Güç (Watt)</label>
            <input type="number" id="hc-rf-watt" placeholder="Watt cinsinden değer" step="any" oninput="hcRfWattToDbm()">
        </div>

        <div class="hc-result" id="hc-rf-guc-result">
            <div id="hc-rf-guc-summary">
                <span id="hc-rf-res-dbm">-- dBm</span> = <span id="hc-rf-res-watt">-- W</span>
            </div>
        </div>
    </div>
    <?php
}
