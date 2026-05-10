<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_peynir_salamura_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cheese-brine',
        HC_PLUGIN_URL . 'modules/peynir-salamura-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cheese-brine-calc">
        <h3>Peynir Salamura Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-brine-water">Su Miktarı (Litre):</label>
            <input type="number" id="hc-brine-water" placeholder="1" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-brine-pct">Hedef Tuz Oranı (%):</label>
            <input type="number" id="hc-brine-pct" value="10">
            <small>Beyaz peynir için genelde %10 - %15</small>
        </div>
        <button class="hc-btn" onclick="hcCheeseBrineHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cheese-brine-result">
            <strong>Gereken Tuz:</strong>
            <div id="hc-brine-salt" class="hc-result-value">-</div>
            <p id="hc-brine-info"></p>
        </div>
    </div>
    <?php
}
