<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sarap_alkol_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-wine-abv',
        HC_PLUGIN_URL . 'modules/sarap-alkol-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-wine-abv-css',
        HC_PLUGIN_URL . 'modules/sarap-alkol-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sarap-alkol-orani-hesaplama">
        <h3>Şarap Alkol Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-sao-olcek">Kullanılan Ölçüm Ölçeği</label>
            <select id="hc-sao-olcek" onchange="hcSarapOlcekDegisti()">
                <option value="brix">Brix (%)</option>
                <option value="sg" selected>Gravity (SG - Özgül Ağırlık)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-sao-baslangic" id="hc-sao-lbl-bas">Başlangıç Değeri (SG)</label>
            <input type="number" id="hc-sao-baslangic" value="1.095" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-sao-bitis" id="hc-sao-lbl-bit">Bitiş Değeri (SG)</label>
            <input type="number" id="hc-sao-bitis" value="0.995" step="any">
        </div>
        <button class="hc-btn" onclick="hcSarapAbvHesapla()">Alkol Oranını Hesapla</button>
        
        <div class="hc-result" id="hc-sao-result">
            <h4>Şarap Fermantasyon Analizi:</h4>
            <table>
                <tbody>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Tahmini Alkol Hacmi (ABV)</td>
                        <td id="hc-sao-res-abv">%0.00</td>
                    </tr>
                    <tr>
                        <td>Maya Şeker Tüketim Başarısı</td>
                        <td id="hc-sao-res-seker">Kuru Şarap (%0-0.2 Kalan Şeker)</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}