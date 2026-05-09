<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_elektroliz_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-elektroliz',
        HC_PLUGIN_URL . 'modules/elektroliz-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-elektroliz-css',
        HC_PLUGIN_URL . 'modules/elektroliz-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-elektroliz">
        <h3>Elektroliz (Madde Miktarı) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-el-i">Akım Şiddeti (I - Amper)</label>
            <input type="number" id="hc-el-i" placeholder="Örn: 5" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-el-t">Süre (t - Saniye)</label>
            <input type="number" id="hc-el-t" placeholder="Örn: 3600" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-el-mw">Atom Kütlesi (Ma - g/mol)</label>
            <input type="number" id="hc-el-mw" placeholder="Örn: 63.5 (Bakır)" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-el-n">Tesir Değerliği (n)</label>
            <input type="number" id="hc-el-n" placeholder="Örn: 2 (Cu²+)" step="any">
        </div>
        <button class="hc-btn" onclick="hcElektrolizHesapla()">Kütle Hesapla</button>
        <div class="hc-result" id="hc-el-result">
            <div class="hc-result-label">Toplanan Madde Miktarı:</div>
            <div class="hc-result-value" id="hc-el-val">-</div>
            <div class="hc-result-note">m = (I * t * Ma) / (n * 96485)</div>
        </div>
    </div>
    <?php
}
