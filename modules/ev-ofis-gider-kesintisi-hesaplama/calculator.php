<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ev_ofis_gider_kesintisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ev-ofis-kesinti',
        HC_PLUGIN_URL . 'modules/ev-ofis-gider-kesintisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ev-ofis-kesinti-css',
        HC_PLUGIN_URL . 'modules/ev-ofis-gider-kesintisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ev-ofis-gider-kesintisi-hesaplama">
        <h3>Ev Ofis Gider Kesintisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-eog-ev-alan">Evin Toplam Alanı (m²)</label>
            <input type="number" id="hc-eog-ev-alan" placeholder="Örn: 100" step="any" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-eog-ofis-alan">Ofis Olarak Kullanılan Alan (m²)</label>
            <input type="number" id="hc-eog-ofis-alan" placeholder="Örn: 20" step="any" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-eog-kira">Aylık Toplam Kira Gideri (₺)</label>
            <input type="number" id="hc-eog-kira" placeholder="Örn: 15000" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-eog-fatura">Aylık Toplam Fatura Giderleri (Elektrik, gaz, internet vb.) (₺)</label>
            <input type="number" id="hc-eog-fatura" placeholder="Örn: 4000" step="any" min="0">
        </div>
        <button class="hc-btn" onclick="hcEvOfisKesintiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-eog-result">
            <h4>Ev Ofis Gider Dağılımı (Aylık):</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Ofis Alanı Kullanım Oranı</td>
                        <td id="hc-eog-res-oran" style="font-weight:bold;">%0.00</td>
                    </tr>
                    <tr>
                        <td>İş Gideri Gösterilebilecek Kira Tutarı</td>
                        <td id="hc-eog-res-kira" style="font-weight:bold;">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>İş Gideri Gösterilebilecek Fatura Tutarı</td>
                        <td id="hc-eog-res-fatura" style="font-weight:bold;">0.00 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Toplam Aylık Düşülebilir Gider Tutarı</td>
                        <td id="hc-eog-res-toplam">0.00 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}