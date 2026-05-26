<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kripto_kaldirac_tasfiye_fiyati_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kripto-tasfiye-fiyati',
        HC_PLUGIN_URL . 'modules/kripto-kaldirac-tasfiye-fiyati-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kripto-tasfiye-fiyati-css',
        HC_PLUGIN_URL . 'modules/kripto-kaldirac-tasfiye-fiyati-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kripto-kaldirac-tasfiye-fiyati-hesaplama">
        <h3>Kripto Kaldıraç Tasfiye Fiyatı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ktf-giris">Giriş Fiyatı ($ veya ₺)</label>
            <input type="number" id="hc-ktf-giris" placeholder="Örn: 65000" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-ktf-kaldirac">Kaldıraç Oranı (x)</label>
            <input type="number" id="hc-ktf-kaldirac" placeholder="Örn: 10" step="1" min="1" max="125" value="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-ktf-yon">Pozisyon Yönü</label>
            <select id="hc-ktf-yon">
                <option value="long" selected>Long (Yükseliş)</option>
                <option value="short">Short (Düşüş)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcKriptoTasfiyeFiyatiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ktf-result">
            <h4>Tasfiye (Likidasyon) Detayları:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Pozisyon Yönü</td>
                        <td id="hc-ktf-res-yon" style="font-weight:bold;">Long</td>
                    </tr>
                    <tr>
                        <td>Kaldıraç Oranı</td>
                        <td id="hc-ktf-res-kaldirac" style="font-weight:bold;">10x</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-red);">
                        <td>Tahmini Tasfiye Fiyatı</td>
                        <td id="hc-ktf-res-fiyat">0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}