<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sehire_gore_yasam_maliyeti_maas_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sehir-yasam',
        HC_PLUGIN_URL . 'modules/sehire-gore-yasam-maliyeti-maas-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sehir-yasam-css',
        HC_PLUGIN_URL . 'modules/sehire-gore-yasam-maliyeti-maas-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sehire-gore-yasam-maliyeti-maas-hesaplama">
        <h3>Şehire Göre Yaşam Maliyeti Maaş Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-sym-mevcut-maas">Mevcut Şehirdeki Aylık Net Maaşınız (₺)</label>
            <input type="number" id="hc-sym-mevcut-maas" placeholder="Örn: 35000" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-sym-mevcut-sehir">Mevcut Yaşadığınız Şehir</label>
            <select id="hc-sym-mevcut-sehir">
                <option value="100" selected>İstanbul (Ref: 100)</option>
                <option value="82">Ankara (Ref: 82)</option>
                <option value="85">İzmir (Ref: 85)</option>
                <option value="70">Bursa (Ref: 70)</option>
                <option value="65">Antalya (Ref: 65)</option>
                <option value="55">Anadolu Şehirleri (Ortalama) (Ref: 55)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-sym-hedef-sehir">Taşınmak İstediğiniz Şehir</label>
            <select id="hc-sym-hedef-sehir">
                <option value="100">İstanbul (Ref: 100)</option>
                <option value="82">Ankara (Ref: 82)</option>
                <option value="85" selected>İzmir (Ref: 85)</option>
                <option value="70">Bursa (Ref: 70)</option>
                <option value="65">Antalya (Ref: 65)</option>
                <option value="55">Anadolu Şehirleri (Ortalama) (Ref: 55)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcSehirYasamHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-sym-result">
            <h4>Yaşam Maliyeti Dengeli Maaş Analizi:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Mevcut Şehir Göreceli Endeksi</td>
                        <td id="hc-sym-res-mevcut-endeks" style="font-weight:bold;">100</td>
                    </tr>
                    <tr>
                        <td>Hedef Şehir Göreceli Endeksi</td>
                        <td id="hc-sym-res-hedef-endeks" style="font-weight:bold;">85</td>
                    </tr>
                    <tr>
                        <td>Yaşam Maliyeti Farkı Oranı</td>
                        <td id="hc-sym-res-fark-oran" style="font-weight:bold;">-%15.00</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Hedef Şehirde Almanız Gereken Eşdeğer Net Maaş</td>
                        <td id="hc-sym-res-hedef-maas">0.00 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}