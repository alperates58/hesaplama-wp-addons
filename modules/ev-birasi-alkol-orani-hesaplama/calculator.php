<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ev_birasi_alkol_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-beer-abv',
        HC_PLUGIN_URL . 'modules/ev-birasi-alkol-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-beer-abv-css',
        HC_PLUGIN_URL . 'modules/ev-birasi-alkol-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ev-birasi-alkol-orani-hesaplama">
        <h3>Ev Birası Alkol Oranı (ABV) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-eba-og">İlk Yoğunluk - OG (Original Gravity)</label>
            <input type="number" id="hc-eba-og" value="1.050" step="0.001" min="1.000" max="1.200">
        </div>
        <div class="hc-form-group">
            <label for="hc-eba-fg">Son Yoğunluk - FG (Final Gravity)</label>
            <input type="number" id="hc-eba-fg" value="1.010" step="0.001" min="0.990" max="1.050">
        </div>
        <button class="hc-btn" onclick="hcBiraAbvHesapla()">Alkol Oranı Hesapla</button>
        
        <div class="hc-result" id="hc-eba-result">
            <h4>Bira Analiz Raporu:</h4>
            <table>
                <tbody>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Alkol Hacmi (ABV)</td>
                        <td id="hc-eba-res-abv">%0.00</td>
                    </tr>
                    <tr>
                        <td>Görünür Sindirim (Attenuation)</td>
                        <td id="hc-eba-res-atten">%0.0</td>
                    </tr>
                    <tr>
                        <td>Tahmini Kalori (330 ml Şişe)</td>
                        <td id="hc-eba-res-kalori">0 kcal</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}