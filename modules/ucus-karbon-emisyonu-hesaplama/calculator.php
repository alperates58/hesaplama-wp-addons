<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ucus_karbon_emisyonu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ucus-karbon-emisyonu-hesaplama',
        HC_PLUGIN_URL . 'modules/ucus-karbon-emisyonu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ucus-karbon-emisyonu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ucus-karbon-emisyonu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-flight-carbon">
        <h3>Uçuş Karbon Emisyonu</h3>
        <div class="hc-form-group">
            <label for="hc-fl-dist">Uçuş Mesafesi (km)</label>
            <input type="number" id="hc-fl-dist" placeholder="Örn: 3000">
        </div>
        <div class="hc-form-group">
            <label for="hc-fl-class">Uçuş Sınıfı</label>
            <select id="hc-fl-class">
                <option value="0.15">Ekonomi (0.15 kg/km)</option>
                <option value="0.30">Business (0.30 kg/km)</option>
                <option value="0.50">First Class (0.50 kg/km)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcUçuşKarbonEmisyonuHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-fl-result">
            <div class="hc-result-label">Toplam Emisyon:</div>
            <div class="hc-result-value" id="hc-fl-val">-</div>
        </div>
    </div>
    <?php
}
