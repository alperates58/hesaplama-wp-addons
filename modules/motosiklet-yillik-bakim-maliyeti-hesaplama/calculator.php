<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_motosiklet_yillik_bakim_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-moto-maint',
        HC_PLUGIN_URL . 'modules/motosiklet-yillik-bakim-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-moto-maint-css',
        HC_PLUGIN_URL . 'modules/motosiklet-yillik-bakim-maliyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-motosiklet-yillik-bakim-maliyeti-hesaplama">
        <h3>Motosiklet Yıllık Bakım Maliyeti Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-myb-km">Yıllık Ortalama Sürüş Mesafesi (km)</label>
            <input type="number" id="hc-myb-km" value="8000" min="500">
        </div>
        <div class="hc-form-group">
            <label for="hc-myb-periyot">Motosiklet Bakım Aralığı (km / Yağ Değişimi)</label>
            <select id="hc-myb-periyot">
                <option value="3000">Her 3.000 km'de bir (Scooter/Küçük cc)</option>
                <option value="5000" selected>Her 5.000 km'de bir (Orta cc / Standart)</option>
                <option value="10000">Her 10.000 km'de bir (Büyük cc / Premium)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-myb-yagfiyat">Tek Rutin Periyodik Bakım Maliyeti (Yağ + Filtre + İşçilik - ₺)</label>
            <input type="number" id="hc-myb-yagfiyat" value="1800" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-myb-lastikfiyat">Lastik Takım Değişim Maliyeti (₺)</label>
            <input type="number" id="hc-myb-lastikfiyat" value="8000" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-myb-zincirfiyat">Zincir & Dişli Takımı Değişim Maliyeti (₺)</label>
            <input type="number" id="hc-myb-zincirfiyat" value="3500" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-myb-balatafiyat">Ön/Arka Fren Balata Değişim Maliyeti (₺)</label>
            <input type="number" id="hc-myb-balatafiyat" value="1500" min="0">
        </div>
        <button class="hc-btn" onclick="hcMotoBakimHesapla()">Yıllık Bakım Maliyetini Çıkar</button>
        
        <div class="hc-result" id="hc-myb-result">
            <h4>Yıllık Aşınma ve Bakım Giderleri:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Rutin Periyodik Bakım Gideri</td>
                        <td id="hc-myb-res-rutin">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Yıllık Lastik Aşınma Payı</td>
                        <td id="hc-myb-res-lastik">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Yıllık Zincir & Dişli Aşınma Payı</td>
                        <td id="hc-myb-res-zincir">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Yıllık Fren Balatası Aşınma Payı</td>
                        <td id="hc-myb-res-balata">0.00 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Toplam Yıllık Tahmini Bakım Gideri</td>
                        <td id="hc-myb-res-toplam">0.00 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}