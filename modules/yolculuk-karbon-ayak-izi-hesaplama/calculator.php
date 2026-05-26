<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yolculuk_karbon_ayak_izi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-trip-carbon',
        HC_PLUGIN_URL . 'modules/yolculuk-karbon-ayak-izi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-trip-carbon-css',
        HC_PLUGIN_URL . 'modules/yolculuk-karbon-ayak-izi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yolculuk-karbon-ayak-izi-hesaplama">
        <h3>Yolculuk Karbon Ayak İzi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-yka-mesafe">Toplam Seyahat Mesafesi (km)</label>
            <input type="number" id="hc-yka-mesafe" value="500" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-yka-arac">Ulaşım Türü</label>
            <select id="hc-yka-arac">
                <option value="benzin" selected>Özel Araç (Benzinli)</option>
                <option value="dizel">Özel Araç (Dizel)</option>
                <option value="elektrik">Elektrikli Otomobil (Şebeke Enerjili)</option>
                <option value="otobus">Şehirlerarası Otobüs (Kişi Başı)</option>
                <option value="ucak">Uçak (Yolcu Başına)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcCarbonHesapla()">Karbon Ayak İzini Gör</button>
        
        <div class="hc-result" id="hc-yka-result">
            <h4>Çevresel Etki Raporu:</h4>
            <table>
                <tbody>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Toplam CO₂ Emisyonu</td>
                        <td id="hc-yka-res-co2">0.0 kg CO₂</td>
                    </tr>
                    <tr>
                        <td>Dengelemek İçin Gerekli Ağaç Sayısı</td>
                        <td id="hc-yka-res-agac">0 Ağaç (1 Yıl)</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}