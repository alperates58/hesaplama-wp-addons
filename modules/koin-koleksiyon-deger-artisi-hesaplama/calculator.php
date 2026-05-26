<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_koin_koleksiyon_deger_artisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-coin-val',
        HC_PLUGIN_URL . 'modules/koin-koleksiyon-deger-artisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-coin-val-css',
        HC_PLUGIN_URL . 'modules/koin-koleksiyon-deger-artisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-koin-koleksiyon-deger-artisi-hesaplama">
        <h3>Koin Koleksiyon Değer Artışı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-kkd-metal">Koin / Para Türü</label>
            <select id="hc-kkd-metal">
                <option value="altin">Altın Koin (Nadir / Yatırımlık)</option>
                <option value="gumus">Gümüş Koin (Nadir / Tematik)</option>
                <option value="bronz">Bakır / Bronz / Nikel (Tarihi Para)</option>
                <option value="diger">Diğer / Koleksiyonluk Kağıt Para</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-kkd-alis">Satın Alma Fiyatı (₺ veya $)</label>
            <input type="number" id="hc-kkd-alis" placeholder="Örn: 200" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-kkd-guncel">Güncel Piyasa / Katalog Değeri (₺ veya $)</label>
            <input type="number" id="hc-kkd-guncel" placeholder="Örn: 500" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-kkd-yil">Kaç Yıl Önce Satın Alındı?</label>
            <input type="number" id="hc-kkd-yil" placeholder="Örn: 5" min="1" value="5">
        </div>
        <button class="hc-btn" onclick="hcKoinArtisHesapla()">Değer Artışını Analiz Et</button>
        
        <div class="hc-result" id="hc-kkd-result">
            <h4>Koin Yatırım Performansı:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Nominal Değer Artış Tutarı</td>
                        <td id="hc-kkd-res-artis" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr>
                        <td>Toplam Değer Kazancı Yüzdesi</td>
                        <td id="hc-kkd-res-yuzde" style="font-weight:bold; color:var(--hc-front-green);">%0.0</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-blue-dark);">
                        <td>Yıllık Bileşik Büyüme Oranı (CAGR)</td>
                        <td id="hc-kkd-res-cagr">%0.00</td>
                    </tr>
                    <tr style="font-size:13px; color:#64748b;">
                        <td>Değerlendirme Sınıfı</td>
                        <td id="hc-kkd-res-sinif">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}