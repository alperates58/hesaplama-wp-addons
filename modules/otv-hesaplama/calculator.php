<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_otv_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-otv-hesapla',
        HC_PLUGIN_URL . 'modules/otv-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-otv-hesapla-css',
        HC_PLUGIN_URL . 'modules/otv-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-otv">
        <h3>ÖTV ve KDV Hesaplama (Araç)</h3>
        <div class="hc-form-group">
            <label for="hc-otv-net">Aracın Vergisiz (Ham) Fiyatı (₺)</label>
            <input type="number" id="hc-otv-net" placeholder="Örn: 500.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-otv-cc">Motor Silindir Hacmi (cm³)</label>
            <select id="hc-otv-cc">
                <option value="1600">1600 cm³'e kadar</option>
                <option value="2000">1601 - 2000 cm³</option>
                <option value="2001">2000 cm³ üzeri</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcOtvHesapla()">Vergili Fiyatı Hesapla</button>
        <div class="hc-result" id="hc-otv-result">
            <div class="hc-result-item">
                <span>Uygulanan ÖTV Oranı:</span>
                <strong id="hc-otv-res-rate">-</strong>
            </div>
            <div class="hc-result-item">
                <span>ÖTV Tutarı:</span>
                <strong id="hc-otv-res-otv">-</strong>
            </div>
            <div class="hc-result-item">
                <span>KDV Tutarı (%20):</span>
                <strong id="hc-otv-res-kdv">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Anahtar Teslim Fiyatı:</span>
                <strong class="hc-result-value" id="hc-otv-res-total">-</strong>
            </div>
        </div>
    </div>
    <?php
}
