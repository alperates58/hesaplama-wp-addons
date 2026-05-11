<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_deprem_yuku_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-seismic-load',
        HC_PLUGIN_URL . 'modules/deprem-yuku-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-seismic-load">
        <h3>Eşdeğer Deprem Yükü Hesaplama (TBDY 2018)</h3>
        
        <div class="hc-form-group">
            <label>Binanın Toplam Ağırlığı (W, kN)</label>
            <input type="number" id="hc-dy-w" placeholder="Örn: 10000" step="1">
            <small>Örn: 500 m² kat alanı olan 5 katlı bina ~25.000-30.000 kN</small>
        </div>
        
        <div class="hc-form-group">
            <label>Kısa Periyot Tasarım Spektral İvme Katsayısı (S<sub>DS</sub>)</label>
            <input type="number" id="hc-dy-sds" value="1.0" step="0.01">
            <small>Haritadan alınan ivme katsayısı (genelde 0.4 - 1.5 arası).</small>
        </div>
        
        <div class="hc-form-group">
            <label>Bina Önem Katsayısı (I)</label>
            <select id="hc-dy-i">
                <option value="1.0">Konut, İşyeri (I=1.0)</option>
                <option value="1.2">Okul, Yurt, Müze (I=1.2)</option>
                <option value="1.5">Hastane, İtfaiye, Haberleşme (I=1.5)</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label>Taşıyıcı Sistem Davranış Katsayısı (R)</label>
            <input type="number" id="hc-dy-r" value="8" step="1">
            <small>Betonarme süneklik düzeyi yüksek çerçeveler için 8.</small>
        </div>
        
        <button class="hc-btn" onclick="hcDepremYukuHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-dy-result">
            <span>Toplam Taban Kesme Kuvveti (V<sub>t</sub>):</span>
            <div class="hc-result-value" id="hc-dy-res-vt">0 kN</div>
            <div id="hc-dy-res-ratio" style="margin-top:5px; font-size:0.9em; opacity:0.8;">Bina ağırlığının %0'ı</div>
            <small>V<sub>t</sub> = W · S<sub>DS</sub> / (R/I)</small>
        </div>
    </div>
    <?php
}
