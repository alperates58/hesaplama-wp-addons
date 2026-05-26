<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kefir_fermantasyon_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kefir-time',
        HC_PLUGIN_URL . 'modules/kefir-fermantasyon-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kefir-time-css',
        HC_PLUGIN_URL . 'modules/kefir-fermantasyon-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kefir-fermantasyon-suresi-hesaplama">
        <h3>Kefir Fermantasyon Süresi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-kef-sut">Kullanılan Süt Miktarı (ml)</label>
            <input type="number" id="hc-kef-sut" value="500" min="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-kef-grain">Kefir Danesi (Mayası) Ağırlığı (g)</label>
            <input type="number" id="hc-kef-grain" value="15" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-kef-temp">Oda Sıcaklığı (°C)</label>
            <input type="number" id="hc-kef-temp" value="22" min="15" max="35">
        </div>
        <div class="hc-form-group">
            <label for="hc-kef-tat">İstediğiniz Yoğunluk / Lezzet</label>
            <select id="hc-kef-tat">
                <option value="0.8">Hafif / Akışkan ve Tatlımsı (Probiyotik başlangıç)</option>
                <option value="1.0" selected>Dengeli / Standart Kefir Ekşiliği ve Kıvamı</option>
                <option value="1.3">Yoğun Ekşi / Gazlı ve Kıvamlı</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcKefirHesapla()">Süreyi Hesapla</button>
        
        <div class="hc-result" id="hc-kef-result">
            <h4>Fermantasyon Planlama Detayları:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Süt / Dane Oranı</td>
                        <td id="hc-kef-res-oran">1:33 (Standarda Yakın)</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Önerilen Fermantasyon Süresi</td>
                        <td id="hc-kef-res-sure">24 Saat</td>
                    </tr>
                    <tr>
                        <td>Kritik Uyarılar</td>
                        <td id="hc-kef-res-uyari">Metal kaşık kullanmayın.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}