<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_freelance_proje_fiyat_teklifi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-freelance-proje-fiyat',
        HC_PLUGIN_URL . 'modules/freelance-proje-fiyat-teklifi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-freelance-proje-fiyat-css',
        HC_PLUGIN_URL . 'modules/freelance-proje-fiyat-teklifi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-freelance-proje-fiyat-hesaplama">
        <h3>Freelance Proje Fiyat Teklifi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-fpf-saatlik">Saatlik Ücretiniz (₺ veya $)</label>
            <input type="number" id="hc-fpf-saatlik" placeholder="Örn: 500" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-fpf-sure">Tahmini Çalışma Süresi (Saat)</label>
            <input type="number" id="hc-fpf-sure" placeholder="Örn: 40" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-fpf-gider">Proje Ek Giderleri (Yazılım lisansı, reklam vb.) (₺ veya $)</label>
            <input type="number" id="hc-fpf-gider" placeholder="Örn: 2000" step="any" min="0" value="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-fpf-marj">Hedef Kar Marjı (%)</label>
            <input type="number" id="hc-fpf-marj" placeholder="Örn: 20" step="any" min="0" value="20">
        </div>
        <button class="hc-btn" onclick="hcFreelanceProjeFiyatHesapla()">Teklifi Hesapla</button>
        <div class="hc-result" id="hc-fpf-result">
            <h4>Fiyat Teklifi Detayları:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Emeğin Maliyeti (Saat x Ücret)</td>
                        <td id="hc-fpf-res-emek" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr>
                        <td>Ek Giderler</td>
                        <td id="hc-fpf-res-gider" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr>
                        <td>Eklenen Kar Tutarı</td>
                        <td id="hc-fpf-res-kar" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Önerilen Fiyat Teklifi (KDV Hariç)</td>
                        <td id="hc-fpf-res-toplam">0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}