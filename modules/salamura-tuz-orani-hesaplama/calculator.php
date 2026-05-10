<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_salamura_tuz_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-brine-calc',
        HC_PLUGIN_URL . 'modules/salamura-tuz-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-brine-calc-wrapper">
        <h3>Salamura Hazırlama</h3>
        <div class="hc-form-group">
            <label for="hc-brine-water">Su Miktarı (Litre):</label>
            <input type="number" id="hc-brine-water" placeholder="1" step="0.5">
        </div>
        <div class="hc-form-group">
            <label for="hc-brine-type">Salamura Amacı:</label>
            <select id="hc-brine-type">
                <option value="5">Yumuşak Sebzeler (%5 Tuz)</option>
                <option value="8">Sert Sebzeler / Turşu (%8 Tuz)</option>
                <option value="12">Yaprak / Peynir Saklama (%12 Tuz)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcBrinePctHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-brine-pct-result">
            <strong>Gereken Tuz Miktarı:</strong>
            <div id="hc-brine-val" class="hc-result-value">-</div>
            <p id="hc-brine-info"></p>
        </div>
    </div>
    <?php
}
