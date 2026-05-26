<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_3d_baski_maliyet_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-3d-maliyet',
        HC_PLUGIN_URL . 'modules/3d-baski-maliyet-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-3d-maliyet-css',
        HC_PLUGIN_URL . 'modules/3d-baski-maliyet-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-3d-baski-maliyet-hesaplama">
        <h3>3D Baskı Maliyet Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-3dm-filament">Kullanılan Filament Ağırlığı (Gram)</label>
            <input type="number" id="hc-3dm-filament" placeholder="Örn: 120" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-3dm-fil-fiyat">1 kg Rulo Filament Fiyatı (₺)</label>
            <input type="number" id="hc-3dm-fil-fiyat" placeholder="Örn: 650" step="any" min="0" value="650">
        </div>
        <div class="hc-form-group">
            <label for="hc-3dm-sure">Baskı Süresi (Saat)</label>
            <input type="number" id="hc-3dm-sure" placeholder="Örn: 8" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-3dm-elektrik">Saatlik Elektrik Maliyeti (₺) (Veya toplam elektrik)</label>
            <input type="number" id="hc-3dm-elektrik" placeholder="Örn: 0.50" step="any" min="0" value="0.50">
        </div>
        <div class="hc-form-group">
            <label for="hc-3dm-amortisman">Yazıcı Saatlik Amortismanı / Yıpranma Payı (₺)</label>
            <input type="number" id="hc-3dm-amortisman" placeholder="Örn: 2.00" step="any" min="0" value="2.00">
        </div>
        <div class="hc-form-group">
            <label for="hc-3dm-iscilik">Toplam İşçilik Süresi (Slicing + Temizlik - Saat)</label>
            <input type="number" id="hc-3dm-iscilik" placeholder="Örn: 0.5" step="any" min="0" value="0.5">
        </div>
        <div class="hc-form-group">
            <label for="hc-3dm-iscilik-saat">Saatlik İşçilik Ücreti (₺)</label>
            <input type="number" id="hc-3dm-iscilik-saat" placeholder="Örn: 100" step="any" min="0" value="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-3dm-hata">Fire / Başarısız Baskı Payı (%)</label>
            <input type="number" id="hc-3dm-hata" placeholder="Örn: 10" min="0" max="100" value="10">
        </div>
        <button class="hc-btn" onclick="hc3dBaskiMaliyetHesapla()">Toplam Maliyeti Hesapla</button>
        <div class="hc-result" id="hc-3dm-result">
            <h4>Baskı Maliyet Analizi:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Filament Gideri</td>
                        <td id="hc-3dm-res-filament">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Elektrik Gideri</td>
                        <td id="hc-3dm-res-elektrik">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Amortisman (Cihaz Yıpranma) Gideri</td>
                        <td id="hc-3dm-res-amortisman">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>İşçilik Gideri</td>
                        <td id="hc-3dm-res-iscilik">0.00 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-red);">
                        <td>Toplam Net Üretim Maliyeti (Fire Dahil)</td>
                        <td id="hc-3dm-res-toplam">0.00 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}