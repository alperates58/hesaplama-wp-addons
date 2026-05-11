<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_doseme_donati_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-slab-reinforcement',
        HC_PLUGIN_URL . 'modules/doseme-donati-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-slab-reinforcement">
        <h3>Betonarme Döşeme Donatı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Döşeme Kalınlığı (h, cm)</label>
            <input type="number" id="hc-dd-h" placeholder="Örn: 15" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Paspayı (cm)</label>
            <input type="number" id="hc-dd-cc" value="2" step="0.5">
        </div>
        
        <div class="hc-form-group">
            <label>Tasarım Momenti (M<sub>d</sub>, kNm/m)</label>
            <input type="number" id="hc-dd-md" placeholder="Örn: 15" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Çelik Sınıfı</label>
            <select id="hc-dd-fyd">
                <option value="36.5">S420 (f<sub>yd</sub> = 365 MPa)</option>
                <option value="43.5">S500 (f<sub>yd</sub> = 435 MPa)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcDosemeDonatiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-dd-result">
            <span>Gerekli Donatı Alanı (A<sub>s</sub>):</span>
            <div class="hc-result-value" id="hc-dd-res-as">0 cm²/m</div>
            <div id="hc-dd-res-suggest" style="margin-top:10px; font-weight:bold; color:#2c3e50;">Öneri: -</div>
            <small>Not: Bu hesaplama TS 500 ve TBDY 2018 limitleri göz önüne alınarak basitleştirilmiştir.</small>
        </div>
    </div>
    <?php
}
