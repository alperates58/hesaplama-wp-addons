<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_klima_btu_ihtiyaci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-klima-btu',
        HC_PLUGIN_URL . 'modules/klima-btu-ihtiyaci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-klima-btu-css',
        HC_PLUGIN_URL . 'modules/klima-btu-ihtiyaci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-klima-btu-ihtiyaci-hesaplama">
        <h3>Klima BTU İhtiyacı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-kbtu-alan">Oda Alanı (m²)</label>
            <input type="number" id="hc-kbtu-alan" placeholder="Örn: 25" min="1" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-kbtu-bolge">Yaşadığınız Bölge</label>
            <select id="hc-kbtu-bolge">
                <option value="385">Marmara / Karadeniz (%100 Nem Katsayısı - 385)</option>
                <option value="420">Ege / İç Anadolu (420)</option>
                <option value="445">Akdeniz / Güneydoğu Anadolu (445)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-kbtu-kisi">Odada Genellikle Bulunan Kişi Sayısı</label>
            <input type="number" id="hc-kbtu-kisi" value="2" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-kbtu-gunes">Güneş Işığı Durumu</label>
            <select id="hc-kbtu-gunes">
                <option value="1.0">Normal / Standart</option>
                <option value="1.1">Çok Güneş Alan Oda (+%10)</option>
                <option value="0.9">Az Güneş Alan / Gölgeli Oda (-%10)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-kbtu-isi">Ek Isı Yayan Cihaz Yoğunluğu (Aydınlatma, Bilgisayar vb.)</label>
            <select id="hc-kbtu-isi">
                <option value="0">Düşük (Sadece standart aydınlatma)</option>
                <option value="1200">Orta (+1,200 BTU - Bilgisayar, TV vb.)</option>
                <option value="2400">Yüksek (+2,400 BTU - Sürekli çalışan cihazlar)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcKlimaBtuHesapla()">BTU İhtiyacını Hesapla</button>
        
        <div class="hc-result" id="hc-kbtu-result">
            <h4>Hesaplama Detayları:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Oda Alanı Bazlı İhtiyaç</td>
                        <td id="hc-kbtu-res-alan">0 BTU</td>
                    </tr>
                    <tr>
                        <td>Kişi Sayısı Kaynaklı İhtiyaç</td>
                        <td id="hc-kbtu-res-kisi">0 BTU</td>
                    </tr>
                    <tr>
                        <td>Cihazlar Kaynaklı Ek İhtiyaç</td>
                        <td id="hc-kbtu-res-cihaz">0 BTU</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Toplam Gerekli Kapasite</td>
                        <td id="hc-kbtu-res-toplam">0 BTU</td>
                    </tr>
                    <tr style="font-weight:bold;">
                        <td>Önerilen Klima Boyutu</td>
                        <td id="hc-kbtu-res-oneri" style="color:var(--hc-front-green);">9.000 BTU</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}