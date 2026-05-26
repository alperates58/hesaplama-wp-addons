<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_terraryum_isitma_gucu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-terraryum-isi',
        HC_PLUGIN_URL . 'modules/terraryum-isitma-gucu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-terraryum-isi-css',
        HC_PLUGIN_URL . 'modules/terraryum-isitma-gucu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-terraryum-isitma-gucu-hesaplama">
        <h3>Terraryum Isıtma Gücü Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-tih-hacim">Terraryum Hacmi (Litre)</label>
            <input type="number" id="hc-tih-hacim" placeholder="Örn: 150" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-tih-oda">Bulunulan Oda Sıcaklığı (°C)</label>
            <input type="number" id="hc-tih-oda" placeholder="Örn: 20" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-tih-hedef">Hedef Sıcaklık (Sıcak Bölge) (°C)</label>
            <input type="number" id="hc-tih-hedef" placeholder="Örn: 32" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-tih-malzeme">Terraryum Yapısı / Yalıtımı</label>
            <select id="hc-tih-malzeme">
                <option value="cam">Cam Terraryum (Hızlı Isı Kaybı)</option>
                <option value="ahsap">Ahşap / Plastik Terraryum (İyi Yalıtım)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcTerraryumIsiHesapla()">Isıtıcı Gücünü Hesapla</button>
        <div class="hc-result" id="hc-tih-result">
            <h4>Önerilen Isıtıcı Gücü Raporu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Hedef Sıcaklık Artış Farkı</td>
                        <td id="hc-tih-res-fark">0 °C</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Gerekli Toplam Isıtıcı Gücü (Watt)</td>
                        <td id="hc-tih-res-guc">0 Watt</td>
                    </tr>
                    <tr style="font-size:13px; color:#64748b;">
                        <td>Önerilen Ekipman Dağılımı</td>
                        <td id="hc-tih-res-ekipman">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}