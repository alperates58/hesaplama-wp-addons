<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_maas_artis_enflasyon_karsilastirma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-maas-enflasyon',
        HC_PLUGIN_URL . 'modules/maas-artis-enflasyon-karsilastirma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-maas-enflasyon-css',
        HC_PLUGIN_URL . 'modules/maas-artis-enflasyon-karsilastirma-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-maas-artis-enflasyon-karsilastirma-hesaplama">
        <h3>Maaş Artış Enflasyon Karşılaştırma Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-mae-eski">Eski Net Maaşınız (₺)</label>
            <input type="number" id="hc-mae-eski" placeholder="Örn: 25000" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-mae-yeni">Yeni Net Maaşınız (₺)</label>
            <input type="number" id="hc-mae-yeni" placeholder="Örn: 35000" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-mae-enflasyon">Yıllık Dönemsel Enflasyon Oranı (%)</label>
            <input type="number" id="hc-mae-enflasyon" placeholder="Örn: 45" step="any" min="0" value="45">
        </div>
        <button class="hc-btn" onclick="hcMaasEnflasyonHesapla()">Karşılaştır</button>
        <div class="hc-result" id="hc-mae-result">
            <h4>Alım Gücü Analiz Sonuçları:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Nominal Maaş Artış Oranı</td>
                        <td id="hc-mae-res-artis" style="font-weight:bold;">%0.00</td>
                    </tr>
                    <tr>
                        <td>Enflasyon Karşısında Korunması Gereken Maaş</td>
                        <td id="hc-mae-res-korunan" style="font-weight:bold;">0.00 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold;">
                        <td>Reel Alım Gücü Değişim Oranı</td>
                        <td id="hc-mae-res-reel">0.00%</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Net Alım Gücü Kar / Zarar Tutarı</td>
                        <td id="hc-mae-res-tutar">0.00 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}