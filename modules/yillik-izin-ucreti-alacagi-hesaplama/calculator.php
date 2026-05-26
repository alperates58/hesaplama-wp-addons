<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yillik_izin_ucreti_alacagi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yillik-izin-ucreti-alacagi',
        HC_PLUGIN_URL . 'modules/yillik-izin-ucreti-alacagi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yillik-izin-ucreti-alacagi-css',
        HC_PLUGIN_URL . 'modules/yillik-izin-ucreti-alacagi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yillik-izin-ucreti-alacagi-hesaplama">
        <h3>Yıllık İzin Ücreti Alacağı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-yia-brut">Son Aylık Brüt Maaş (₺)</label>
            <input type="number" id="hc-yia-brut" placeholder="Örn: 40000" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-yia-gun">Kullanılmayan Yıllık İzin Gün Sayısı</label>
            <input type="number" id="hc-yia-gun" placeholder="Örn: 14" min="1">
        </div>
        <button class="hc-btn" onclick="hcYillikIzinAlacagiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-yia-result">
            <h4>Yıllık İzin Alacak Sonuçları:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Günlük Brüt Ücret</td>
                        <td id="hc-yia-res-gunluk">0 ₺</td>
                    </tr>
                    <tr>
                        <td>Toplam Brüt İzin Ücreti</td>
                        <td id="hc-yia-res-brut">0 ₺</td>
                    </tr>
                    <tr>
                        <td>Gelir Vergisi ve Yasal Kesintiler (%30.76)</td>
                        <td id="hc-yia-res-kesinti" style="color:var(--hc-front-red);">-0 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Net Ödenecek Yıllık İzin Ücreti</td>
                        <td id="hc-yia-res-net">0 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}