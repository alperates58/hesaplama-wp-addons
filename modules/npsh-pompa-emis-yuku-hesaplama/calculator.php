<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_npsh_pompa_emis_yuku_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-npsh',
        HC_PLUGIN_URL . 'modules/npsh-pompa-emis-yuku-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-npsh">
        <h3>NPSH (Net Pozitif Emme Yükü) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-npsh-ha">Atmosferik Basınç Başlığı (Ha - m)</label>
            <input type="number" id="hc-npsh-ha" placeholder="Deniz seviyesi ~10.33m" step="any" value="10.33">
        </div>

        <div class="hc-form-group">
            <label for="hc-npsh-hs">Statik Emme Yüksekliği (Hs - m)</label>
            <input type="number" id="hc-npsh-hs" placeholder="Pozitif (yukarıda) veya Negatif (aşağıda)" step="any">
            <small>Sıvı seviyesi pompa ekseninin üzerindeyse pozitif girin.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-npsh-hvp">Buhar Basıncı Başlığı (Hvp - m)</label>
            <input type="number" id="hc-npsh-hvp" placeholder="m" step="any" value="0.24">
            <small>Su için 20°C'de ~0.24m.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-npsh-hf">Emme Hattı Sürtünme Kayıpları (Hf - m)</label>
            <input type="number" id="hc-npsh-hf" placeholder="m" step="any">
        </div>

        <button class="hc-btn" onclick="hcNpshHesapla()">NPSHa Hesapla</button>

        <div class="hc-result" id="hc-npsh-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Mevcut NPSH (NPSHa):</span>
                <span class="hc-result-value" id="hc-npsh-res-total">--</span>
                <span class="hc-result-unit">metre</span>
            </div>
            <p id="hc-npsh-warning" style="color:#e74c3c; font-weight:600; text-align:center; display:none;">
                Uyarı: NPSHa < NPSHr ise kavitasyon riski yüksektir!
            </p>
        </div>
    </div>
    <?php
}
