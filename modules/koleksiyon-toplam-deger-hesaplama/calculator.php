<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_koleksiyon_toplam_deger_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-col-value',
        HC_PLUGIN_URL . 'modules/koleksiyon-toplam-deger-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-col-value-css',
        HC_PLUGIN_URL . 'modules/koleksiyon-toplam-deger-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-koleksiyon-toplam-deger-hesaplama">
        <h3>Koleksiyon Toplam Değer Hesaplama</h3>
        
        <div id="hc-ktd-items-container">
            <!-- Dinamik Satırlar Gelecek -->
            <div class="hc-ktd-row" style="display:flex; gap:8px; margin-bottom:12px; align-items:center;">
                <input type="text" placeholder="Öğe Adı" class="hc-ktd-name" style="flex:2;" value="Örnek Öğe 1">
                <input type="number" placeholder="Adet" class="hc-ktd-qty" style="flex:1;" min="1" value="1">
                <input type="number" placeholder="Alış Fiyatı" class="hc-ktd-buy" style="flex:1.2;" min="0" value="100">
                <input type="number" placeholder="Güncel Fiyat" class="hc-ktd-val" style="flex:1.2;" min="0" value="180">
                <button class="hc-btn" style="background:#ef4444; width:auto; padding:8px 12px;" onclick="hcColSil(this)">Sil</button>
            </div>
        </div>

        <button class="hc-btn" style="background:#3b82f6; margin-bottom:16px;" onclick="hcColEkle()">Yeni Öğe Ekle</button>
        <button class="hc-btn" onclick="hcColDegerHesapla()">Koleksiyon Değerini Hesapla</button>

        <div class="hc-result" id="hc-ktd-result">
            <h4>Koleksiyon Değer Özeti:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Toplam Öğe Sayısı</td>
                        <td id="hc-ktd-res-adet">0 adet</td>
                    </tr>
                    <tr>
                        <td>Toplam Yatırım Tutarı (Maliyet)</td>
                        <td id="hc-ktd-res-maliyet">0.00 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Toplam Güncel Portföy Değeri</td>
                        <td id="hc-ktd-res-deger">0.00 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold;" id="hc-ktd-res-net-row">
                        <td>Toplam Net Kâr / Zarar</td>
                        <td id="hc-ktd-res-net">0.00 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}