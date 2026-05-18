<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_watt_saat_aku_kapasitesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-watt-saat-aku-kapasitesi-hesaplama',
        HC_PLUGIN_URL . 'modules/watt-saat-aku-kapasitesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-watt-saat-aku-kapasitesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/watt-saat-aku-kapasitesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-watt-saat-aku-kapasitesi-hesaplama">
        <div class="hc-cal-header">
            <h3>Watt-Saat Akü Kapasitesi Hesaplama</h3>
            <p>Akü, pil veya powerbank kapasitesini nominal voltaj değerini kullanarak Amper-saat (Ah) ve Watt-saat (Wh) birimleri arasında dönüştürür.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-wsa-mode">Hesaplama Tipi</label>
            <select id="hc-wsa-mode" class="hc-select" onchange="hcWattSaatAkuModDegisti()">
                <option value="to_ah">Watt-saat (Wh) ➔ Amper-saat (Ah)</option>
                <option value="to_wh">Amper-saat (Ah) ➔ Watt-saat (Wh)</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-wsa-wh-group">
            <label for="hc-wsa-wh">Enerji Kapasitesi (Watt-saat - Wh)</label>
            <input type="number" id="hc-wsa-wh" class="hc-input" placeholder="örn. 99 (çoğu uçak limiti)" step="any" min="0">
        </div>

        <div class="hc-form-group" id="hc-wsa-ah-group" style="display:none;">
            <label for="hc-wsa-ah">Akım Kapasitesi (Amper-saat - Ah)</label>
            <input type="number" id="hc-wsa-ah" class="hc-input" placeholder="örn. 20 (örn. 20000 mAh)" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-wsa-voltage">Nominal Voltaj (Volt - V)</label>
            <select id="hc-wsa-voltage-select" class="hc-select" onchange="hcWattSaatAkuVoltajDegisti()">
                <option value="3.7">3.7 V (Standart Lityum-İyon Pil Hücresi)</option>
                <option value="5.0">5.0 V (USB Çıkış Voltajı)</option>
                <option value="12.0">12.0 V (Standart Araç Aküsü / Kurşun-Asit)</option>
                <option value="24.0">24.0 V (Kamyon / Tekne Akü Grubu)</option>
                <option value="48.0">48.0 V (Güneş Enerjisi / UPS Deposu)</option>
                <option value="custom">Özel Voltaj Gir...</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-wsa-custom-v-group" style="display:none;">
            <label for="hc-wsa-custom-v">Özel Voltaj Değeri (Volt - V)</label>
            <input type="number" id="hc-wsa-custom-v" class="hc-input" placeholder="örn. 11.1" step="any" min="0.1">
        </div>

        <button class="hc-btn" onclick="hcWattSaatAkuHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-watt-saat-aku-kapasitesi-hesaplama-result">
            <div class="hc-result-title">Kapasite Dönüşüm Sonuçları</div>
            <div class="hc-result-item">
                <span class="hc-result-label" id="hc-wsa-res-label">Hesaplanan Kapasite:</span>
                <span class="hc-result-value" id="hc-wsa-res-val">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Miliamper-saat (mAh) Karşılığı:</span>
                <span class="hc-result-value" id="hc-wsa-res-mah">-</span>
            </div>
            <div class="hc-result-desc" id="hc-wsa-desc"></div>
        </div>
    </div>
    <?php
}
