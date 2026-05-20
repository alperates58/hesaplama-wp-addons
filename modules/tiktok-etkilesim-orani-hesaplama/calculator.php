<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tiktok_etkilesim_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tiktok-etkilesim-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/tiktok-etkilesim-orani-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-tiktok-etkilesim">
        <h3>TikTok Etkileşim Oranı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-tt-takipci">Takipçi Sayısı</label>
            <input type="number" id="hc-tt-takipci" min="1" placeholder="örn: 25000" />
        </div>

        <div class="hc-form-group">
            <label for="hc-tt-izlenme">Toplam İzlenme (Görüntülenme)</label>
            <input type="number" id="hc-tt-izlenme" min="1" placeholder="örn: 50000" />
        </div>

        <div class="hc-form-group">
            <label for="hc-tt-begeni">Toplam Beğeni Sayısı</label>
            <input type="number" id="hc-tt-begeni" min="0" placeholder="örn: 3500" />
        </div>

        <div class="hc-form-group">
            <label for="hc-tt-yorum">Toplam Yorum Sayısı</label>
            <input type="number" id="hc-tt-yorum" min="0" placeholder="örn: 120" />
        </div>

        <div class="hc-form-group">
            <label for="hc-tt-paylasim">Toplam Paylaşım Sayısı</label>
            <input type="number" id="hc-tt-paylasim" min="0" placeholder="örn: 80" />
        </div>

        <button class="hc-btn" onclick="hcTiktokEtkilesimOraniHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-tiktok-etkilesim-result">
            <table>
                <tr>
                    <td>İzlenmeye Göre Etkileşim Oranı</td>
                    <td><strong class="hc-result-value" id="hc-tt-res-izlenme-oran" style="color: var(--hc-front-green);">-</strong></td>
                </tr>
                <tr>
                    <td>Takipçiye Göre Etkileşim Oranı</td>
                    <td><strong class="hc-result-value" id="hc-tt-res-takipci-oran">-</strong></td>
                </tr>
                <tr>
                    <td>Toplam Etkileşim Adedi</td>
                    <td><strong id="hc-tt-res-toplam">-</strong></td>
                </tr>
                <tr>
                    <td>Hesap Performansı Değerlendirmesi</td>
                    <td><strong id="hc-tt-res-durum">-</strong></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
