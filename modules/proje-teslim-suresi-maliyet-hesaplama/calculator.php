<?php
if ( ! defined( 'ABSPATH' ) ) exit;

// Single function to register standard hooks
function hc_render_proje_teslim_suresi_maliyet_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-proje-teslim-maliyet',
        HC_PLUGIN_URL . 'modules/proje-teslim-suresi-maliyet-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-proje-teslim-maliyet-css',
        HC_PLUGIN_URL . 'modules/proje-teslim-suresi-maliyet-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-proje-teslim-maliyet-hesaplama">
        <h3>Proje Teslim Süresi Maliyet Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ptm-deger">Proje Toplam Kontrat Değeri (₺ veya $)</label>
            <input type="number" id="hc-ptm-deger" placeholder="Örn: 100000" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-ptm-gecikme">Gecikme Süresi (Gün)</label>
            <input type="number" id="hc-ptm-gecikme" placeholder="Örn: 15" step="1" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-ptm-ceza">Sözleşmesel Günlük Gecikme Cezası (%)</label>
            <input type="number" id="hc-ptm-ceza" placeholder="Örn: 0.5" step="any" min="0" value="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-ptm-ek-saat">Gecikme Boyunca Harcanan Günlük Ek Efor (Saat)</label>
            <input type="number" id="hc-ptm-ek-saat" placeholder="Örn: 4" step="any" min="0" value="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-ptm-saatlik">Kendi Saatlik Ücretiniz (₺ veya $)</label>
            <input type="number" id="hc-ptm-saatlik" placeholder="Örn: 500" step="any" min="0">
        </div>
        <button class="hc-btn" onclick="hcProjeTeslimMaliyetHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ptm-result">
            <h4>Gecikme Maliyet Raporu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Kesilecek Toplam Ceza Tutarı</td>
                        <td id="hc-ptm-res-ceza" style="font-weight:bold; color:var(--hc-front-red);">0.00</td>
                    </tr>
                    <tr>
                        <td>Ek İş Gücü Maliyet Kaybı</td>
                        <td id="hc-ptm-res-efor" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-red);">
                        <td>Toplam Gecikme Maliyeti</td>
                        <td id="hc-ptm-res-toplam">0.00</td>
                    </tr>
                    <tr style="font-size:14px; font-weight:bold; color:var(--hc-front-blue-dark);">
                        <td>Net Kalan Proje Geliri</td>
                        <td id="hc-ptm-res-net">0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}