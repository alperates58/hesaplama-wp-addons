<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_klima_enerji_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-klima-enerji',
        HC_PLUGIN_URL . 'modules/klima-enerji-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-klima-enerji-css',
        HC_PLUGIN_URL . 'modules/klima-enerji-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-klima-enerji-tuketimi-hesaplama">
        <h3>Klima Enerji Tüketimi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ket-btu">Klima Kapasitesi (BTU)</label>
            <select id="hc-ket-btu">
                <option value="9000">9.000 BTU</option>
                <option value="12000" selected>12.000 BTU</option>
                <option value="18000">18.000 BTU</option>
                <option value="24000">24.000 BTU</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-ket-verim">Enerji Verimliliği Katsayısı (SEER/SCOP)</label>
            <select id="hc-ket-verim">
                <option value="8.5">A+++ (8.5+ SEER)</option>
                <option value="6.5" selected>A++ (6.1 - 7.0 SEER)</option>
                <option value="5.6">A+ (5.6 SEER)</option>
                <option value="5.1">A (5.1 SEER)</option>
                <option value="4.0">Eski Tip / Düşük Verim (4.0 SEER)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-ket-saat">Günlük Çalışma Süresi (Saat)</label>
            <input type="number" id="hc-ket-saat" value="8" min="1" max="24">
        </div>
        <div class="hc-form-group">
            <label for="hc-ket-gun">Kullanım Gün Sayısı</label>
            <input type="number" id="hc-ket-gun" value="30" min="1" max="365">
        </div>
        <div class="hc-form-group">
            <label for="hc-ket-birimfiyat">Elektrik Birim Fiyatı (₺/kWh)</label>
            <input type="number" id="hc-ket-birimfiyat" value="2.5" min="0" step="any">
        </div>
        <button class="hc-btn" onclick="hcKlimaEnerjiHesapla()">Enerji Tüketimini Hesapla</button>
        
        <div class="hc-result" id="hc-ket-result">
            <h4>Tüketim Analizi:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Çekilen Yaklaşık Güç</td>
                        <td id="hc-ket-res-guc">0.00 kW (0 Watt)</td>
                    </tr>
                    <tr>
                        <td>Günlük Elektrik Tüketimi</td>
                        <td id="hc-ket-res-gun-kwh">0.00 kWh</td>
                    </tr>
                    <tr>
                        <td>Toplam Elektrik Tüketimi</td>
                        <td id="hc-ket-res-top-kwh">0.00 kWh</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Toplam Yaklaşık Maliyet</td>
                        <td id="hc-ket-res-maliyet">0.00 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}