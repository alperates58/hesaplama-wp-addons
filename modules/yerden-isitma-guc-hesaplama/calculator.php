<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yerden_isitma_guc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-floor-heat',
        HC_PLUGIN_URL . 'modules/yerden-isitma-guc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-floor-heat-css',
        HC_PLUGIN_URL . 'modules/yerden-isitma-guc-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yerden-isitma-guc-hesaplama">
        <h3>Yerden Isıtma Güç Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-yig-alan">Isıtılacak Net Alan (m²)</label>
            <input type="number" id="hc-yig-alan" placeholder="Örn: 50" min="1" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-yig-aralik">Boru Döşeme Modülasyon Aralığı</label>
            <select id="hc-yig-aralik">
                <option value="10">10 cm Aralıklı (Banyo/Islak Hacimler - Yüksek Güç)</option>
                <option value="15" selected>15 cm Aralıklı (Standart Odalar - Orta Güç)</option>
                <option value="20">20 cm Aralıklı (Düşük Isı İhtiyacı Olan Mahaller)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-yig-zemin">Zemin Kaplama Malzemesi</label>
            <select id="hc-yig-zemin">
                <option value="1.0">Seramik / Granit / Mermer (Yüksek Isı İletkenliği)</option>
                <option value="0.8">Laminat Parke (Yerden Isıtmaya Uyumlu - Orta İletkenlik)</option>
                <option value="0.6">Halı / Kalın Ahşap Kaplama (Düşük Isı İletkenliği)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcYerdenIsitmaHesapla()">Isıtma Gücünü Hesapla</button>
        
        <div class="hc-result" id="hc-yig-result">
            <h4>Tasarım Sonuçları:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Birim Alandan Alınacak Güç</td>
                        <td id="hc-yig-res-birim">0 W/m²</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Toplam Gerekli Isıtma Gücü</td>
                        <td id="hc-yig-res-toplam">0 Watt (0.0 kW)</td>
                    </tr>
                    <tr>
                        <td>Gerekli Yaklaşık Boru Uzunluğu</td>
                        <td id="hc-yig-res-boru">0 metre</td>
                    </tr>
                    <tr>
                        <td>Önerilen Devre (Loop) Sayısı</td>
                        <td id="hc-yig-res-devre">1 Devre (Kolektör Çıkışı)</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}