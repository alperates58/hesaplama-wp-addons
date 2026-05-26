<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_trafik_cezasi_erken_odeme_indirimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-trafik-cezasi-erken-odeme',
        HC_PLUGIN_URL . 'modules/trafik-cezasi-erken-odeme-indirimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-trafik-cezasi-erken-odeme-css',
        HC_PLUGIN_URL . 'modules/trafik-cezasi-erken-odeme-indirimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-trafik-cezasi-erken-odeme-indirimi-hesaplama">
        <h3>Trafik Cezası Erken Ödeme İndirimi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-tce-tutar">Ceza Tutarı (₺)</label>
            <input type="number" id="hc-tce-tutar" placeholder="Örn: 2000" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-tce-teblig">Cezanın Tebliğ Edildiği Tarih</label>
            <input type="date" id="hc-tce-teblig">
        </div>
        <button class="hc-btn" onclick="hcTrafikErkenOdemeHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-tce-result">
            <h4>İndirimli Ödeme Detayları:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Ceza Orijinal Tutarı</td>
                        <td id="hc-tce-res-orj">0 ₺</td>
                    </tr>
                    <tr>
                        <td>Erken Ödeme İndirim Oranı</td>
                        <td>%25 İndirim</td>
                    </tr>
                    <tr style="color:var(--hc-front-green); font-weight:bold;">
                        <td>Tasarruf Edilecek Tutar</td>
                        <td id="hc-tce-res-kazanc">0 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-blue-dark);">
                        <td>Ödenecek İndirimli Tutar</td>
                        <td id="hc-tce-res-indirimli">0 ₺</td>
                    </tr>
                    <tr style="font-weight:bold;">
                        <td>İndirimli Son Ödeme Tarihi</td>
                        <td id="hc-tce-res-son-tarih">GG.AA.YYYY</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}