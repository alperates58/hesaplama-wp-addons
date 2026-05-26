<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_fazla_mesai_alacagi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fazla-mesai-alacagi',
        HC_PLUGIN_URL . 'modules/fazla-mesai-alacagi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-fazla-mesai-alacagi-css',
        HC_PLUGIN_URL . 'modules/fazla-mesai-alacagi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-fazla-mesai-alacagi-hesaplama">
        <h3>Fazla Mesai Alacağı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-fma-brut">Aylık Brüt Maaş (₺)</label>
            <input type="number" id="hc-fma-brut" placeholder="Örn: 45000" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-fma-saat">Aylık Toplam Fazla Mesai Süresi (Saat)</label>
            <input type="number" id="hc-fma-saat" placeholder="Örn: 20" min="0">
        </div>
        <button class="hc-btn" onclick="hcFazlaMesaiAlacagiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-fma-result">
            <h4>Fazla Çalışma Alacak Detayları:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Normal Çalışma Saatlik Ücreti</td>
                        <td id="hc-fma-res-saatlik-normal">0 ₺</td>
                    </tr>
                    <tr>
                        <td>Zamlı Fazla Mesai Saatlik Ücreti (%150)</td>
                        <td id="hc-fma-res-saatlik-zamli">0 ₺</td>
                    </tr>
                    <tr>
                        <td>Toplam Brüt Fazla Mesai Alacağı</td>
                        <td id="hc-fma-res-brut">0 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-blue-dark);">
                        <td>Toplam Net Fazla Mesai Alacağı</td>
                        <td id="hc-fma-res-net">0 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}