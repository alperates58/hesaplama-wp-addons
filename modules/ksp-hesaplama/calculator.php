<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ksp_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ksp-hesaplama',
        HC_PLUGIN_URL . 'modules/ksp-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ksp-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ksp-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ksp">
        <h3>Ksp Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ksp-type">Tuz Tipi</label>
            <select id="hc-ksp-type">
                <option value="1">AB (Örn: AgCl) - Ksp = s²</option>
                <option value="2">AB₂ / A₂B (Örn: MgF₂) - Ksp = 4s³</option>
                <option value="3">AB₃ / A₃B (Örn: Al(OH)₃) - Ksp = 27s⁴</option>
                <option value="4">A₂B₃ / A₃B₂ (Örn: Ca₃(PO₄)₂) - Ksp = 108s⁵</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-ksp-s">Molar Çözünürlük (s, mol/L)</label>
            <input type="text" id="hc-ksp-s" placeholder="Örn: 1.3e-5">
        </div>
        <button class="hc-btn" onclick="hcKspHesapla()">Ksp Hesapla</button>
        <div class="hc-result" id="hc-ksp-result">
            <div class="hc-result-label">Çözünürlük Çarpımı (Ksp):</div>
            <div class="hc-result-value" id="hc-ksp-val">-</div>
        </div>
    </div>
    <?php
}
