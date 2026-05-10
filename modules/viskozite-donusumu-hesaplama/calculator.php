<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_viskozite_donusumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-viskozite-donusumu-hesaplama',
        HC_PLUGIN_URL . 'modules/viskozite-donusumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-viskozite-donusumu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/viskozite-donusumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-viscosity">
        <h3>Viskozite Dönüşümü</h3>
        <div class="hc-form-group">
            <label for="hc-v-val">Değer</label>
            <input type="number" id="hc-v-val" placeholder="Örn: 100">
        </div>
        <div class="hc-form-group">
            <label for="hc-v-type">Giriş Birimi</label>
            <select id="hc-v-type">
                <option value="cp_to_cst">cP (Centipoise) ➔ cSt</option>
                <option value="cst_to_cp">cSt (Centistokes) ➔ cP</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-v-rho">Yoğunluk (g/cm³)</label>
            <input type="number" id="hc-v-rho" value="1.0" step="0.001">
        </div>
        <button class="hc-btn" onclick="hcViskoziteDönüşümüHesapla()">Dönüştür</button>
        <div class="hc-result" id="hc-v-result">
            <div class="hc-result-label">Sonuç:</div>
            <div class="hc-result-value" id="hc-v-res">-</div>
        </div>
    </div>
    <?php
}
