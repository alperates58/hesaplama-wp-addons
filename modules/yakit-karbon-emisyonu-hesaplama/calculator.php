<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yakit_karbon_emisyonu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yakit-karbon-emisyonu-hesaplama',
        HC_PLUGIN_URL . 'modules/yakit-karbon-emisyonu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yakit-karbon-emisyonu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/yakit-karbon-emisyonu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-fuel-carbon">
        <h3>Yakıt Karbon Emisyonu</h3>
        <div class="hc-form-group">
            <label for="hc-fc-type">Yakıt Tipi</label>
            <select id="hc-fc-type">
                <option value="2.31">Benzin (2.31 kg/L)</option>
                <option value="2.68">Dizel (2.68 kg/L)</option>
                <option value="1.51">LPG (1.51 kg/L)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-fc-amount">Yakıt Miktarı (Litre)</label>
            <input type="number" id="hc-fc-amount" placeholder="Örn: 50">
        </div>
        <button class="hc-btn" onclick="hcYakıtKarbonEmisyonuHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-fc-result">
            <div class="hc-result-label">Toplam Emisyon:</div>
            <div class="hc-result-value" id="hc-fc-val">-</div>
        </div>
    </div>
    <?php
}
