<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_betonarme_kolon_boyutu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kolon-boyutu',
        HC_PLUGIN_URL . 'modules/betonarme-kolon-boyutu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-kolon-boyutu">
        <h3>Betonarme Kolon Kesit Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Kolona Gelen Toplam Alan (m²)</label>
            <input type="number" id="hc-kb-alan" placeholder="Örn: 25" step="0.1">
            <small>Bir kolonun taşıdığı döşeme alanı.</small>
        </div>
        
        <div class="hc-form-group">
            <label>Kat Sayısı</label>
            <input type="number" id="hc-kb-kat" placeholder="Örn: 5" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Kat Başına Ortalama Yük (kN/m²)</label>
            <input type="number" id="hc-kb-yuk" value="12" step="0.1">
            <small>Konutlar için genellikle 12 kN/m² alınır.</small>
        </div>
        
        <div class="hc-form-group">
            <label>Beton Sınıfı (f<sub>ck</sub>)</label>
            <select id="hc-kb-fck">
                <option value="25">C25 (25 MPa)</option>
                <option value="30" selected>C30 (30 MPa)</option>
                <option value="35">C35 (35 MPa)</option>
                <option value="40">C40 (40 MPa)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcKolonBoyutuHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-kb-result">
            <span>Minimum Kolon Kesit Alanı (A<sub>c</sub>):</span>
            <div class="hc-result-value" id="hc-kb-res-mm2">0 mm²</div>
            <div id="hc-kb-res-suggest" style="margin-top:5px; font-size:1em; font-weight:bold; color:#e67e22;">Öneri: 0x0 cm</div>
            <small>Not: TBDY 2018'e göre minimum kolon boyutu 300x300 mm olmalıdır.</small>
        </div>
    </div>
    <?php
}
