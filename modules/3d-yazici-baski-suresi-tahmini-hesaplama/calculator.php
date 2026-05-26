<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_3d_yazici_baski_suresi_tahmini_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-3d-sure-tahmin',
        HC_PLUGIN_URL . 'modules/3d-yazici-baski-suresi-tahmini-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-3d-sure-tahmin-css',
        HC_PLUGIN_URL . 'modules/3d-yazici-baski-suresi-tahmini-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-3d-yazici-baski-suresi-tahmini-hesaplama">
        <h3>3D Yazıcı Baskı Süresi Tahmini</h3>
        
        <div class="hc-form-group">
            <label>Model Boyutları</label>
            <div style="display:flex; gap:8px;">
                <input type="number" id="hc-3ds-genislik" placeholder="Genişlik (cm)" min="0" step="any" style="flex:1;">
                <input type="number" id="hc-3ds-derinlik" placeholder="Derinlik (cm)" min="0" step="any" style="flex:1;">
                <input type="number" id="hc-3ds-yukseklik" placeholder="Yükseklik (cm)" min="0" step="any" style="flex:1;">
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-3ds-katman">Katman Yüksekliği (Layer Height - mm)</label>
            <select id="hc-3ds-katman">
                <option value="0.12">0.12 mm (Çok İnce / Detaylı)</option>
                <option value="0.20" selected>0.20 mm (Standart / Normal)</option>
                <option value="0.28">0.28 mm (Kalın / Hızlı)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-3ds-doluluk">Doluluk Oranı (Infill - %)</label>
            <input type="number" id="hc-3ds-doluluk" placeholder="Örn: 20" min="0" max="100" value="20">
        </div>

        <div class="hc-form-group">
            <label for="hc-3ds-hiz">Baskı Hızı (mm/s)</label>
            <input type="number" id="hc-3ds-hiz" placeholder="Örn: 60" min="10" value="60">
        </div>

        <button class="hc-btn" onclick="hc3dSureTahminEt()">Süreyi Tahmin Et</button>
        <div class="hc-result" id="hc-3ds-result">
            <h4>Baskı Süresi Tahmini:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Toplam Model Hacmi</td>
                        <td id="hc-3ds-res-hacim">0 cm³</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Tahmini Baskı Süresi</td>
                        <td id="hc-3ds-res-sure">0 Saat 0 Dakika</td>
                    </tr>
                    <tr style="font-size:13px; color:#64748b;">
                        <td>Not</td>
                        <td>Bu değer tahmini bir süredir. Yazıcınızın ivmelenme (acceleration) ve jerk ayarlarına göre gerçek süre ±%20 değişebilir.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}