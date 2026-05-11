<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dron_yuk_kapasitesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-drone-payload',
        HC_PLUGIN_URL . 'modules/dron-yuk-kapasitesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-drone-payload">
        <h3>Dron Yük Kapasitesi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Motor Sayısı</label>
            <select id="hc-dyk-motors">
                <option value="4">Quadcore (4)</option>
                <option value="6">Hexacopter (6)</option>
                <option value="8">Octocopter (8)</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label>Motor Başına Maksimum İtki (Thrust, gram)</label>
            <input type="number" id="hc-dyk-thrust" placeholder="Örn: 1200" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Dron + Batarya Toplam Ağırlığı (gram)</label>
            <input type="number" id="hc-dyk-weight" placeholder="Örn: 1500" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>İtki-Ağırlık Oranı Hedefi (Thrust-to-Weight)</label>
            <input type="number" id="hc-dyk-ratio" value="2.0" step="0.1">
            <small>Stabil uçuş için en az 2.0 önerilir.</small>
        </div>
        
        <button class="hc-btn" onclick="hcDronPayloadHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-dyk-result">
            <span>Önerilen Maks. Faydalı Yük:</span>
            <div class="hc-result-value" id="hc-dyk-res-val">0 gram</div>
            <div id="hc-dyk-res-total" style="margin-top:5px; font-size:0.9em; opacity:0.8;">Toplam İtki: 0 g</div>
        </div>
    </div>
    <?php
}
