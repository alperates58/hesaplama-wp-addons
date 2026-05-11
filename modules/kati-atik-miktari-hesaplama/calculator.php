<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kati_atik_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-solid-waste',
        HC_PLUGIN_URL . 'modules/kati-atik-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-solid-waste">
        <h3>Katı Atık Miktarı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Birim/Kişi Sayısı</label>
            <input type="number" id="hc-sw-count" placeholder="Örn: 100" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Süre (Gün)</label>
            <input type="number" id="hc-sw-days" placeholder="Örn: 30" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Atık Türü (Tahmini Oran)</label>
            <select id="hc-sw-type">
                <option value="1.15">Evsel Atık (1.15 kg/kişi-gün)</option>
                <option value="1.50">Ofis/Ticari Atık (1.50 kg/kişi-gün)</option>
                <option value="2.50">Endüstriyel/Karma (2.50 kg/kişi-gün)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcSolidWasteHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-sw-result">
            <span>Tahmini Toplam Atık:</span>
            <div class="hc-result-value" id="hc-sw-res-val">0 kg</div>
            <div id="hc-sw-res-ton" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 Ton</div>
        </div>
    </div>
    <?php
}
