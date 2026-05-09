<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cozelti_hazirlama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cozelti-hazirlama-hesaplama',
        HC_PLUGIN_URL . 'modules/cozelti-hazirlama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cozelti-hazirlama-hesaplama-css',
        HC_PLUGIN_URL . 'modules/cozelti-hazirlama-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cozelti-hazirlama-hesaplama">
        <h3>Çözelti Hazırlama (Molarite) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-sol-mw">Molekül Ağırlığı (g/mol)</label>
            <input type="number" id="hc-sol-mw" placeholder="Örn: 58.44 (NaCl)" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-sol-molarity">Hedef Molarite (M veya mol/L)</label>
            <input type="number" id="hc-sol-molarity" placeholder="Örn: 0.5" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-sol-vol">Hedef Hacim (mL)</label>
            <input type="number" id="hc-sol-vol" placeholder="Örn: 250" step="any">
        </div>
        <button class="hc-btn" onclick="hcCozeltiHazirlamaHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-sol-result">
            <div class="hc-result-label">Gerekli Madde Miktarı:</div>
            <div class="hc-result-value" id="hc-sol-val">-</div>
            <div class="hc-result-note" id="hc-sol-note"></div>
        </div>
    </div>
    <?php
}
