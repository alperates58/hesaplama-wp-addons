<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cayma_hakki_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cayma-hakki-suresi',
        HC_PLUGIN_URL . 'modules/cayma-hakki-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cayma-hakki-suresi-css',
        HC_PLUGIN_URL . 'modules/cayma-hakki-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cayma-hakki-suresi-hesaplama">
        <h3>Cayma Hakkı Süresi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-chs-teslim">Ürünün Teslim Alındığı veya Hizmetin Satın Alındığı Tarih</label>
            <input type="date" id="hc-chs-teslim">
        </div>
        <div class="hc-form-group">
            <label for="hc-chs-bilgi">Satıcı/Sağlayıcı Cayma Hakkı Konusunda Sizi Bilgilendirdi mi?</label>
            <select id="hc-chs-bilgi">
                <option value="evet">Evet, ön bilgilendirme formu veya sözleşmede belirtildi</option>
                <option value="hayir">Hayır, hiçbir bilgilendirme yapılmadı</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcCaymaHakkiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-chs-result">
            <div id="hc-chs-durum-box" style="padding:12px; border-radius:8px; font-size:14px; font-weight:bold; margin-bottom:12px;"></div>
            <h4>Cayma Hakkı Süre Raporu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Yasal Cayma Süresi</td>
                        <td id="hc-chs-res-sure">14 Gün</td>
                    </tr>
                    <tr>
                        <td>Son Cayma Hakkı Tarihi</td>
                        <td id="hc-chs-res-son-gun" style="font-weight:bold;">GG.AA.YYYY</td>
                    </tr>
                    <tr>
                        <td>Kalan Gün Sayısı</td>
                        <td id="hc-chs-res-kalan">0 Gün</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}