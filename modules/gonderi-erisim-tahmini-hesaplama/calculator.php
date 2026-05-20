<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gonderi_erisim_tahmini_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gonderi-erisim-tahmini-hesaplama',
        HC_PLUGIN_URL . 'modules/gonderi-erisim-tahmini-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-gonderi-erisim-tahmini">
        <h3>Gönderi Erişim Tahmini Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-get-takipci">Takipçi Sayısı</label>
            <input type="number" id="hc-get-takipci" min="1" placeholder="örn: 15000" />
        </div>

        <div class="hc-form-group">
            <label for="hc-get-platform">Sosyal Medya Platformu</label>
            <select id="hc-get-platform">
                <option value="instagram">Instagram</option>
                <option value="facebook">Facebook</option>
                <option value="linkedin">LinkedIn</option>
                <option value="twitter">X (Twitter)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-get-tur">İçerik Türü</label>
            <select id="hc-get-tur">
                <option value="reels">Reels / Video / Kısa Video</option>
                <option value="carousel">Carousel / Çoklu Görsel</option>
                <option value="image">Tek Görsel / Fotoğraf</option>
                <option value="text">Sadece Metin / Durum</option>
                <option value="story">Hikaye (Story)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-get-etkilesim">Beklenen Etkileşim Seviyesi</label>
            <select id="hc-get-etkilesim">
                <option value="orta">Orta / Standart (%3-%5)</option>
                <option value="dusuk">Düşük (%1-%3)</option>
                <option value="yuksek">Yüksek (%5-%10)</option>
                <option value="viral">Viral / Çok Yüksek (>%10)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcGonderiErisimTahminiHesapla()">Erişim Tahmin Et</button>

        <div class="hc-result" id="hc-gonderi-erisim-tahmini-result">
            <table>
                <tr>
                    <td>Tahmini Erişim Aralığı</td>
                    <td><strong class="hc-result-value" id="hc-get-res-aralik" style="color: var(--hc-front-green);">-</strong></td>
                </tr>
                <tr>
                    <td>Tahmini Ortalama Erişim</td>
                    <td><strong id="hc-get-res-ortalama">-</strong></td>
                </tr>
                <tr>
                    <td>Takipçiye Göre Ortalama Erişim Oranı</td>
                    <td><strong id="hc-get-res-oran">-</strong></td>
                </tr>
                <tr>
                    <td>Büyüme Potansiyeli Etkisi</td>
                    <td><strong id="hc-get-res-tavsiye">-</strong></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
