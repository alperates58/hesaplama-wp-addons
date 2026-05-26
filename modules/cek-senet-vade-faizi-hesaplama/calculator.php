<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cek_senet_vade_faizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cek-senet-vade-faizi',
        HC_PLUGIN_URL . 'modules/cek-senet-vade-faizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cek-senet-vade-faizi-css',
        HC_PLUGIN_URL . 'modules/cek-senet-vade-faizi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cek-senet-vade-faizi-hesaplama">
        <h3>Çek / Senet Vade Faizi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-csv-tur">Belge Türü</label>
            <select id="hc-csv-tur">
                <option value="cek">Çek (TTK m.783/3 - %10 Tazminat Dahil)</option>
                <option value="senet">Senet / Bonolar (Sadece Avans Faiz)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-csv-tutar">Belge Tutarı (₺)</label>
            <input type="number" id="hc-csv-tutar" placeholder="Örn: 250000" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-csv-vade">Vade / İbraz Tarihi</label>
            <input type="date" id="hc-csv-vade">
        </div>
        <div class="hc-form-group">
            <label for="hc-csv-odeme">Ödeme / Hesaplama Tarihi</label>
            <input type="date" id="hc-csv-odeme">
        </div>
        <button class="hc-btn" onclick="hcCekSenetVadeHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-csv-result">
            <h4>Hesaplanan Toplam Alacak Tablosu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Belge Asıl Tutarı</td>
                        <td id="hc-csv-res-asil">0 ₺</td>
                    </tr>
                    <tr>
                        <td>Gecikme Gün Sayısı</td>
                        <td id="hc-csv-res-gun">0 Gün</td>
                    </tr>
                    <tr>
                        <td>Temerrüt / Avans Faiz (%43)</td>
                        <td id="hc-csv-res-faiz" style="color:var(--hc-front-green);">+0 ₺</td>
                    </tr>
                    <tr>
                        <td>Çek Tazminatı (%10 - Sadece Çekler İçin)</td>
                        <td id="hc-csv-res-tazminat">0 ₺</td>
                    </tr>
                    <tr>
                        <td>Çek Komisyonu (%0.3 - Sadece Çekler İçin)</td>
                        <td id="hc-csv-res-komisyon">0 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-blue-dark);">
                        <td>Toplam Ödenmesi Gereken Alacak</td>
                        <td id="hc-csv-res-toplam">0 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}