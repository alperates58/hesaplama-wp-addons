<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hisse_geri_alim_etkisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-share-buyback',
        HC_PLUGIN_URL . 'modules/hisse-geri-alim-etkisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-share-buyback-css',
        HC_PLUGIN_URL . 'modules/hisse-geri-alim-etkisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hisse-geri-alim-etkisi-hesaplama">
        <h3>Hisse Geri Alım Etkisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-hga-adet">Mevcut Ödenmiş Hisse Senedi Adedi (Lot)</label>
            <input type="number" id="hc-hga-adet" value="100000000" min="1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-hga-fiyat">Cari Hisse Fiyatı (₺)</label>
            <input type="number" id="hc-hga-fiyat" value="45" min="0.1" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-hga-kar">Yıllık Net Kar (₺)</label>
            <input type="number" id="hc-hga-kar" value="350000000" min="1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-hga-butce">Geri Alım İçin Ayrılan Toplam Bütçe (₺)</label>
            <input type="number" id="hc-hga-butce" value="150000000" min="1000">
        </div>
        <button class="hc-btn" onclick="hcHisseGeriAlimHesapla()">Etki Analizini Başlat</button>
        
        <div class="hc-result" id="hc-hga-result">
            <h4>Geri Alım Performans Etkisi:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Geri Alınacak Tahmini Lot Miktarı</td>
                        <td id="hc-hga-res-lot">0 Lot</td>
                    </tr>
                    <tr>
                        <td>Eski Hisse Başı Kar (EPS)</td>
                        <td id="hc-hga-res-eski-eps">0.00 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Yeni Hisse Başı Kar (EPS)</td>
                        <td id="hc-hga-res-yeni-eps">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Hisse Başı Kar Artış Yüzdesi</td>
                        <td id="hc-hga-res-artis" style="font-weight:bold;">%0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}