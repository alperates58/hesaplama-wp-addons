<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bagaj_siniri_ve_asimi_maliyet_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-luggage-cost',
        HC_PLUGIN_URL . 'modules/bagaj-siniri-ve-asimi-maliyet-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-luggage-cost-css',
        HC_PLUGIN_URL . 'modules/bagaj-siniri-ve-asimi-maliyet-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bagaj-siniri-ve-asimi-maliyet-hesaplama">
        <h3>Bagaj Sınırı ve Aşımı Maliyet Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bsa-bilet">Biletle Gelen Bagaj Hakkı (kg)</label>
            <input type="number" id="hc-bsa-bilet" value="15" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-bsa-fiili">Mevcut Toplam Bagaj Ağırlığı (kg)</label>
            <input type="number" id="hc-bsa-fiili" value="23" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-bsa-para">Kilogram Başına Aşım Ücreti</label>
            <input type="number" id="hc-bsa-ucret" value="120" min="1">
            <select id="hc-bsa-para" style="margin-top:10px;">
                <option value="TRY" selected>Türk Lirası (₺)</option>
                <option value="EUR">Euro (€)</option>
                <option value="USD">Dolar ($)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcBagajHesapla()">Aşım Cezasını Hesapla</button>
        
        <div class="hc-result" id="hc-bsa-result">
            <h4>Bagaj Aşım Durumu Analizi:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Aşan Bagaj Miktarı</td>
                        <td id="hc-bsa-res-miktar">0 kg</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Ödenecek Toplam Aşım Cezası</td>
                        <td id="hc-bsa-res-ceza">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Koruyucu Tavsiye Notu</td>
                        <td id="hc-bsa-res-not">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}