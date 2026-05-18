<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_iki_nokta_arasindaki_kutlecekim_kuvveti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-iki-nokta-arasindaki-kutlecekim-kuvveti-hesaplama',
        HC_PLUGIN_URL . 'modules/iki-nokta-arasindaki-kutlecekim-kuvveti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-iki-nokta-arasindaki-kutlecekim-kuvveti-hesaplama-css',
        HC_PLUGIN_URL . 'modules/iki-nokta-arasindaki-kutlecekim-kuvveti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-iki-nokta-arasindaki-kutlecekim-kuvveti-hesaplama">
        <h3>İki Nokta Arasındaki Kütleçekim Kuvveti Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-inkk-m1-pres">1. Kütle (m1 - kg) Şablonları</label>
            <select id="hc-inkk-m1-pres" onchange="hcInkkM1Secildi()">
                <option value="">-- Serbest Değer --</option>
                <option value="5.972e24">Dünya (5.972 x 10²⁴ kg)</option>
                <option value="1.989e30">Güneş (1.989 x 10³⁰ kg)</option>
                <option value="7.346e22">Ay (7.346 x 10²² kg)</option>
                <option value="6.39e23">Mars (6.39 x 10²³ kg)</option>
                <option value="70">Ortalama İnsan (70 kg)</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-inkk-m1">1. Kütle (m1 - kg)</label>
            <input type="number" step="any" id="hc-inkk-m1" value="5.972e24" placeholder="Örn: 5.972e24" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-inkk-m2-pres">2. Kütle (m2 - kg) Şablonları</label>
            <select id="hc-inkk-m2-pres" onchange="hcInkkM2Secildi()">
                <option value="">-- Serbest Değer --</option>
                <option value="7.346e22">Ay (7.346 x 10²² kg)</option>
                <option value="5.972e24">Dünya (5.972 x 10²⁴ kg)</option>
                <option value="70">Ortalama İnsan (70 kg)</option>
                <option value="1">1 Kilogramlık Test Kütlesi (1 kg)</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-inkk-m2">2. Kütle (m2 - kg)</label>
            <input type="number" step="any" id="hc-inkk-m2" value="7.346e22" placeholder="Örn: 7.346e22" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-inkk-mesafe-pres">Mesafe (r) Şablonları</label>
            <select id="hc-inkk-mesafe-pres" onchange="hcInkkMesafeSecildi()">
                <option value="">-- Serbest Değer --</option>
                <option value="384400000">Dünya - Ay Arası Mesafe (384,400 km)</option>
                <option value="149600000000">Dünya - Güneş Arası Mesafe (1 Astronomik Birim - AU)</option>
                <option value="6371000">Dünya Yarıçapı (Yüzeydeki Yerçekimi İçin: 6,371 km)</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-inkk-mesafe">Kütle Merkezleri Arasındaki Mesafe (r - metre)</label>
            <input type="number" step="any" id="hc-inkk-mesafe" value="384400000" placeholder="Örn: 3.844e8" required>
        </div>
        
        <button class="hc-btn" onclick="hcIkiNoktaArasindakiKutlecekimKuvvetiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-iki-nokta-arasindaki-kutlecekim-kuvveti-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
