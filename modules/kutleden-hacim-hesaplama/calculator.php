<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kutleden_hacim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kutleden-hacim-hesaplama',
        HC_PLUGIN_URL . 'modules/kutleden-hacim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kutleden-hacim-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kutleden-hacim-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kutleden-hacim-hesaplama">
        <h3>Kütleden Hacim Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-kh-malzeme">Malzeme (Hızlı Yoğunluk Seçimi)</label>
            <select id="hc-kh-malzeme" onchange="hcKhMalzemeSecildi()">
                <option value="">-- Malzeme Seçin (İsteğe Bağlı) --</option>
                <option value="1000">Su (1.000 kg/m³)</option>
                <option value="917">Buz (917 kg/m³)</option>
                <option value="7874">Demir / Çelik (7.874 kg/m³)</option>
                <option value="2700">Alüminyum (2.700 kg/m³)</option>
                <option value="8960">Bakır (8.960 kg/m³)</option>
                <option value="19300">Altın (19.300 kg/m³)</option>
                <option value="2400">Beton (2.400 kg/m³)</option>
                <option value="750">Ahşap (Meşe) (~750 kg/m³)</option>
                <option value="1.225">Standart Hava (1.225 kg/m³)</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-kh-kutle">Kütle (m - kg)</label>
            <input type="number" step="any" id="hc-kh-kutle" value="10" placeholder="Kütle kg" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-kh-yogunluk">Yoğunluk (ρ - kg/m³)</label>
            <input type="number" step="any" id="hc-kh-yogunluk" value="1000" placeholder="Yoğunluk kg/m³" required>
        </div>
        
        <button class="hc-btn" onclick="hcKutledenHacimHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-kutleden-hacim-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
