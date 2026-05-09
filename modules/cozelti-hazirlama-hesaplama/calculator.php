<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cozelti_hazirlama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cozelti-hazirlama',
        HC_PLUGIN_URL . 'modules/cozelti-hazirlama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cozelti-hazirlama-css',
        HC_PLUGIN_URL . 'modules/cozelti-hazirlama-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cozelti-hazirlama">
        <h3>Çözelti Hazırlama Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ch-molarity">Hedef Molarite (M - mol/L)</label>
            <input type="number" id="hc-ch-molarity" placeholder="Örn: 0.1" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ch-volume">Hedef Hacim (ml)</label>
            <input type="number" id="hc-ch-volume" placeholder="Örn: 500" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ch-mw">Molekül Ağırlığı (g/mol)</label>
            <input type="number" id="hc-ch-mw" placeholder="Örn: 58.44 (NaCl)" step="any">
        </div>
        <button class="hc-btn" onclick="hcCozeltiHazirlaHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ch-result">
            <div class="hc-result-label">Gereken Madde Miktarı:</div>
            <div class="hc-result-value" id="hc-ch-val">-</div>
            <div class="hc-result-note">Formül: m = M * V * Ma</div>
        </div>
    </div>
    <?php
}
