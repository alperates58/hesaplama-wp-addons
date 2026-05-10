<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ip_adresim_nedir( $atts ) {
    wp_enqueue_script(
        'hc-ip-adresim-nedir',
        HC_PLUGIN_URL . 'modules/ip-adresim-nedir/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ip-adresim-nedir-css',
        HC_PLUGIN_URL . 'modules/ip-adresim-nedir/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ip">
        <h3>IP Adresim Nedir?</h3>
        <div class="hc-ip-box">
            <div class="hc-result-label">IP Adresiniz:</div>
            <div class="hc-result-value" id="hc-ip-val">Yükleniyor...</div>
        </div>
        <button class="hc-btn" onclick="hcIpAdresimNedir()">Yenile</button>
        <div id="hc-ip-details" style="margin-top:15px; font-size:0.9em; display:none;"></div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', hcIpAdresimNedir);
    </script>
    <?php
}
