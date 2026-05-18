<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hacimden_kutle_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hacimden-kutle-hesaplama',
        HC_PLUGIN_URL . 'modules/hacimden-kutle-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hacimden-kutle-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hacimden-kutle-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hacimden-kutle-hesaplama">
        <h3>Hacimden Kütle Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-hk-malzeme">Malzeme (Hızlı Yoğunluk Seçimi)</label>
            <select id="hc-hk-malzeme" onchange="hcHkMalzemeSecildi()">
                <option value="">-- Malzeme Seçin (İsteğe Bağlı) --</option>
                <option value="7850">Demir / Çelik (7.850 kg/m³)</option>
                <option value="2700">Alüminyum (2.700 kg/m³)</option>
                <option value="8960">Bakır (8.960 kg/m³)</option>
                <option value="19300">Altın (19.300 kg/m³)</option>
                <option value="1000">Su (1.000 kg/m³)</option>
                <option value="13600">Cıva (13.600 kg/m³)</option>
                <option value="750">Ahşap (Meşe - ~750 kg/m³)</option>
                <option value="2400">Beton (~2.400 kg/m³)</option>
                <option value="2500">Cam (~2.500 kg/m³)</option>
                <option value="1.2">Hava (~1.2 kg/m³)</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-hk-yogunluk">Yoğunluk (ρ - kg/m³)</label>
            <input type="number" step="any" id="hc-hk-yogunluk" placeholder="Örn: 7850" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-hk-hacim">Hacim Değeri</label>
            <input type="number" step="any" id="hc-hk-hacim" placeholder="Hacim giriniz" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-hk-birim">Hacim Birimi</label>
            <select id="hc-hk-birim">
                <option value="m3">Metreküp (m³)</option>
                <option value="litre">Litre (L / dm³)</option>
                <option value="cm3">Santimetreküp (cm³)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcHacimdenKutleHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-hacimden-kutle-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
