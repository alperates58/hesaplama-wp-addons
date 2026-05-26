<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ekran_suresi_etki_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-screen-effect',
        HC_PLUGIN_URL . 'modules/ekran-suresi-etki-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-screen-effect-css',
        HC_PLUGIN_URL . 'modules/ekran-suresi-etki-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ekran-suresi-etki-hesaplama">
        <h3>Ekran Süresi Etki Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ese-saat">Günlük Ortalama Ekran Süresi (Saat)</label>
            <input type="number" id="hc-ese-saat" value="6" min="1" max="24" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ese-filtre">Mavi Işık Filtresi / Gece Modu Kullanımı</label>
            <select id="hc-ese-filtre">
                <option value="0.5">Her zaman açık / Sürekli filtreli</option>
                <option value="0.8" selected>Sadece akşamları açık</option>
                <option value="1.2">Hiç kullanmıyorum</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-ese-uyku">Yatmadan Kaç Dakika Önce Ekrana Bakmayı Bırakıyorsunuz?</label>
            <select id="hc-ese-uyku">
                <option value="0">Yatakta dahi bakıyorum (0 dk)</option>
                <option value="10">10 - 30 dakika önce</option>
                <option value="30" selected>30 - 60 dakika önce</option>
                <option value="60">60+ dakika önce</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-ese-sikayet">Göz Kuruluğu / Yorgunluğu Şikayetleriniz</label>
            <select id="hc-ese-sikayet">
                <option value="0">Yok</option>
                <option value="2" selected>Hafif / Bazen</option>
                <option value="5">Ciddi / Sürekli</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcEkranEtkisiHesapla()">Ekran Etkisini Analiz Et</button>
        
        <div class="hc-result" id="hc-ese-result">
            <h4>Etki Analiz Sonucu:</h4>
            <table>
                <tbody>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Olumsuz Etki Skoru</td>
                        <td id="hc-ese-res-skor">%0</td>
                    </tr>
                    <tr>
                        <td>Göz Sağlığı Riski</td>
                        <td id="hc-ese-res-goz">Normal</td>
                    </tr>
                    <tr>
                        <td>Melatonin / Uyku Kalitesi Engeli</td>
                        <td id="hc-ese-res-uyku">Düşük Etki</td>
                    </tr>
                    <tr>
                        <td>Koruyucu Tavsiyeler</td>
                        <td id="hc-ese-res-tavsiye">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}