<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kahve_karbon_ayak_izi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-coffee-carbon',
        HC_PLUGIN_URL . 'modules/kahve-karbon-ayak-izi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-coffee-carbon-calc">
        <h3>Kahve Karbon Ayak İzi</h3>
        <div class="hc-form-group">
            <label for="hc-carbon-cups">Günlük Kahve Tüketimi (Fincan):</label>
            <input type="number" id="hc-carbon-cups" placeholder="2">
        </div>
        <div class="hc-form-group">
            <label for="hc-carbon-type">Kahve Hazırlama Şekli:</label>
            <select id="hc-carbon-type">
                <option value="0.05">Siyah Kahve (Filtre/Espresso)</option>
                <option value="0.25">Sütlü Kahve (Latte/Cappuccino)</option>
                <option value="0.15">Hazır Kahve (Sade)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcCoffeeCarbonHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-coffee-carbon-result">
            <strong>Yıllık CO2 Emisyonu:</strong>
            <div id="hc-carbon-val" class="hc-result-value">-</div>
            <p id="hc-carbon-desc"></p>
        </div>
    </div>
    <?php
}
