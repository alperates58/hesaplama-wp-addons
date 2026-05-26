<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ihbar_tazminati_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ihbar-tazminati',
        HC_PLUGIN_URL . 'modules/ihbar-tazminati-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ihbar-tazminati-css',
        HC_PLUGIN_URL . 'modules/ihbar-tazminati-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ihbar-tazminati-hesaplama">
        <h3>İhbar Tazminatı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-it-maas">Brüt Aylık Maaş (₺)</label>
            <input type="number" id="hc-it-maas" placeholder="Örn: 30000" min="0">
        </div>
        <div class="hc-form-group">
            <label>Çalışma Süresi</label>
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                <input type="number" id="hc-it-yil" placeholder="Yıl" min="0" value="0">
                <input type="number" id="hc-it-ay" placeholder="Ay" min="0" max="11" value="0">
            </div>
        </div>
        <button class="hc-btn" onclick="hcIhbarTazminatiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-it-result">
            <h4>Hesaplanan İhbar Tazminatı Detayları:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>İhbar Süresi (Hafta)</td>
                        <td id="hc-it-res-sure" style="font-weight:bold;">0 Hafta (0 Gün)</td>
                    </tr>
                    <tr>
                        <td>Brüt İhbar Tazminatı</td>
                        <td id="hc-it-res-brut" style="font-weight:bold;">0 ₺</td>
                    </tr>
                    <tr>
                        <td>Gelir Vergisi Kesintisi (%15)</td>
                        <td id="hc-it-res-vergi" style="color:var(--hc-front-red);">0 ₺</td>
                    </tr>
                    <tr>
                        <td>Damga Vergisi Kesintisi (%0.759)</td>
                        <td id="hc-it-res-damga" style="color:var(--hc-front-red);">0 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Net Ödenecek İhbar Tazminatı</td>
                        <td id="hc-it-res-net">0 ₺</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}