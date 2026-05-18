<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_isil_genlesme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-isil-genlesme-hesaplama',
        HC_PLUGIN_URL . 'modules/isil-genlesme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-isil-genlesme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/isil-genlesme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-isil-genlesme-hesaplama">
        <h3>Isıl Genleşme Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ig-tip">Genleşme Türü</label>
            <select id="hc-ig-tip" onchange="hcIgTipDegisti()">
                <option value="boyca">Boyca (Doğrusal) Genleşme (ΔL = L0 · α · ΔT)</option>
                <option value="hacimce">Hacimce Genleşme (ΔV = V0 · β · ΔT)</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-ig-malzeme">Malzeme (Hızlı Katsayı Seçimi)</label>
            <select id="hc-ig-malzeme" onchange="hcIgMalzemeSecildi()">
                <option value="">-- Malzeme Seçin --</option>
                <!-- Boyca genleşme katsayıları x 10^-6 / K veya / °C -->
                <option value="boyca|12">Çelik (12 x 10⁻⁶)</option>
                <option value="boyca|23">Alüminyum (23 x 10⁻⁶)</option>
                <option value="boyca|17">Bakır (17 x 10⁻⁶)</option>
                <option value="boyca|12">Beton (12 x 10⁻⁶)</option>
                <option value="boyca|9">Cam (Standart) (9 x 10⁻⁶)</option>
                <option value="boyca|3.3">Cam (Borosilikat/Pyrex) (3.3 x 10⁻⁶)</option>
                <!-- Hacimce genleşme katsayıları x 10^-6 / K veya / °C -->
                <option value="hacimce|210">Su (210 x 10⁻⁶)</option>
                <option value="hacimce|180">Cıva (180 x 10⁻⁶)</option>
                <option value="hacimce|1100">Etil Alkol (1100 x 10⁻⁶)</option>
                <option value="hacimce|950">Benzin (950 x 10⁻⁶)</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-ig-baslangic" id="hc-ig-baslangic-label">İlk Boy (L0 - metre)</label>
            <input type="number" step="any" id="hc-ig-baslangic" value="10" placeholder="Örn: 10" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-ig-katsayi" id="hc-ig-katsayi-label">Genleşme Katsayısı (α - x10⁻⁶ / °C)</label>
            <input type="number" step="any" id="hc-ig-katsayi" value="12" placeholder="Örn: 12" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-ig-deltaT">Sıcaklık Değişimi (ΔT - °C)</label>
            <input type="number" step="any" id="hc-ig-deltaT" value="50" placeholder="Örn: 50" required>
        </div>
        
        <button class="hc-btn" onclick="hcIsilGenlesmeHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-isil-genlesme-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
