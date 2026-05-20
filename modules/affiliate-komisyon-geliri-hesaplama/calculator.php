<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_affiliate_komisyon_geliri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-affiliate-komisyon-geliri-hesaplama',
        HC_PLUGIN_URL . 'modules/affiliate-komisyon-geliri-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    ?>
    <div class="hc-calculator" id="hc-affiliate-komisyon">
        <h3>Affiliate Komisyon Geliri Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-af-ziyaretci">Dönemlik Toplam Trafik (Ziyaretçi / Erişim)</label>
            <input type="number" id="hc-af-ziyaretci" min="1" placeholder="örn: 50000" />
        </div>

        <div class="hc-form-group">
            <label for="hc-af-ctr">Link Tıklama Oranı - CTR (%)</label>
            <input type="number" id="hc-af-ctr" min="0.01" max="100" step="0.01" value="2.0" />
            <small style="color:#666;font-size:12px;">Ziyaretçilerin yüzde kaçının paylaştığınız linke tıkladığı.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-af-cr">Satışa Dönüşüm Oranı - CR (%)</label>
            <input type="number" id="hc-af-cr" min="0.01" max="100" step="0.01" value="1.5" />
            <small style="color:#666;font-size:12px;">Linke tıklayanların yüzde kaçının satın alım yaptığı.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-af-sepet">Ortalama Sepet / Ürün Tutarı (₺)</label>
            <input type="number" id="hc-af-sepet" min="1" placeholder="örn: 750" value="500" />
        </div>

        <div class="hc-form-group">
            <label for="hc-af-komisyon">Ortalama Komisyon Oranı (%)</label>
            <input type="number" id="hc-af-komisyon" min="0.1" max="100" step="0.1" value="10.0" />
        </div>

        <button class="hc-btn" onclick="hcAffiliateKomisyonGeliriHesapla()">Gelir Hesapla</button>

        <div class="hc-result" id="hc-affiliate-komisyon-result">
            <table>
                <tr>
                    <td>Tahmini Link Tıklama Sayısı</td>
                    <td><strong id="hc-af-res-tiklama">-</strong></td>
                </tr>
                <tr>
                    <td>Tahmini Gerçekleşen Satış Adedi</td>
                    <td><strong id="hc-af-res-satis">-</strong></td>
                </tr>
                <tr>
                    <td>Yönlendirilen Toplam Satış Cirosu</td>
                    <td><strong id="hc-af-res-ciro">-</strong></td>
                </tr>
                <tr>
                    <td>Net Komisyon Kazancınız</td>
                    <td><strong class="hc-result-value" id="hc-af-res-kazanc" style="color: var(--hc-front-green);">-</strong></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}
