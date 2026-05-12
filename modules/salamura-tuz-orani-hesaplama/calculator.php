<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_salamura_tuz_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-brine-calc-js',
        HC_PLUGIN_URL . 'modules/salamura-tuz-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-brine-calc-css',
        HC_PLUGIN_URL . 'modules/salamura-tuz-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-brine-calc">
        <h3>Salamura Tuz Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-bc-water">Su Miktarı (Litre)</label>
            <input type="number" id="hc-bc-water" value="1" min="0.1" step="0.5">
        </div>

        <div class="hc-form-group">
            <label for="hc-bc-type">Salamura Amacı</label>
            <select id="hc-bc-type">
                <option value="0.05">Turşu (%5 - 50g/L)</option>
                <option value="0.08">Zeytin / Sert Turşu (%8 - 80g/L)</option>
                <option value="0.03">Et Marinesi (%3 - 30g/L)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcSalamuraTuzHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-brine-calc-result">
            <div class="hc-result-item">
                <span>Gereken Tuz:</span>
                <strong class="hc-result-value" id="hc-bc-res-val">-</strong>
            </div>
        </div>
    </div>
    <?php
}
