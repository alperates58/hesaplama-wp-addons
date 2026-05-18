<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kararli_durum_isi_iletimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kararli-durum-isi-iletimi-hesaplama',
        HC_PLUGIN_URL . 'modules/kararli-durum-isi-iletimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kararli-durum-isi-iletimi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kararli-durum-isi-iletimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kararli-durum-isi-iletimi-hesaplama">
        <h3>Kararlı Durum Isı İletimi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-kdi-malzeme">Malzeme (Hızlı Seçim)</label>
            <select id="hc-kdi-malzeme" onchange="hcKdiMalzemeSecildi()">
                <option value="">-- Malzeme Seçin (İsteğe Bağlı) --</option>
                <option value="401">Bakır (401 W/(m·K))</option>
                <option value="237">Alüminyum (237 W/(m·K))</option>
                <option value="80">Demir / Çelik (~80 W/(m·K))</option>
                <option value="1.5">Beton (~1.5 W/(m·K))</option>
                <option value="1.0">Cam (~1.0 W/(m·K))</option>
                <option value="0.15">Ahşap (~0.15 W/(m·K))</option>
                <option value="0.04">Cam Yünü / Yalıtım (~0.04 W/(m·K))</option>
                <option value="0.026">Durgun Hava (0.026 W/(m·K))</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-kdi-iletkenlik">Isıl İletkenlik Katsayısı (k - W/(m·K))</label>
            <input type="number" step="any" id="hc-kdi-iletkenlik" placeholder="Örn: 401" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-kdi-alan">Kesit Alanı (A - m²)</label>
            <input type="number" step="any" id="hc-kdi-alan" value="2.0" placeholder="Örn: 2.0" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-kdi-kalinlik">Malzeme Kalınlığı (d - cm)</label>
            <input type="number" step="any" id="hc-kdi-kalinlik" value="10" placeholder="Örn: 10" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-kdi-thot">Sıcak Taraf Sıcaklığı (T_sıcak - °C)</label>
            <input type="number" step="any" id="hc-kdi-thot" value="22" placeholder="Örn: 22" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-kdi-tcold">Soğuk Taraf Sıcaklığı (T_soğuk - °C)</label>
            <input type="number" step="any" id="hc-kdi-tcold" value="2" placeholder="Örn: 2" required>
        </div>
        
        <button class="hc-btn" onclick="hcKararliDurumIsiIletimiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-kararli-durum-isi-iletimi-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
    ?>
