<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_peynir_salamura_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-brine-ratio-js',
        HC_PLUGIN_URL . 'modules/peynir-salamura-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-brine-ratio-css',
        HC_PLUGIN_URL . 'modules/peynir-salamura-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-brine-ratio">
        <h3>Peynir Salamura Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-br-water">Su Miktarı (Litre)</label>
            <input type="number" id="hc-br-water" value="1" min="0.1" step="0.5">
        </div>

        <div class="hc-form-group">
            <label for="hc-br-intensity">Tuz Oranı</label>
            <select id="hc-br-intensity">
                <option value="0.10">Standart (%10 - 100g/L)</option>
                <option value="0.08">Hafif (%8 - 80g/L)</option>
                <option value="0.12">Sert (%12 - 120g/L)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcSalamuraHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-brine-ratio-result">
            <div class="hc-result-item">
                <span>Gereken Tuz:</span>
                <strong class="hc-result-value" id="hc-br-res-val">-</strong>
            </div>
            <div class="hc-result-note">Salamura hazırlarken kaya tuzu kullanılması ve suyun kaynatılıp soğutulması önerilir.</div>
        </div>
    </div>
    <?php
}
