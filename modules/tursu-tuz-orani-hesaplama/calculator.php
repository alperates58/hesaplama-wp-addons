<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tursu_tuz_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pickle-salt',
        HC_PLUGIN_URL . 'modules/tursu-tuz-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pickle-salt-css',
        HC_PLUGIN_URL . 'modules/tursu-tuz-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tursu-tuz-orani-hesaplama">
        <h3>Turşu Tuz & Salamura Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-tto-su">Hazırlanacak Salamura Suyu Hacmi (ml)</label>
            <input type="number" id="hc-tto-su" value="1000" min="100" step="50">
        </div>
        <div class="hc-form-group">
            <label for="hc-tto-oran">Hedef Tuz Yoğunluğu (%)</label>
            <select id="hc-tto-oran">
                <option value="3">3% Tuz Oranı (Az tuzlu turşu - Kısa ömürlü)</option>
                <option value="5" selected>5% Tuz Oranı (Standart çıtır turşu - Önerilen)</option>
                <option value="8">8% Tuz Oranı (Yoğun sert sebzeler için / Uzun ömürlü)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-tto-sirke">Sirke Oranı (Su hacmine göre %)</label>
            <select id="hc-tto-sirke">
                <option value="10">10% (Çok hafif sirke tadı)</option>
                <option value="20" selected>20% (Dengeli standart turşu tadı)</option>
                <option value="33">33% (Ekşi ve keskin lezzet)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcTursuTuzHesapla()">Salamura Reçetesini Çıkar</button>
        
        <div class="hc-result" id="hc-tto-result">
            <h4>Turşu Salamura Malzeme Dağılımı:</h4>
            <table>
                <tbody>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Gerekli Kaya Tuzu Ağırlığı</td>
                        <td id="hc-tto-res-tuz">0 gram (Yaklaşık 0 yemek kaşığı)</td>
                    </tr>
                    <tr>
                        <td>Gerekli Sirke Miktarı</td>
                        <td id="hc-tto-res-sirke">0 ml (0 çay bardağı)</td>
                    </tr>
                    <tr>
                        <td>Eklenecek Temiz Su</td>
                        <td id="hc-tto-res-su">0 ml</td>
                    </tr>
                    <tr>
                        <td>Limon Tuzu ve Şeker Önerisi</td>
                        <td id="hc-tto-res-ekstra">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}