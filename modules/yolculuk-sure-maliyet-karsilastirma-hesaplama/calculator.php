<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yolculuk_sure_maliyet_karsilastirma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-trip-compare',
        HC_PLUGIN_URL . 'modules/yolculuk-sure-maliyet-karsilastirma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-trip-compare-css',
        HC_PLUGIN_URL . 'modules/yolculuk-sure-maliyet-karsilastirma-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yolculuk-sure-maliyet-karsilastirma-hesaplama">
        <h3>Yolculuk Süre & Maliyet Karşılaştırma</h3>
        <div class="hc-form-group">
            <label for="hc-ysm-yol">Gidilecek Yol Mesafesi (km)</label>
            <input type="number" id="hc-ysm-yol" value="450" min="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-ysm-kisi">Seyahat Edecek Yolcu Sayısı</label>
            <input type="number" id="hc-ysm-kisi" value="2" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-ysm-yakit">Litre Başına Akaryakıt Fiyatı (TL)</label>
            <input type="number" id="hc-ysm-yakit" value="43" min="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-ysm-tuketim">Araç Yakıt Tüketimi (Litre / 100 km)</label>
            <input type="number" id="hc-ysm-tuketim" value="6.5" step="0.1" min="2">
        </div>
        <div class="hc-form-group">
            <label for="hc-ysm-otobus">Kişi Başı Otobüs Bileti Fiyatı (TL)</label>
            <input type="number" id="hc-ysm-otobus" value="800" min="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-ysm-ucak">Kişi Başı Uçak Bileti Fiyatı (TL)</label>
            <input type="number" id="hc-ysm-ucak" value="2200" min="100">
        </div>
        <button class="hc-btn" onclick="hcTripCompareHesapla()">Kanalları Karşılaştır</button>
        
        <div class="hc-result" id="hc-ysm-result">
            <h4>Seyahat Alternatifleri Karşılaştırma Matrisi:</h4>
            <table>
                <thead>
                    <tr>
                        <th>Ulaşım Yolu</th>
                        <th>Tahmini Süre</th>
                        <th>Toplam Maliyet</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Özel Araç</td>
                        <td id="hc-ysm-res-oto-sure">0 Saat</td>
                        <td id="hc-ysm-res-oto-maliyet">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Otobüs</td>
                        <td id="hc-ysm-res-bus-sure">0 Saat</td>
                        <td id="hc-ysm-res-bus-maliyet">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Uçak (Havalimanı dahil)</td>
                        <td id="hc-ysm-res-air-sure">0 Saat</td>
                        <td id="hc-ysm-res-air-maliyet">0.00 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}