<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_molekul_agirligi_hesaplama( $atts ) {
    // Reuses the logic from molar mass if needed, but we'll provide a standalone one.
    wp_enqueue_script(
        'hc-molekul-agirligi-hesaplama',
        HC_PLUGIN_URL . 'modules/molekul-agirligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-molekul-agirligi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/molekul-agirligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mol-weight">
        <h3>Molekül Ağırlığı Hesaplama</h3>
        <div class="hc-form-group">
            <input type="text" id="hc-mw-formula" placeholder="Formül (Örn: H2O)..." style="font-family:monospace;">
        </div>
        <button class="hc-btn" onclick="hcMolekülAğırlığıHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mw-result">
            <div class="hc-result-label">Molekül Ağırlığı:</div>
            <div class="hc-result-value" id="hc-mw-val">-</div>
        </div>
    </div>
    <?php
}
