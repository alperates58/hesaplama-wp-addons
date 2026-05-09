<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_compton_dalga_boyu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-compton-dalga-boyu-hesaplama',
        HC_PLUGIN_URL . 'modules/compton-dalga-boyu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-compton-dalga-boyu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/compton-dalga-boyu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-compton-dalga-boyu-hesaplama">
        <h3>Compton Dalga Boyu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cdb-type">Parçacık Tipi</label>
            <select id="hc-cdb-type" onchange="hcCDBToggle()">
                <option value="9.10938356e-31">Elektron</option>
                <option value="1.6726219e-27">Proton</option>
                <option value="1.67492747e-27">Nötron</option>
                <option value="custom">Özel Kütle Gir</option>
            </select>
        </div>
        <div class="hc-form-group" id="hc-cdb-mass-group" style="display:none;">
            <label for="hc-cdb-mass">Durgun Kütle (kg)</label>
            <input type="number" id="hc-cdb-mass" placeholder="Örn: 9.1e-31" step="any">
        </div>
        <button class="hc-btn" onclick="hcCDBHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cdb-result">
            <div class="hc-result-label">Compton Dalga Boyu (λ_C):</div>
            <div class="hc-result-value" id="hc-cdb-val">-</div>
            <div class="hc-result-note">λ_C = h / (m * c)</div>
        </div>
    </div>
    <?php
}
