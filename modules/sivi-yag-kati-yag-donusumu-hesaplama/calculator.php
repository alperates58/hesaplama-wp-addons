<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sivi_yag_kati_yag_donusumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-oil-conv',
        HC_PLUGIN_URL . 'modules/sivi-yag-kati-yag-donusumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-oil-conv-calc">
        <h3>Yağ Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-oc-orig">Elinizdeki Ölçü:</label>
            <select id="hc-oc-type">
                <option value="solid-to-liquid">Katı Yağ -> Sıvı Yağ</option>
                <option value="liquid-to-solid">Sıvı Yağ -> Katı Yağ</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-oc-val">Miktar (g veya ml):</label>
            <input type="number" id="hc-oc-val" placeholder="100">
        </div>
        <button class="hc-btn" onclick="hcOilConvHesapla()">Dönüştür</button>
        <div class="hc-result" id="hc-oil-conv-result">
            <strong>Eşdeğer Ölçü:</strong>
            <div id="hc-oc-res" class="hc-result-value">-</div>
            <p id="hc-oc-info"></p>
        </div>
    </div>
    <?php
}
