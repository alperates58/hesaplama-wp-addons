<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yalitim_tasarruf_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-insulation',
        HC_PLUGIN_URL . 'modules/yalitim-tasarruf-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-insulation-css',
        HC_PLUGIN_URL . 'modules/yalitim-tasarruf-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yalitim-tasarruf-hesaplama">
        <h3>Yalıtım Tasarruf Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-yth-maliyet">Yıllık Ortalama Isınma / Soğutma Gideriniz (₺)</label>
            <input type="number" id="hc-yth-maliyet" placeholder="Örn: 25000" min="1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-yth-bina">Bina Konumu / Kat Durumu</label>
            <select id="hc-yth-bina">
                <option value="1.1">Çatı Katı veya Zemin Kat (Isı Kaybı Çok Yüksek)</option>
                <option value="1.0" selected>Ara Kat / Apartman Dairesi (Orta Derece Isı Kaybı)</option>
                <option value="1.2">Müstakil Ev / Villa (Her Yöne Açık Cephe)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-yth-kalinlik">Dış Cephe Mantolama Kalınlığı</label>
            <select id="hc-yth-kalinlik">
                <option value="0.35">3 cm Mantolama</option>
                <option value="0.50" selected>5 cm Standart Mantolama</option>
                <option value="0.60">8 cm Kalın Mantolama</option>
                <option value="0.68">10 cm ve üzeri Pasif Ev Standardı</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-yth-malzeme">Mantolama Malzemesi</label>
            <select id="hc-yth-malzeme">
                <option value="1.0" selected>EPS / Karbonlu EPS (Standart)</option>
                <option value="1.05">XPS (Su Geçirimsiz, Sert)</option>
                <option value="1.1">Taşyünü (Yüksek Isı ve Yangın Dayanımı)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcYalitimTasarrufHesapla()">Tasarruf Analizini Çalıştır</button>
        
        <div class="hc-result" id="hc-yth-result">
            <h4>Tasarruf ve Geri Ödeme Analizi:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Tasarruf Oranı</td>
                        <td id="hc-yth-res-oran">%0</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Yıllık Tahmini Tasarruf Tutarı</td>
                        <td id="hc-yth-res-yillik">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>10 Yıllık Toplam Kazanç</td>
                        <td id="hc-yth-res-on-yil">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Karbon (CO₂) Azaltım Katkısı</td>
                        <td id="hc-yth-res-co2">0 kg CO₂ / yıl</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}