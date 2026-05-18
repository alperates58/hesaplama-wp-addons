<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunes_acisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gunes-acisi-hesaplama',
        HC_PLUGIN_URL . 'modules/gunes-acisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gunes-acisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/gunes-acisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gunes-acisi-hesaplama">
        <h3>Güneş Açısı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ga3-sehir">Şehir Seçin (Hızlı Doldur)</label>
            <select id="hc-ga3-sehir" onchange="hcGa3SehirSecildi()">
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
            <label for="hc-ga3-enlem">Enlem (° Derece)</label>
            <input type="number" step="any" id="hc-ga3-enlem" value="39.93" placeholder="Örn: 41.00" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-ga3-boylam">Boylam (° Derece)</label>
            <input type="number" step="any" id="hc-ga3-boylam" value="32.85" placeholder="Örn: 28.97" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-ga3-tarih">Tarih</label>
            <input type="date" id="hc-ga3-tarih" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-ga3-saat">Yerel Saat (Saat:Dakika)</label>
            <input type="time" id="hc-ga3-saat" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-ga3-gmt">Saat Dilimi (GMT)</label>
            <select id="hc-ga3-gmt">
                <option value="3" selected>GMT +3 (Türkiye Standart Saati)</option>
                <option value="2">GMT +2</option>
                <option value="1">GMT +1</option>
                <option value="0">GMT 0 (UTC)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcGunesAcisiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-gunes-acisi-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var dateInput = document.getElementById('hc-ga3-tarih');
            var timeInput = document.getElementById('hc-ga3-saat');
            var today = new Date();
            
            if(dateInput) {
                var yyyy = today.getFullYear();
                var mm = String(today.getMonth() + 1).padStart(2, '0');
                var dd = String(today.getDate()).padStart(2, '0');
                dateInput.value = yyyy + '-' + mm + '-' + dd;
            }
            if(timeInput) {
                var hh = String(today.getHours()).padStart(2, '0');
                var min = String(today.getMinutes()).padStart(2, '0');
                timeInput.value = hh + ':' + min;
            }
        });
    </script>
    <?php
}
