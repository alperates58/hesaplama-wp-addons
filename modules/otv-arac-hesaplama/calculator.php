<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_otv_arac_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-otv-arac-hesaplama',
        HC_PLUGIN_URL . 'modules/otv-arac-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-otv-arac-hesaplama-css',
        HC_PLUGIN_URL . 'modules/otv-arac-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-otv-arac">
        <h3>ÖTV Hesaplama (Araç)</h3>
        <div class="hc-form-group">
            <label for="hc-otv-price">Vergisiz Araç Fiyatı (₺)</label>
            <input type="number" id="hc-otv-price" placeholder="Örn: 500.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-otv-engine">Motor Silindir Hacmi (cm³)</label>
            <select id="hc-otv-engine">
                <option value="1600">1600 cm³ ve altı</option>
                <option value="2000">1601 - 2000 cm³ arası</option>
                <option value="2001">2001 cm³ ve üzeri</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcOtvAracHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-otv-result">
            <div class="hc-result-item">
                <span>ÖTV Oranı:</span>
                <strong id="hc-otv-res-rate">-</strong>
            </div>
            <div class="hc-result-item">
                <span>ÖTV Tutarı:</span>
                <strong id="hc-otv-res-amount">-</strong>
            </div>
            <div class="hc-result-item">
                <span>KDV Tutarı (%20):</span>
                <strong id="hc-otv-res-kdv">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Anahtar Teslim Fiyatı:</span>
                <strong class="hc-result-value" id="hc-otv-res-total">-</strong>
            </div>
            <p class="hc-small-text">Hesaplamaya tescil masrafları ve MTV dahil değildir.</p>
        </div>
    </div>
    <?php
}
