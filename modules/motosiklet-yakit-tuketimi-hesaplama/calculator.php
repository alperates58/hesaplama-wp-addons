<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_motosiklet_yakit_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-moto-fuel',
        HC_PLUGIN_URL . 'modules/motosiklet-yakit-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-moto-fuel-css',
        HC_PLUGIN_URL . 'modules/motosiklet-yakit-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-motosiklet-yakit-tuketimi-hesaplama">
        <h3>Motosiklet Yakıt Tüketimi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-myf-yol">Gidilen Yol (km)</label>
            <input type="number" id="hc-myf-yol" placeholder="Örn: 250" min="1" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-myf-yakit">Alınan Yakıt (Litre)</label>
            <input type="number" id="hc-myf-yakit" placeholder="Örn: 10" min="0.1" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-myf-fiyat">Litre Fiyatı (₺/Litre)</label>
            <input type="number" id="hc-myf-fiyat" value="44.5" min="0" step="any">
        </div>
        <button class="hc-btn" onclick="hcMotoYakitHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-myf-result">
            <h4>Yük & Maliyet Dağılımı:</h4>
            <table>
                <tbody>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>100 Kilometrede Tüketim</td>
                        <td id="hc-myf-res-ort">0.00 L / 100 km</td>
                    </tr>
                    <tr>
                        <td>Kilometre Başı Maliyet</td>
                        <td id="hc-myf-res-km-maliyet">0.00 ₺ / km</td>
                    </tr>
                    <tr>
                        <td>Toplam Yakıt Gideri</td>
                        <td id="hc-myf-res-toplam">0.00 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}