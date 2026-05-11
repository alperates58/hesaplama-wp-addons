<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_beton_dayanimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-beton-dayanim',
        HC_PLUGIN_URL . 'modules/beton-dayanimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-beton-dayanim">
        <h3>Beton Dayanımı Hesaplama (Zamana Bağlı)</h3>
        
        <div class="hc-form-group">
            <label>Hedef 28 Günlük Dayanım (f<sub>ck</sub>, MPa)</label>
            <input type="number" id="hc-bday-fck" placeholder="Örn: 30" step="1">
            <small>C25 için 25, C30 için 30 MPa.</small>
        </div>
        
        <div class="hc-form-group">
            <label>Geçen Süre (Gün)</label>
            <input type="number" id="hc-bday-gun" placeholder="Örn: 7" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Çimento Tipi</label>
            <select id="hc-bday-tip">
                <option value="0.20">Hızlı Gelişen (R tipi, CEM 42.5R/52.5R)</option>
                <option value="0.25">Normal Gelişen (N tipi, CEM 32.5R/42.5N)</option>
                <option value="0.38">Yavaş Gelişen (S tipi, CEM 32.5N)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcBetonDayanimHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-bday-result">
            <span>Tahmini Dayanım (f<sub>ck</sub>(t)):</span>
            <div class="hc-result-value" id="hc-bday-res-val">0 MPa</div>
            <div id="hc-bday-res-percent" style="margin-top:5px; font-size:0.9em; opacity:0.8;">28 günlük dayanımın %0'ı</div>
        </div>
    </div>
    <?php
}
