<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_icra_vekalet_ucreti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-icra-vekalet-ucreti',
        HC_PLUGIN_URL . 'modules/icra-vekalet-ucreti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-icra-vekalet-ucreti-css',
        HC_PLUGIN_URL . 'modules/icra-vekalet-ucreti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-icra-vekalet-ucreti-hesaplama">
        <h3>İcra Vekalet Ücreti Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ivu-tutar">Takip Tutarı (İcra Borç Tutarı) (₺)</label>
            <input type="number" id="hc-ivu-tutar" placeholder="Örn: 120000" min="0">
        </div>
        <button class="hc-btn" onclick="hcIcraVekaletHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ivu-result">
            <h4>Hesaplanan Karşı Taraf Vekalet Ücreti:</h4>
            <div class="hc-result-value" id="hc-ivu-val">0 ₺</div>
            <div style="margin-top:14px;">
                <span style="font-weight:bold; font-size:12px; display:block; margin-bottom:6px;">Uygulanan 2025-2026 AAÜT Kademeleri:</span>
                <table style="font-size:11px;">
                    <thead>
                        <tr>
                            <th>Kademeler</th>
                            <th>Oran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>İlk 600.000 ₺ İçin</td><td>%16</td></tr>
                        <tr><td>Sonra Gelen 600.000 ₺ İçin</td><td>%15</td></tr>
                        <tr><td>Sonra Gelen 1.200.000 ₺ İçin</td><td>%14</td></tr>
                        <tr><td>Sonra Gelen 1.200.000 ₺ İçin</td><td>%13</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}