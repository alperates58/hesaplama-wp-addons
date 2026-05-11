<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_boru_hatti_basinc_dusumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-boru-basinc-kaybi',
        HC_PLUGIN_URL . 'modules/boru-hatti-basinc-dusumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-boru-basinc-kaybi">
        <h3>Boru Hattı Basınç Düşümü Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Boru Uzunluğu (L, m)</label>
            <input type="number" id="hc-bhb-uzunluk" placeholder="Örn: 100" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Boru İç Çapı (D, mm)</label>
            <input type="number" id="hc-bhb-cap" placeholder="Örn: 50" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Akış Hızı (v, m/s)</label>
            <input type="number" id="hc-bhb-hiz" placeholder="Örn: 2" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Sürtünme Faktörü (f)</label>
            <input type="number" id="hc-bhb-f" placeholder="Örn: 0.02" step="0.001" value="0.02">
        </div>
        
        <div class="hc-form-group">
            <label>Akışkan Yoğunluğu (ρ, kg/m³)</label>
            <input type="number" id="hc-bhb-rho" value="1000" step="1">
        </div>
        
        <button class="hc-btn" onclick="hcBoruBasincKaybiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-bhb-result">
            <span>Toplam Basınç Kaybı (ΔP):</span>
            <div class="hc-result-value" id="hc-bhb-res-pa">0 Pa</div>
            <div id="hc-bhb-res-bar" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 bar</div>
            <div id="hc-bhb-res-mh2o" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 mSS (Su Sütunu)</div>
        </div>
    </div>
    <?php
}
