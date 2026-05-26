<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mma_guc_agirlik_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mma-power',
        HC_PLUGIN_URL . 'modules/mma-guc-agirlik-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mma-power-css',
        HC_PLUGIN_URL . 'modules/mma-guc-agirlik-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mma-guc-agirlik-orani-hesaplama">
        <h3>MMA Güç Ağırlık Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-mga-kilo">Vücut Ağırlığınız (kg)</label>
            <input type="number" id="hc-mga-kilo" placeholder="Örn: 77" step="any" min="30">
        </div>
        <div class="hc-form-group">
            <label for="hc-mga-bench">Bench Press 1 Rep Max (kg)</label>
            <input type="number" id="hc-mga-bench" placeholder="Örn: 90" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-mga-squat">Squat 1 Rep Max (kg)</label>
            <input type="number" id="hc-mga-squat" placeholder="Örn: 120" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-mga-deadlift">Deadlift 1 Rep Max (kg)</label>
            <input type="number" id="hc-mga-deadlift" placeholder="Örn: 140" min="0">
        </div>
        <button class="hc-btn" onclick="hcMmaGucHesapla()">Güç/Ağırlık Oranını Hesapla</button>
        
        <div class="hc-result" id="hc-mga-result">
            <h4>Güç Profil Analiziniz:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Toplam Kaldırılan Ağırlık</td>
                        <td id="hc-mga-res-toplam">0 kg</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Güç/Ağırlık Oranı (PMR)</td>
                        <td id="hc-mga-res-oran">0.00</td>
                    </tr>
                    <tr>
                        <td>Dövüşçü Güç Seviyesi Sınıfı</td>
                        <td id="hc-mga-res-sinif">Başlangıç</td>
                    </tr>
                    <tr>
                        <td>MMA Ring/Kafes Uygunluğu</td>
                        <td id="hc-mga-res-tavsiye">-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}