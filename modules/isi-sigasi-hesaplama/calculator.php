<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_isi_sigasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-isi-sigasi-hesaplama',
        HC_PLUGIN_URL . 'modules/isi-sigasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-isi-sigasi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/isi-sigasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-isi-sigasi-hesaplama">
        <h3>Isı Sığası Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-is-malzeme">Malzeme (Hızlı Özgül Isı Seçimi)</label>
            <select id="hc-is-malzeme" onchange="hcIsMalzemeSecildi()">
                <option value="">-- Malzeme Seçin (İsteğe Bağlı) --</option>
                <option value="4184">Su (4184 J/(kg·°C))</option>
                <option value="2030">Buz (2030 J/(kg·°C))</option>
                <option value="450">Demir / Çelik (450 J/(kg·°C))</option>
                <option value="900">Alüminyum (900 J/(kg·°C))</option>
                <option value="385">Bakır (385 J/(kg·°C))</option>
                <option value="129">Altın (129 J/(kg·°C))</option>
                <option value="840">Beton (840 J/(kg·°C))</option>
                <option value="1700">Ahşap (~1700 J/(kg·°C))</option>
                <option value="139">Cıva (139 J/(kg·°C))</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-is-kutle">Kütle (m - kg)</label>
            <input type="number" step="any" id="hc-is-kutle" value="1.0" placeholder="Kütle kg" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-is-ozgul">Özgül Isı Kapasitesi (c - J/(kg·°C))</label>
            <input type="number" step="any" id="hc-is-ozgul" placeholder="Örn: 4184" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-is-deltaT">Sıcaklık Değişimi (ΔT - °C)</label>
            <input type="number" step="any" id="hc-is-deltaT" value="10" placeholder="Örn: 10" required>
        </div>
        
        <button class="hc-btn" onclick="hcIsiSigasiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-isi-sigasi-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
