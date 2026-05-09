<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_araba_ve_bisiklet_karbon_emisyonu_karsilastirma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-araba-bisiklet',
        HC_PLUGIN_URL . 'modules/araba-ve-bisiklet-karbon-emisyonu-karsilastirma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-araba-bisiklet-css',
        HC_PLUGIN_URL . 'modules/araba-ve-bisiklet-karbon-emisyonu-karsilastirma-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-araba-bisiklet">
        <h3>Araba ve Bisiklet Emisyon Karşılaştırması</h3>
        <div class="hc-form-group">
            <label for="hc-comp-distance">Gidilecek Mesafe (km)</label>
            <input type="number" id="hc-comp-distance" placeholder="Örn: 10" min="1" value="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-comp-car-type">Araba Türü</label>
            <select id="hc-comp-car-type">
                <option value="petrol">Benzinli Otomobil (Ortalama)</option>
                <option value="diesel">Dizel Otomobil</option>
                <option value="hybrid">Hibrit Otomobil</option>
                <option value="ev">Elektrikli Otomobil (2026 TR Şebekesi)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcArabaBisikletKarsilastir()">Karşılaştır</button>
        <div class="hc-result" id="hc-araba-bisiklet-result">
            <div class="hc-comp-bar-container">
                <div class="hc-comp-label">Araba Emisyonu: <span id="hc-res-car-em">0 kg CO2</span></div>
                <div class="hc-comp-bar hc-bar-car" id="hc-bar-car"></div>
                <div class="hc-comp-label">Bisiklet Emisyonu: <span id="hc-res-bike-em">0 kg CO2</span></div>
                <div class="hc-comp-bar hc-bar-bike" id="hc-bar-bike"></div>
            </div>
            <div class="hc-res-summary">
                <strong>Tasarruf:</strong> <span id="hc-res-savings">0 kg CO2</span>
                <p id="hc-res-tree-equiv">Bu tasarruf yaklaşık 0 ağacın yıllık CO2 emilimine eşdeğerdir.</p>
            </div>
        </div>
    </div>
    <?php
}
