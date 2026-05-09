<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mbps_mb_s_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-mbps-mb-s-donusturucu',
        HC_PLUGIN_URL . 'modules/mbps-mb-s-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mbps-mb-s-donusturucu-css',
        HC_PLUGIN_URL . 'modules/mbps-mb-s-donusturucu/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mbps-mb-s-donusturucu">
        <h3>Mbps MB/s Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-mmd-mbps">Megabit saniye (Mbps)</label>
            <input type="number" id="hc-mmd-mbps" placeholder="Mbps" step="any" oninput="hcMbpsToMbs()">
        </div>
        <div class="hc-form-group">
            <label for="hc-mmd-mbs">Megabyte saniye (MB/s)</label>
            <input type="number" id="hc-mmd-mbs" placeholder="MB/s" step="any" oninput="hcMbsToMbps()">
        </div>
        <div class="hc-result" id="hc-mbps-mb-s-donusturucu-result">
            <div id="hc-mmd-summary"></div>
        </div>
    </div>
    <?php
}
