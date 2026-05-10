<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kan_hacmi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kan-hacmi-hesaplama',
        HC_PLUGIN_URL . 'modules/kan-hacmi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kan-hacmi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kan-hacmi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-blood-vol">
        <h3>Kan Hacmi Hesaplama (Nadler)</h3>
        <div class="hc-form-group">
            <label>Cinsiyet</label>
            <select id="hc-bv-gender">
                <option value="male">Erkek</option>
                <option value="female">Kadın</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-bv-height">Boy (cm)</label>
            <input type="number" id="hc-bv-height" placeholder="180">
        </div>
        <div class="hc-form-group">
            <label for="hc-bv-weight">Kilo (kg)</label>
            <input type="number" id="hc-bv-weight" placeholder="75">
        </div>
        <button class="hc-btn" onclick="hcKanHacmiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bv-result">
            <div class="hc-result-label">Toplam Kan Hacmi:</div>
            <div class="hc-result-value" id="hc-bv-val">-</div>
        </div>
    </div>
    <?php
}
