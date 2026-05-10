<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kaynak_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-welding-calc',
        HC_PLUGIN_URL . 'modules/kaynak-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-welding-calc-css',
        HC_PLUGIN_URL . 'modules/kaynak-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-welding">
        <h3>Kaynak Sarfiyat Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-wc-len">Toplam Kaynak Boyu (m):</label>
            <input type="number" id="hc-wc-len" placeholder="10.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-wc-leg">Kaynak Boğaz Kalınlığı (a - mm):</label>
            <input type="number" id="hc-wc-leg" placeholder="5">
        </div>
        <div class="hc-form-group">
            <label for="hc-wc-type">Kaynak Tipi:</label>
            <select id="hc-wc-type">
                <option value="0.785">Köşe Kaynağı (Fillet)</option>
                <option value="1.0">V Kaynağı (Butt Weld)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcWeldingCalcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-welding-result">
            <strong>Gereken Kaynak Metali:</strong>
            <div id="hc-wc-res-val" class="hc-result-value">-</div>
            <span>Kilogram (kg)</span>
        </div>
    </div>
    <?php
}
