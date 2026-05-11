<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kolon_donati_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-column-rebar',
        HC_PLUGIN_URL . 'modules/kolon-donati-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-column-rebar">
        <h3>Kolon Donatı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Eksenel Tasarım Yükü (Nd, kN)</label>
            <input type="number" id="hc-cr-load" placeholder="kN" step="10">
        </div>
        
        <div class="hc-form-group">
            <label>Kolon Genişliği (b, mm)</label>
            <input type="number" id="hc-cr-b" placeholder="mm" step="10" value="300">
        </div>
        
        <div class="hc-form-group">
            <label>Kolon Derinliği (h, mm)</label>
            <input type="number" id="hc-cr-h" placeholder="mm" step="10" value="300">
        </div>
        
        <div class="hc-form-group">
            <label>Beton Sınıfı</label>
            <select id="hc-cr-fck">
                <option value="25">C25 (25 MPa)</option>
                <option value="30" selected>C30 (30 MPa)</option>
                <option value="35">C35 (35 MPa)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcColumnRebarHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-cr-result">
            <span>Gereken Donatı Alanı (As):</span>
            <div class="hc-result-value" id="hc-cr-res-val">0 mm²</div>
            <div id="hc-cr-res-ratio" style="margin-top:5px; font-size:0.9em; opacity:0.8;">Donatı Oranı: %0</div>
        </div>
    </div>
    <?php
}
