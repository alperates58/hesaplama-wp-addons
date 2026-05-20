<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_instagram_etkilesim_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-instagram-etkilesim-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/instagram-etkilesim-orani-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-instagram-etkilesim">
        <h3>Instagram Etkileşim Oranı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ig-takipci">Takipçi Sayısı</label>
            <input type="number" id="hc-ig-takipci" min="1" placeholder="örn: 10000" />
        </div>

        <div class="hc-form-group">
            <label for="hc-ig-erisim">Erişilen Hesap Sayısı (Opsiyonel)</label>
            <input type="number" id="hc-ig-erisim" min="0" placeholder="Erişime göre hesaplama için girin" />
        </div>

        <div class="hc-form-group">
            <label for="hc-ig-begeni">Toplam Beğeni Sayısı</label>
            <input type="number" id="hc-ig-begeni" min="0" placeholder="örn: 450" />
        </div>

        <div class="hc-form-group">
            <label for="hc-ig-yorum">Toplam Yorum Sayısı</label>
            <input type="number" id="hc-ig-yorum" min="0" placeholder="örn: 35" />
        </div>

        <div class="hc-form-group">
            <label for="hc-ig-kaydetme">Toplam Kaydetme Sayısı</label>
            <input type="number" id="hc-ig-kaydetme" min="0" placeholder="örn: 15" />
        </div>

        <div class="hc-form-group">
            <label for="hc-ig-paylasim">Toplam Paylaşım Sayısı</label>
            <input type="number" id="hc-ig-paylasim" min="0" placeholder="örn: 20" />
        </div>

        <button class="hc-btn" onclick="hcInstagramEtkilesimOraniHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-instagram-etkilesim-result">
            <table>
                <tr>
                    <td>Takipçiye Göre Etkileşim Oranı</td>
                    <td><strong class="hc-result-value" id="hc-ig-res-takipci-oran">-</strong></td>
                </tr>
                <tr id="hc-ig-erisim-row" style="display: none;">
                    <td>Erişime Göre Etkileşim Oranı</td>
                    <td><strong class="hc-result-value" id="hc-ig-res-erisim-oran" style="color: var(--hc-front-green);">-</strong></td>
                </tr>
                <tr>
                    <td>Toplam Etkileşim Adedi</td>
                    <td><strong id="hc-ig-res-toplam">-</strong></td>
                </tr>
                <tr>
                    <td>Hesap Durumu Değerlendirmesi</td>
                    <td><strong id="hc-ig-res-durum">-</strong></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
