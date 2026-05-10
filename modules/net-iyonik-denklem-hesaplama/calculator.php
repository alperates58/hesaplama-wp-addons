<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_net_iyonik_denklem_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-net-iyonik-denklem-hesaplama',
        HC_PLUGIN_URL . 'modules/net-iyonik-denklem-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-net-iyonik-denklem-hesaplama-css',
        HC_PLUGIN_URL . 'modules/net-iyonik-denklem-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-net-ionic">
        <h3>Net İyonik Denklem Rehberi</h3>
        <p style="font-size:0.9em; color:#666; margin-bottom:15px;">Çökelme veya nötrleşme tepkimeleri için iyonik ayrışmayı analiz eder.</p>
        <div class="hc-form-group">
            <label for="hc-ni-input">Tepkime (Örn: AgNO3 + NaCl)</label>
            <input type="text" id="hc-ni-input" placeholder="AgNO3 + NaCl">
        </div>
        <button class="hc-btn" onclick="hcNetİyonikDenklemHesapla()">Analiz Et</button>
        <div class="hc-result" id="hc-ni-result">
            <div id="hc-ni-stats" style="text-align:left; font-size:1em; line-height:1.6;"></div>
        </div>
    </div>
    <?php
}
