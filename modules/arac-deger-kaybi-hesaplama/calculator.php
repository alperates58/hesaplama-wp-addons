<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_arac_deger_kaybi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-deger-kaybi',
        HC_PLUGIN_URL . 'modules/arac-deger-kaybi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-dk-calc">
        <h3>Araç Değer Kaybı Hesaplama</h3>
        <div class="hc-form-group">
            <label>Araç Piyasa Değeri (TL)</label>
            <input type="number" id="hc-dk-value" placeholder="Örn: 1.200.000">
        </div>
        <div class="hc-form-group">
            <label>Araç Kilometresi (km)</label>
            <input type="number" id="hc-dk-km" placeholder="Örn: 45.000">
        </div>
        <div class="hc-form-group">
            <label>Hasar Alanı / Parçalar</label>
            <select id="hc-dk-part">
                <option value="0.10">Ağır Hasar (Şase, Direk, Tavan)</option>
                <option value="0.06" selected>Orta Hasar (Kapı, Çamurluk, Bagaj)</option>
                <option value="0.03">Hafif Hasar (Tampon, Far, Plastik Aksamlar)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcDkHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dk-result">
            <div class="hc-result-title">Tahmini Değer Kaybı:</div>
            <div class="hc-result-value" id="hc-dk-val">-</div>
            <p style="font-size: 11px; margin-top: 10px; color: #888;">* 165.000 km üzerindeki araçlarda değer kaybı genellikle kabul edilmez.</p>
        </div>
    </div>
    <?php
}
