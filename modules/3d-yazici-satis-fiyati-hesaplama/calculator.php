<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_3d_yazici_satis_fiyati_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-3d-satis',
        HC_PLUGIN_URL . 'modules/3d-yazici-satis-fiyati-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-3d-satis-css',
        HC_PLUGIN_URL . 'modules/3d-yazici-satis-fiyati-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-3d-yazici-satis-fiyati-hesaplama">
        <h3>3D Baskı Satış Fiyatı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-3dp-maliyet">Toplam Üretim Maliyeti (₺)</label>
            <input type="number" id="hc-3dp-maliyet" placeholder="Örn: 80" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-3dp-kar">Hedeflenen Kâr Oranı (%)</label>
            <input type="number" id="hc-3dp-kar" placeholder="Örn: 50" step="any" min="0" value="50">
        </div>
        <div class="hc-form-group">
            <label for="hc-3dp-kargo">Paketleme ve Kargo Gideri (₺)</label>
            <input type="number" id="hc-3dp-kargo" placeholder="Örn: 40" step="any" min="0" value="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-3dp-komisyon">Platform / Pazaryeri Komisyonu (%) (Örn: Etsy, Trendyol)</label>
            <input type="number" id="hc-3dp-komisyon" placeholder="Örn: 15" step="any" min="0" max="99" value="15">
        </div>
        <div class="hc-form-group">
            <label for="hc-3dp-kdv">KDV / Vergi Oranı (%)</label>
            <input type="number" id="hc-3dp-kdv" placeholder="Örn: 20" step="any" min="0" max="100" value="20">
        </div>
        <button class="hc-btn" onclick="hc3dSatisFiyatiHesapla()">Önerilen Satış Fiyatını Hesapla</button>
        <div class="hc-result" id="hc-3dp-result">
            <h4>Fiyatlandırma Analiz Sonuçları:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Hedef Kârlı Fiyat (Vergi/Komisyon Hariç)</td>
                        <td id="hc-3dp-res-temel">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Pazaryeri Komisyon Payı</td>
                        <td id="hc-3dp-res-komisyon-payi">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>KDV / Vergi Tutarı</td>
                        <td id="hc-3dp-res-kdv-tutar">0.00 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Önerilen Satış Fiyatı (KDV Dahil)</td>
                        <td id="hc-3dp-res-satis">0.00 ₺</td>
                    </tr>
                    <tr style="font-size:14px; font-weight:bold; color:var(--hc-front-blue-dark);">
                        <td>Elde Edilecek Net Kâr (Tüm Giderler Düştükten Sonra)</td>
                        <td id="hc-3dp-res-net-kar">0.00 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}