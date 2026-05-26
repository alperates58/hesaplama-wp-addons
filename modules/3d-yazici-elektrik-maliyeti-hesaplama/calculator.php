<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_3d_yazici_elektrik_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-3d-elektrik',
        HC_PLUGIN_URL . 'modules/3d-yazici-elektrik-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-3d-elektrik-css',
        HC_PLUGIN_URL . 'modules/3d-yazici-elektrik-maliyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-3d-yazici-elektrik-maliyeti-hesaplama">
        <h3>3D Yazıcı Elektrik Maliyeti Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-3de-guc">Yazıcı Güç Tüketimi (Watt - Ortalama)</label>
            <input type="number" id="hc-3de-guc" placeholder="Örn: 150" step="any" min="0" value="150">
        </div>
        <div class="hc-form-group">
            <label>Baskı Süresi</label>
            <div style="display:flex; gap:12px;">
                <input type="number" id="hc-3de-saat" placeholder="Saat" min="0" value="5" style="flex:1;">
                <input type="number" id="hc-3de-dakika" placeholder="Dakika" min="0" max="59" value="0" style="flex:1;">
            </div>
        </div>
        <div class="hc-form-group">
            <label for="hc-3de-tarife">Elektrik Birim Fiyatı (₺ / kWh)</label>
            <input type="number" id="hc-3de-tarife" placeholder="Örn: 2.80" step="any" min="0" value="2.80">
        </div>
        <button class="hc-btn" onclick="hc3dElektrikHesapla()">Tüketim ve Maliyet Hesapla</button>
        <div class="hc-result" id="hc-3de-result">
            <h4>Elektrik Tüketim Raporu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Toplam Baskı Süresi</td>
                        <td id="hc-3de-res-sure">0 Saat 0 Dakika</td>
                    </tr>
                    <tr>
                        <td>Toplam Enerji Tüketimi</td>
                        <td id="hc-3de-res-tuketim" style="font-weight:bold;">0.00 kWh</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Toplam Elektrik Maliyeti</td>
                        <td id="hc-3de-res-maliyet">0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}