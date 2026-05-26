<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tapu_harci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tapu-harci',
        HC_PLUGIN_URL . 'modules/tapu-harci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tapu-harci-css',
        HC_PLUGIN_URL . 'modules/tapu-harci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tapu-harci-hesaplama">
        <h3>Tapu Harcı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-th-bedel">Gayrimenkul Alış / Satış Bedeli (Beyan Edilecek Tutar) (₺)</label>
            <input type="number" id="hc-th-bedel" placeholder="Örn: 3000000" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-th-doner">Döner Sermaye Bedeli (2026 Yılı Maktu Tutarı) (₺)</label>
            <input type="number" id="hc-th-doner" placeholder="Örn: 1300" min="0" value="1300">
        </div>
        <button class="hc-btn" onclick="hcTapuHarciHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-th-result">
            <h4>Hesaplanan Tapu Masrafları:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Toplam Tapu Harcı (%4)</td>
                        <td id="hc-th-res-toplam-harc" style="font-weight:bold;">0 ₺</td>
                    </tr>
                    <tr>
                        <td>Alıcı Payı (%2 Harç + Döner Sermaye)</td>
                        <td id="hc-th-res-alici" style="color:var(--hc-front-blue-dark); font-weight:bold;">0 ₺</td>
                    </tr>
                    <tr>
                        <td>Satıcı Payı (%2 Harç)</td>
                        <td id="hc-th-res-satici" style="color:var(--hc-front-blue-dark); font-weight:bold;">0 ₺</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Toplam Masraf (Harç + Döner Sermaye)</td>
                        <td id="hc-th-res-toplam">0 ₺</td>
                    </tr>
                </tbody>
            </table>
            <div style="margin-top:14px; padding:10px; background:#fffbeb; border:1px solid #fde68a; border-radius:8px; font-size:12px; color:#b45309; line-height:1.4;">
                * Dikkat: Tapu harcı beyanının gerçek alım satım bedeli üzerinden yapılması zorunludur. Düşük bedelle beyan yapılması durumunda vergi dairelerince aradaki farkın harcı ile birlikte gecikme faizi ve vergi ziyaı cezası kesilmektedir.
            </div>
        </div>
    </div>
    <?php
}