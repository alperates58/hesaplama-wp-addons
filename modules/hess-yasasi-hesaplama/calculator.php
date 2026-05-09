<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hess_yasasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hess',
        HC_PLUGIN_URL . 'modules/hess-yasasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hess-css',
        HC_PLUGIN_URL . 'modules/hess-yasasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hess">
        <h3>Hess Yasası (Toplam Entalpi)</h3>
        <div id="hc-hess-steps">
            <div class="hc-hess-step">
                <input type="number" class="hc-hess-val" placeholder="Adım 1 ΔH (kJ)" step="any">
            </div>
            <div class="hc-hess-step">
                <input type="number" class="hc-hess-val" placeholder="Adım 2 ΔH (kJ)" step="any">
            </div>
        </div>
        <button class="hc-btn-alt" onclick="hcHessAddStep()">+ Adım Ekle</button>
        <button class="hc-btn" onclick="hcHessHesapla()">Toplam ΔH Hesapla</button>
        <div class="hc-result" id="hc-hess-result">
            <div class="hc-result-label">Toplam Tepkime Entalpisi:</div>
            <div class="hc-result-value" id="hc-hess-val">-</div>
            <div class="hc-result-note">ΔH_toplam = Σ ΔH_adımlar</div>
        </div>
    </div>
    <?php
}
