<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tnt_esdegeri_enerji_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tnt-esdegeri-enerji-hesaplama',
        HC_PLUGIN_URL . 'modules/tnt-esdegeri-enerji-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tnt-esdegeri-enerji-hesaplama-css',
        HC_PLUGIN_URL . 'modules/tnt-esdegeri-enerji-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tnt-esdegeri-enerji-hesaplama">
        <div class="hc-cal-header">
            <h3>TNT Eşdeğeri Enerji Hesaplama</h3>
            <p>Joule, Kalori veya Kilovatsaat cinsinden verilen bir enerjinin, termodinamik olarak kaç gram, kilogram veya ton TNT patlamasına eşdeğer olduğunu hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-tnt-energy-val">Enerji Değeri</label>
            <input type="number" id="hc-tnt-energy-val" class="hc-input" placeholder="örn. 1000000" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-tnt-energy-unit">Enerji Birimi</label>
            <select id="hc-tnt-energy-unit" class="hc-select">
                <option value="j">Joule (J)</option>
                <option value="kj">Kilojoule (kJ)</option>
                <option value="mj">Megajoule (MJ)</option>
                <option value="gj">Gigajoule (GJ)</option>
                <option value="kwh">Kilovatsaat (kWh)</option>
                <option value="kcal">Kilokalori (kcal)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcTntEsdegeriHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-tnt-esdegeri-enerji-hesaplama-result">
            <div class="hc-result-title">TNT Eşdeğeri Değerleri</div>
            <div class="hc-result-item">
                <span class="hc-result-label">TNT Karşılığı (Gram):</span>
                <span class="hc-result-value" id="hc-tnt-res-g">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">TNT Karşılığı (Kilogram):</span>
                <span class="hc-result-value" id="hc-tnt-res-kg">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">TNT Karşılığı (Ton):</span>
                <span class="hc-result-value" id="hc-tnt-res-ton">-</span>
            </div>
            <div class="hc-result-desc" id="hc-tnt-desc"></div>
        </div>
    </div>
    <?php
}
