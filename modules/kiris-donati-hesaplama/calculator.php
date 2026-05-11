<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kiris_donati_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-beam-rebar',
        HC_PLUGIN_URL . 'modules/kiris-donati-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-beam-rebar">
        <h3>Kiriş Donatı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Tasarım Momenti (Md, kNm)</label>
            <input type="number" id="hc-br-moment" placeholder="kNm" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Kiriş Genişliği (b, mm)</label>
            <input type="number" id="hc-br-b" placeholder="mm" step="10" value="250">
        </div>
        
        <div class="hc-form-group">
            <label>Faydalı Derinlik (d, mm)</label>
            <input type="number" id="hc-br-d" placeholder="mm" step="10" value="450">
        </div>
        
        <div class="hc-form-group">
            <label>Çelik Sınıfı (fyk)</label>
            <select id="hc-br-fyk">
                <option value="420">S420 (420 MPa)</option>
                <option value="500">S500 (500 MPa)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcBeamRebarHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-br-result">
            <span>Gereken Donatı Alanı (As):</span>
            <div class="hc-result-value" id="hc-br-res-val">0 mm²</div>
            <div id="hc-br-res-bars" style="margin-top:5px; font-size:0.9em; opacity:0.8;">-</div>
        </div>
    </div>
    <?php
}
