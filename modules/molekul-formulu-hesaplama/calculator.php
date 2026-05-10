<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_molekul_formulu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-molekul-formulu-hesaplama',
        HC_PLUGIN_URL . 'modules/molekul-formulu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-molekul-formulu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/molekul-formulu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mol-formula">
        <h3>Molekül Formülü Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-mf-simple">Basit (Kaba) Formül</label>
            <input type="text" id="hc-mf-simple" placeholder="Örn: CH2O">
        </div>
        <div class="hc-form-group">
            <label for="hc-mf-mw">Gerçek Molekül Ağırlığı (g/mol)</label>
            <input type="number" id="hc-mf-mw" placeholder="Örn: 180">
        </div>
        <button class="hc-btn" onclick="hcMolekülFormülüHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mf-result">
            <div class="hc-result-label">Gerçek Molekül Formülü:</div>
            <div class="hc-result-value" id="hc-mf-val">-</div>
        </div>
    </div>
    <?php
}
