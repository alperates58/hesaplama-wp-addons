<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kahve_karbon_ayak_izi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-coffee-carbon-js',
        HC_PLUGIN_URL . 'modules/kahve-karbon-ayak-izi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-coffee-carbon-css',
        HC_PLUGIN_URL . 'modules/kahve-karbon-ayak-izi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-coffee-carbon">
        <h3>Kahve Karbon Ayak İzi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-cc-type">Kahve Türü</label>
            <select id="hc-cc-type">
                <option value="21">Filtre Kahve (Siyah)</option>
                <option value="150">Espresso Bazlı (Sütsüz)</option>
                <option value="340">Latte / Cappuccino (Sütlü)</option>
                <option value="80">Hazır Kahve</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-cc-milk">Süt Türü</label>
            <select id="hc-cc-milk">
                <option value="1.0">Sütsüz / Kara</option>
                <option value="2.5">Hayvansal Süt (İnek)</option>
                <option value="1.2">Yulaf Sütü</option>
                <option value="1.5">Soya Sütü</option>
                <option value="1.1">Badem Sütü</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-cc-cups">Günlük Tüketim (Fincan)</label>
            <input type="number" id="hc-cc-cups" value="1" min="1">
        </div>

        <button class="hc-btn" onclick="hcKahveKarbonHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-coffee-carbon-result">
            <div class="hc-result-item">
                <span>Günlük CO₂ Salınımı:</span>
                <strong class="hc-result-value" id="hc-cc-val">-</strong>
            </div>
            <div class="hc-result-note" id="hc-cc-note"></div>
        </div>
    </div>
    <?php
}
