<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mining_geri_odeme_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mining-geri-odeme',
        HC_PLUGIN_URL . 'modules/mining-geri-odeme-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mining-geri-odeme-css',
        HC_PLUGIN_URL . 'modules/mining-geri-odeme-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mining-geri-odeme-suresi-hesaplama">
        <h3>Mining Geri Ödeme Süresi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-mgo-cihaz">Cihaz / Rig Yatırım Maliyeti ($ veya ₺)</label>
            <input type="number" id="hc-mgo-cihaz" placeholder="Örn: 3500" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-mgo-kazanc">Günlük Net Madencilik Kazancı (Elektrik Hariç Net Kar)</label>
            <input type="number" id="hc-mgo-kazanc" placeholder="Örn: 10" step="any" min="0">
        </div>
        <button class="hc-btn" onclick="hcMiningGeriOdemeHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mgo-result">
            <h4>Amorti (Geri Ödeme) Süresi Analizi:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Toplam Rig Yatırımı</td>
                        <td id="hc-mgo-res-yatirim" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr>
                        <td>Günlük Net Kazanç</td>
                        <td id="hc-mgo-res-kazanc" style="color:var(--hc-front-green); font-weight:bold;">0.00</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-blue-dark);">
                        <td>Geri Ödeme Süresi (Gün)</td>
                        <td id="hc-mgo-res-gun">0 Gün</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Geri Ödeme Süresi (Ay ve Gün)</td>
                        <td id="hc-mgo-res-ay">0 Ay, 0 Gün</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}