<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sponsorlu_icerik_fiyat_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sponsorlu-icerik-fiyat-hesaplama',
        HC_PLUGIN_URL . 'modules/sponsorlu-icerik-fiyat-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-sponsorlu-fiyat">
        <h3>Sponsorlu İçerik Fiyat Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-sif-takipci">Takipçi / Abone Sayısı</label>
            <input type="number" id="hc-sif-takipci" min="1" placeholder="örn: 50000" />
        </div>

        <div class="hc-form-group">
            <label for="hc-sif-platform">Platform</label>
            <select id="hc-sif-platform">
                <option value="instagram">Instagram</option>
                <option value="youtube">YouTube</option>
                <option value="tiktok">TikTok</option>
                <option value="blog">Blog / Web Sitesi</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-sif-tur">İçerik Türü</label>
            <select id="hc-sif-tur">
                <option value="video">Özel Dedicated Video / Reels / TikTok Videosu</option>
                <option value="post">Gönderi / Post / Tanıtım Yazısı</option>
                <option value="story">Hikaye (Story / Geçişli Link)</option>
                <option value="mention">Kısa Bahsetme (Mention / Pre-roll)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-sif-kategori">Kategori / Niş</label>
            <select id="hc-sif-kategori">
                <option value="teknoloji">Teknoloji / Yazılım / Donanım</option>
                <option value="finans">Finans / Yatırım / Kripto</option>
                <option value="moda">Güzellik / Moda / Yaşam</option>
                <option value="eglence">Eğlence / Mizah / Oyun</option>
                <option value="egitim">Kişisel Gelişim / Eğitim / Kariyer</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-sif-etkilesim">Ortalama Gönderi Etkileşim Oranı (%)</label>
            <input type="number" id="hc-sif-etkilesim" min="0.1" step="0.1" value="3.0" />
        </div>

        <button class="hc-btn" onclick="hcSponsorluIcerikFiyatHesapla()">Önerilen Fiyatı Hesapla</button>

        <div class="hc-result" id="hc-sponsorlu-fiyat-result">
            <table>
                <tr>
                    <td>Tavsiye Edilen Taban Ücret</td>
                    <td><strong id="hc-sif-res-taban">-</strong></td>
                </tr>
                <tr>
                    <td>Tavsiye Edilen Ortalama Ücret</td>
                    <td><strong class="hc-result-value" id="hc-sif-res-ortalama" style="color: var(--hc-front-blue);">-</strong></td>
                </tr>
                <tr>
                    <td>Tavsiye Edilen Tavan Ücret</td>
                    <td><strong id="hc-sif-res-tavan">-</strong></td>
                </tr>
                <tr>
                    <td>Etkileşim Kalite Etkisi</td>
                    <td><strong id="hc-sif-res-kalite">-</strong></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
