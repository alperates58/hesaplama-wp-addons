<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kripto_sermaye_kazanci_vergi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kripto-sermaye-kazanci',
        HC_PLUGIN_URL . 'modules/kripto-sermaye-kazanci-vergi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kripto-sermaye-kazanci-css',
        HC_PLUGIN_URL . 'modules/kripto-sermaye-kazanci-vergi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kripto-sermaye-kazanci-vergi-hesaplama">
        <h3>Kripto Sermaye Kazancı Vergi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-skv-alis">Toplam Alış Maliyeti ($ veya ₺)</label>
            <input type="number" id="hc-skv-alis" placeholder="Örn: 25000" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-skv-satis">Toplam Satış Değeri ($ veya ₺)</label>
            <input type="number" id="hc-skv-satis" placeholder="Örn: 35000" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-skv-oran">Vergi Oranı (%)</label>
            <input type="number" id="hc-skv-oran" placeholder="Örn: 20" step="any" min="0" value="20">
        </div>
        <button class="hc-btn" onclick="hcKriptoSermayeKazanciHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-skv-result">
            <h4>Vergi Sonuç Raporu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Sermaye Kazancı (Kar / Zarar)</td>
                        <td id="hc-skv-res-kazanc" style="font-weight:bold;">0.00</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-red);">
                        <td>Ödenecek Vergi Tutarı</td>
                        <td id="hc-skv-res-vergi">0.00</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Net Kar (Vergi Sonrası)</td>
                        <td id="hc-skv-res-net">0.00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}