<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gun_dogumu_saati_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gun-dogumu-saati-hesaplama',
        HC_PLUGIN_URL . 'modules/gun-dogumu-saati-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gun-dogumu-saati-hesaplama-css',
        HC_PLUGIN_URL . 'modules/gun-dogumu-saati-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gun-dogumu-saati-hesaplama">
        <h3>Gün Doğumu Saati Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-gds-sehir">Şehir Seçin (Hızlı Doldur)</label>
            <select id="hc-gds-sehir" onchange="hcGdsSehirSecildi()">
                <option value="">-- Şehir Seçin (İsteğe Bağlı) --</option>
                <option value="39.93|32.85">Ankara</option>
                <option value="41.00|28.97">İstanbul</option>
                <option value="38.42|27.14">İzmir</option>
                <option value="37.00|35.32">Adana</option>
                <option value="36.88|30.70">Antalya</option>
                <option value="40.18|29.06">Bursa</option>
                <option value="37.87|32.48">Konya</option>
                <option value="41.38|36.33">Samsun</option>
                <option value="41.00|39.72">Trabzon</option>
                <option value="38.35|38.30">Malatya</option>
                <option value="37.16|38.79">Şanlıurfa</option>
                <option value="39.75|37.01">Sivas</option>
                <option value="38.50|43.37">Van</option>
                <option value="40.75|30.38">Sakarya</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-gds-enlem">Enlem (° Derece)</label>
            <input type="number" step="any" id="hc-gds-enlem" value="39.93" placeholder="Örn: 41.00" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-gds-boylam">Boylam (° Derece)</label>
            <input type="number" step="any" id="hc-gds-boylam" value="32.85" placeholder="Örn: 28.97" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-gds-tarih">Tarih</label>
            <input type="date" id="hc-gds-tarih" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-gds-gmt">Saat Dilimi (GMT)</label>
            <select id="hc-gds-gmt">
                <option value="3" selected>GMT +3 (Türkiye Standart Saati)</option>
                <option value="2">GMT +2</option>
                <option value="1">GMT +1</option>
                <option value="0">GMT 0 (UTC)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcGunDogumuSaatiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-gun-dogumu-saati-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var dateInput = document.getElementById('hc-gds-tarih');
            if(dateInput) {
                var today = new Date();
                var yyyy = today.getFullYear();
                var mm = String(today.getMonth() + 1).padStart(2, '0');
                var dd = String(today.getDate()).padStart(2, '0');
                dateInput.value = yyyy + '-' + mm + '-' + dd;
            }
        });
    </script>
    <?php
}
