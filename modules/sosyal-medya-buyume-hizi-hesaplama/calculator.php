<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sosyal_medya_buyume_hizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sosyal-medya-buyume-hizi-hesaplama',
        HC_PLUGIN_URL . 'modules/sosyal-medya-buyume-hizi-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-sosyal-medya-buyume">
        <h3>Sosyal Medya Büyüme Hızı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-smb-baslangic">Dönem Başı Takipçi Sayısı</label>
            <input type="number" id="hc-smb-baslangic" min="1" placeholder="örn: 5000" />
        </div>

        <div class="hc-form-group">
            <label for="hc-smb-bitis">Dönem Sonu Takipçi Sayısı</label>
            <input type="number" id="hc-smb-bitis" min="1" placeholder="örn: 6200" />
        </div>

        <div class="hc-form-group">
            <label for="hc-smb-gun">Geçen Süre (Gün)</label>
            <input type="number" id="hc-smb-gun" min="1" value="30" />
        </div>

        <button class="hc-btn" onclick="hcSosyalMedyaBuyumeHiziHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-sosyal-medya-buyume-result">
            <table>
                <tr>
                    <td>Toplam Büyüme Oranı</td>
                    <td><strong class="hc-result-value" id="hc-smb-res-toplam-oran">-</strong></td>
                </tr>
                <tr>
                    <td>Günlük Ortalama Büyüme Hızı</td>
                    <td><strong id="hc-smb-res-gunluk-oran">-</strong></td>
                </tr>
                <tr>
                    <td>Aylık Ortalama Büyüme Hızı</td>
                    <td><strong id="hc-smb-res-aylik-oran" style="color: var(--hc-front-green);">-</strong></td>
                </tr>
                <tr>
                    <td>Yıllık Tahmini Büyüme (Bileşik Hızla)</td>
                    <td><strong id="hc-smb-res-yillik-oran">-</strong></td>
                </tr>
                <tr>
                    <td>1 Yıl Sonra Tahmini Takipçi Sayısı</td>
                    <td><strong id="hc-smb-res-tahmin">-</strong></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
