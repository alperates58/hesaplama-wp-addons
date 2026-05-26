<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ise_iade_tazminati_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ise-iade-tazminati',
        HC_PLUGIN_URL . 'modules/ise-iade-tazminati-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ise-iade-tazminati-css',
        HC_PLUGIN_URL . 'modules/ise-iade-tazminati-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ise-iade-tazminati-hesaplama">
        <h3>İşe İade Tazminatı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-iit-brut">Son Aylık Giydirilmiş Brüt Maaş (₺)</label>
            <input type="number" id="hc-iit-brut" placeholder="Örn: 42000" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-iit-net">Son Aylık Net Maaş (₺)</label>
            <input type="number" id="hc-iit-net" placeholder="Örn: 32000" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-iit-tazminat-ay">İşe Başlatmama Tazminatı Miktarı (Ay Sayısı)</label>
            <select id="hc-iit-tazminat-ay">
                <option value="4">4 Aylık Maaş (Minimum)</option>
                <option value="5">5 Aylık Maaş</option>
                <option value="6">6 Aylık Maaş</option>
                <option value="7">7 Aylık Maaş</option>
                <option value="8">8 Aylık Maaş (Maksimum)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-iit-bosta-ay">Boşta Geçen Süre Ücreti (Ay Sayısı)</label>
            <select id="hc-iit-bosta-ay">
                <option value="4">4 Aylık Maaş (Kanuni Tavan)</option>
                <option value="3">3 Aylık Maaş</option>
                <option value="2">2 Aylık Maaş</option>
                <option value="1">1 Aylık Maaş</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcIseIadeHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-iit-result">
            <h4>Hesaplanan İşe İade Alacakları:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>İşe Başlatmama Tazminatı (Sadece Damga Vergisi Kesintili)</td>
                        <td id="hc-iit-res-baslatmama">0 ₺</td>
                    </tr>
                    <tr>
                        <td>Boşta Geçen Süre Net Ücreti (Vergi ve SGK Düşülmüş)</td>
                        <td id="hc-iit-res-bosta">0 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Toplam Net İşe İade Tazminat Alacağı</td>
                        <td id="hc-iit-res-toplam">0 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}