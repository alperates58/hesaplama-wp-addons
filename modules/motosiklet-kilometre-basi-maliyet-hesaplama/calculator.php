<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_motosiklet_kilometre_basi_maliyet_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-moto-per-km',
        HC_PLUGIN_URL . 'modules/motosiklet-kilometre-basi-maliyet-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-moto-per-km-css',
        HC_PLUGIN_URL . 'modules/motosiklet-kilometre-basi-maliyet-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-motosiklet-kilometre-basi-maliyet-hesaplama">
        <h3>Motosiklet Kilometre Başı Maliyet Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-mkbm-km">Yıllık Yapılan Kilometre (km)</label>
            <input type="number" id="hc-mkbm-km" value="10000" min="500">
        </div>
        <div class="hc-form-group">
            <label for="hc-mkbm-yakitort">Ortalama Yakıt Tüketimi (L / 100 km)</label>
            <input type="number" id="hc-mkbm-yakitort" value="3.5" min="0.5" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-mkbm-yakitfiyat">Benzin Litre Fiyatı (₺)</label>
            <input type="number" id="hc-mkbm-yakitfiyat" value="44.5" min="0" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-mkbm-bakim">Yıllık Toplam Bakım Gideri (₺)</label>
            <input type="number" id="hc-mkbm-bakim" value="12000" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-mkbm-sabit">Yıllık Sabit Giderler (MTV + Trafik Sigortası + Kasko vb. - ₺)</label>
            <input type="number" id="hc-mkbm-sabit" value="8000" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-mkbm-amortisman">Yıllık Tahmini Amortisman / Değer Kaybı (₺)</label>
            <input type="number" id="hc-mkbm-amortisman" value="15000" min="0">
        </div>
        <button class="hc-btn" onclick="hcMotoKmMaliyetHesapla()">Kilometre Başı Maliyeti Hesapla</button>
        
        <div class="hc-result" id="hc-mkbm-result">
            <h4>Kilometre Başına Maliyet Analizi:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Kilometre Başı Yakıt Maliyeti</td>
                        <td id="hc-mkbm-res-yakit">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Kilometre Başı Bakım Payı</td>
                        <td id="hc-mkbm-res-bakim">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Kilometre Başı Sabit Gider Payı</td>
                        <td id="hc-mkbm-res-sabit">0.00 ₺</td>
                    </tr>
                    <tr>
                        <td>Kilometre Başı Değer Kaybı Payı</td>
                        <td id="hc-mkbm-res-amortisman">0.00 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Toplam Net Kilometre Maliyeti</td>
                        <td id="hc-mkbm-res-toplam">0.00 ₺ / km</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}