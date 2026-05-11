<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_karbon_emisyonu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-carbon-emi',
        HC_PLUGIN_URL . 'modules/karbon-emisyonu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-carbon-emi">
        <h3>Karbon Emisyonu Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Enerji / Yakıt Türü</label>
            <select id="hc-ce-type">
                <option value="0.45">Elektrik (0.45 kg/kWh)</option>
                <option value="2.01">Doğalgaz (2.01 kg/m³)</option>
                <option value="2.31">Benzin (2.31 kg/L)</option>
                <option value="2.68">Dizel (2.68 kg/L)</option>
                <option value="1.51">LPG (1.51 kg/L)</option>
                <option value="1.85">Kömür (1.85 kg/kg)</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label>Kullanım Miktarı (Birimine Göre)</label>
            <input type="number" id="hc-ce-amount" placeholder="Örn: 500" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcCarbonEmiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-ce-result">
            <span>Toplam Karbon Salınımı:</span>
            <div class="hc-result-value" id="hc-ce-res-val">0 kg CO2e</div>
            <div id="hc-ce-res-tree" style="margin-top:10px; font-size:0.9em; border-top:1px solid #eee; padding-top:10px;">
                Bu emisyonu dengelemek için yaklaşık <strong>0</strong> adet ağaç gereklidir.
            </div>
        </div>
    </div>
    <?php
}
