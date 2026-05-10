<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_seker_surubu_yogunluk_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-syrup-density',
        HC_PLUGIN_URL . 'modules/seker-surubu-yogunluk-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-syrup-density-calc">
        <h3>Şeker Şurubu (Brix) Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-sd-sugar">Şeker Miktarı (g):</label>
            <input type="number" id="hc-sd-sugar" placeholder="500">
        </div>
        <div class="hc-form-group">
            <label for="hc-sd-water">Su Miktarı (ml):</label>
            <input type="number" id="hc-sd-water" placeholder="500">
        </div>
        <button class="hc-btn" onclick="hcSyrupDensityHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-syrup-density-result">
            <strong>Şeker Oranı (Brix):</strong>
            <div id="hc-sd-val" class="hc-result-value">-</div>
            <p id="hc-sd-info"></p>
        </div>
    </div>
    <?php
}
