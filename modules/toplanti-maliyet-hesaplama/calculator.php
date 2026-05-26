<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_toplanti_maliyet_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-meet-cost',
        HC_PLUGIN_URL . 'modules/toplanti-maliyet-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-meet-cost-css',
        HC_PLUGIN_URL . 'modules/toplanti-maliyet-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-toplanti-maliyet-hesaplama">
        <h3>Toplantı Maliyet Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-tmh-kisi">Toplantı Katılımcı Sayısı</label>
            <input type="number" id="hc-tmh-kisi" value="6" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-tmh-sure">Toplantı Süresi (Dakika)</label>
            <input type="number" id="hc-tmh-sure" value="60" min="5" step="5">
        </div>
        <div class="hc-form-group">
            <label for="hc-tmh-ucret">Katılımcıların Ortalama Saatlik Ücreti / Maliyeti (₺)</label>
            <input type="number" id="hc-tmh-ucret" value="350" min="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-tmh-hazirlik">Toplantı Öncesi Hazırlık Süresi (Dakika - Tek Kişi)</label>
            <input type="number" id="hc-tmh-hazirlik" value="15" min="0">
        </div>
        <button class="hc-btn" onclick="hcToplantiMaliyetHesapla()">Toplantı Maliyetini Hesapla</button>
        
        <div class="hc-result" id="hc-tmh-result">
            <h4>Toplantı Bütçe Etkisi:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Saatlik Toplantı Maliyet Hızı</td>
                        <td id="hc-tmh-res-hiz">0.00 ₺ / saat</td>
                    </tr>
                    <tr>
                        <td>Hazırlık Maliyet Yükü</td>
                        <td id="hc-tmh-res-hazirlik">0.00 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Toplam Toplantı Zaman Maliyeti</td>
                        <td id="hc-tmh-res-toplam">0.00 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}