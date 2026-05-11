<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_celik_profil_secimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-celik-profil',
        HC_PLUGIN_URL . 'modules/celik-profil-secimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-celik-profil">
        <h3>Çelik Kiriş Profil Seçimi (Ön Boyutlandırma)</h3>
        
        <div class="hc-form-group">
            <label>Kiriş Açıklığı (L, metre)</label>
            <input type="number" id="hc-cp-l" placeholder="Örn: 6" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Hesap Yükü (q, kN/m)</label>
            <input type="number" id="hc-cp-q" placeholder="Örn: 20" step="0.1">
            <small>Kendi ağırlığı dahil toplam yayılı yük.</small>
        </div>
        
        <div class="hc-form-group">
            <label>Çelik Sınıfı (Emniyet Gerilmesi)</label>
            <select id="hc-cp-sigma">
                <option value="14.4">S235 (St37) - 14.4 kN/cm²</option>
                <option value="21.5">S355 (St52) - 21.5 kN/cm²</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcCelikProfilHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-cp-result">
            <span>Gerekli Mukavemet Momenti (W<sub>x</sub>):</span>
            <div class="hc-result-value" id="hc-cp-res-wx">0 cm³</div>
            <div id="hc-cp-res-mmax" style="margin-top:5px; font-size:0.9em; opacity:0.8;">Maks. Moment (Mmax): 0 kNm</div>
            <small>Önemli: Bu bir ön boyutlandırmadır. Sehim ve burulma kontrolleri ayrıca yapılmalıdır.</small>
        </div>
    </div>
    <?php
}
