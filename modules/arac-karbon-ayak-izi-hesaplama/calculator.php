<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_arac_karbon_ayak_izi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-carbon-calc',
        HC_PLUGIN_URL . 'modules/arac-karbon-ayak-izi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cai-box">
        <h3>Araç Karbon Ayak İzi Hesaplama</h3>
        <div class="hc-form-group">
            <label>Yakıt Türü</label>
            <select id="hc-cai-fuel">
                <option value="2310">Benzin (2.31 kg CO2/L)</option>
                <option value="2680">Dizel (2.68 kg CO2/L)</option>
                <option value="1510">LPG (1.51 kg CO2/L)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>Ortalama Yakıt Tüketimi (L/100km)</label>
            <input type="number" step="0.1" id="hc-cai-cons" value="6.5">
        </div>
        <div class="hc-form-group">
            <label>Yıllık Kat Edilen Yol (km)</label>
            <input type="number" id="hc-cai-km" value="15000">
        </div>
        <button class="hc-btn" onclick="hcCaiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cai-result">
            <div class="hc-result-title">Yıllık CO2 Salınımı:</div>
            <div class="hc-result-value" id="hc-cai-val">-</div>
            <div id="hc-cai-tree" style="margin-top: 10px; font-size: 14px;"></div>
        </div>
    </div>
    <?php
}
