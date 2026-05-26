php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_seyahat_gunluk_harc_tahmini_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-daily-pocket',
        HC_PLUGIN_URL . 'modules/seyahat-gunluk-harc-tahmini-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-daily-pocket-css',
        HC_PLUGIN_URL . 'modules/seyahat-gunluk-harc-tahmini-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-seyahat-gunluk-harc-tahmini-hesaplama">
        <h3>Seyahat Günlük Harç Tahmini</h3>
        <div class="hc-form-group">
            <label for="hc-sgh-sehir">Hedef Şehir / Bölge</label>
            <select id="hc-sgh-sehir">
                <option value="1.5" selected>Batı Avrupa / Amerika (Londra, Paris, NY)</option>
                <option value="1.0">Doğu Avrupa (Budapeşte, Prag, Varşova)</option>
                <option value="0.5">Güneydoğu Asya (Bangkok, Bali, Vietnam)</option>
                <option value="0.8">Akdeniz / Ege (Atina, İspanya Sahilleri)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-sgh-stil">Seyahat Tarzınız / Standartlarınız</label>
            <select id="hc-sgh-stil">
                <option value="budget" selected>Ekonomik (Hostel + Sokak Lezzetleri / Market)</option>
                <option value="medium">Standart (Orta sınıf otel + Restoran yemekleri)</option>
                <option value="luxury">Lüks (Premium otel + Lüks restoranlar & Taksiler)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-sgh-gun">Seyahat Süresi (Gün)</label>
            <input type="number" id="hc-sgh-gun" value="5" min="1">
        </div>
        <button class="hc-btn" onclick="hcDailyPocketHesapla()">Günlük Harçlığı Tahmin Et</button>
        
        <div class="hc-result" id="hc-sgh-result">
            <h4>Bütçe Dağılım Tahminleri:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Günlük Önerilen Harçlık (Döviz)</td>
                        <td id="hc-sgh-res-gunluk">0.00</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Toplam İhtiyaç Duyulan Cep Harçlığı</td>
                        <td id="hc-sgh-res-toplam">0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}