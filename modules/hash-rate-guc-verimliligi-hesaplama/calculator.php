<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hash_rate_guc_verimliligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hash-rate-verimlilik',
        HC_PLUGIN_URL . 'modules/hash-rate-guc-verimliligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hash-rate-verimlilik-css',
        HC_PLUGIN_URL . 'modules/hash-rate-guc-verimliligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hash-rate-guc-verimliligi-hesaplama">
        <h3>Hash Rate Güç Verimliliği Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-hrv-guc">Güç Tüketimi (Watt)</label>
            <input type="number" id="hc-hrv-guc" placeholder="Örn: 3250" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-hrv-has">Kazım Gücü (Hash Rate)</label>
            <input type="number" id="hc-hrv-has" placeholder="Örn: 140" step="any" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-hrv-birim">Kazım Gücü Birimi</label>
            <select id="hc-hrv-birim">
                <option value="TH" selected>TH/s (ASIC / Bitcoin)</option>
                <option value="GH">GH/s (Ethereum Classic vb.)</option>
                <option value="MH">MH/s (GPU / Altcoin)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcHashRateVerimlilikHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-hrv-result">
            <h4>Güç Verimlilik Sonucu:</h4>
            <table>
                <tbody>
                    <tr>
                        <td>Donanım Toplam Tüketimi</td>
                        <td id="hc-hrv-res-guc" style="font-weight:bold;">0 W</td>
                    </tr>
                    <tr>
                        <td>Toplam Kazım Gücü</td>
                        <td id="hc-hrv-res-has" style="font-weight:bold;">0 H/s</td>
                    </tr>
                    <tr style="font-size:16px; font-weight:bold; color:var(--hc-front-green);">
                        <td>Verimlilik Oranı</td>
                        <td id="hc-hrv-res-verimlilik">0.00 J/TH</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}