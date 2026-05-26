<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_alacak_asil_faiz_toplam_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-alacak-asil-faiz-toplam',
        HC_PLUGIN_URL . 'modules/alacak-asil-faiz-toplam-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-alacak-asil-faiz-toplam-css',
        HC_PLUGIN_URL . 'modules/alacak-asil-faiz-toplam-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-alacak-asil-faiz-toplam-hesaplama">
        <h3>Alacak Asıl Faiz Toplam Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-aft-asil">Asıl Alacak Tutarı (Anapara) (₺)</label>
            <input type="number" id="hc-aft-asil" placeholder="Örn: 150000" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-aft-turu">Uygulanacak Faiz Türü</label>
            <select id="hc-aft-turu" onchange="hcAlacakFaizTuruGuncelle()">
                <option value="24">Yasal Faiz (%24)</option>
                <option value="43">Ticari Avans Faiz (%43)</option>
                <option value="ozel">Özel Faiz Oranı</option>
            </select>
        </div>
        <div class="hc-form-group" id="hc-aft-ozel-row" style="display:none;">
            <label for="hc-aft-ozel-oran">Özel Yıllık Faiz Oranı (%)</label>
            <input type="number" id="hc-aft-ozel-oran" placeholder="Örn: 50" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-aft-baslangic">Faiz Başlangıç Tarihi</label>
            <input type="date" id="hc-aft-baslangic">
        </div>
        <div class="hc-form-group">
            <label for="hc-aft-bitis">Hesaplama Tarihi</label>
            <input type="date" id="hc-aft-bitis">
        </div>
        <button class="hc-btn" onclick="hcAlacakAsilFaizHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-aft-result">
            <h4>Alacak Hesap Raporu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Asıl Alacak</td>
                        <td id="hc-aft-res-asil">0 ₺</td>
                    </tr>
                    <tr>
                        <td>Faiz Süresi (Gün)</td>
                        <td id="hc-aft-res-gun">0 Gün</td>
                    </tr>
                    <tr>
                        <td>Yıllık Faiz Oranı</td>
                        <td id="hc-aft-res-oran">%0</td>
                    </tr>
                    <tr>
                        <td>Biriken Faiz Tutarı</td>
                        <td id="hc-aft-res-faiz" style="color:var(--hc-front-green);">+0 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-blue-dark);">
                        <td>Toplam Alacak Tutarı</td>
                        <td id="hc-aft-res-toplam">0 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}