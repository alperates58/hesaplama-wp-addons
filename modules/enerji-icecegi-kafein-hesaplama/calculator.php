<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_enerji_icecegi_kafein_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-enerji-icecegi-kafein-hesaplama',
        HC_PLUGIN_URL . 'modules/enerji-icecegi-kafein-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-enerji-icecegi-kafein-hesaplama-css',
        HC_PLUGIN_URL . 'modules/enerji-icecegi-kafein-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-enerji-icecegi-kafein-hesaplama">
        <h3>Enerji İçeceği Kafein Miktarı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-eikh-tip">Enerji İçeceği Türü</label>
            <select id="hc-eikh-tip">
                <option value="standart">Standart Enerji İçeceği (32mg/100ml)</option>
                <option value="yuksek">Yüksek Kafeinli (45mg/100ml)</option>
                <option value="ozel">Özel Değer...</option>
            </select>
        </div>

        <div id="hc-eikh-ozel-group" style="display:none;">
            <div class="hc-form-group">
                <label for="hc-eikh-mg">Kafein Oranı (mg / 100ml)</label>
                <input type="number" id="hc-eikh-mg" placeholder="Örn: 32">
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-eikh-hacim">Kutu Boyutu (ml)</label>
            <select id="hc-eikh-hacim">
                <option value="250">250 ml (Küçük Kutu)</option>
                <option value="330">330 ml (Standart Kutu)</option>
                <option value="500">500 ml (Büyük Kutu)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-eikh-adet">Kaç Kutu İçildi?</label>
            <input type="number" id="hc-eikh-adet" value="1" min="1">
        </div>
        
        <button class="hc-btn" onclick="hcEnerjiKafeinHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-enerji-icecegi-kafein-hesaplama-result">
            <div style="text-align: center;">
                <span style="display: block; font-size: 14px; color: var(--hc-front-muted);">Toplam Kafein Miktarı</span>
                <span class="hc-result-value" id="hc-eikh-res-toplam">0 mg</span>
            </div>
            
            <div id="hc-eikh-res-uyari" style="margin-top: 20px; padding: 15px; border-radius: 12px; font-size: 14px; line-height: 1.5; font-weight: 600; text-align: center;">
            </div>

            <p style="font-size: 12px; color: var(--hc-front-muted); margin-top: 15px; font-style: italic;">
                * Enerji içecekleri sadece kafein değil, yüksek oranda şeker, taurin ve diğer uyarıcıları da içerir. Kalp rahatsızlığı olanlar ve çocuklar için önerilmez.
            </p>
        </div>
    </div>

    <script>
    document.getElementById('hc-eikh-tip').addEventListener('change', function() {
        document.getElementById('hc-eikh-ozel-group').style.display = this.value === 'ozel' ? 'block' : 'none';
    });
    </script>
    <?php
}
