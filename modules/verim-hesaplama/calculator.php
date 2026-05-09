<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_verim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-efficiency',
        HC_PLUGIN_URL . 'modules/verim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-efficiency-css',
        HC_PLUGIN_URL . 'modules/verim-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-efficiency">
        <h3>Sistem Verimliliği (%)</h3>
        <div class="hc-form-group">
            <label for="hc-eff-in">Giriş Gücü / Enerji (In)</label>
            <input type="number" id="hc-eff-in" value="1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-eff-out">Çıkış Gücü / Yararlı Enerji (Out)</label>
            <input type="number" id="hc-eff-out" value="850">
        </div>
        <button class="hc-btn" onclick="hcEfficiencyHesapla()">Verimi Hesapla</button>
        <div class="hc-result" id="hc-efficiency-result">
            <div class="hc-result-item">
                <span>Verimlilik:</span>
                <span class="hc-result-value" id="hc-res-eff-val">%0</span>
            </div>
            <div class="hc-result-item">
                <span>Kayıp Oranı:</span>
                <span id="hc-res-eff-loss">%0</span>
            </div>
        </div>
    </div>
    <?php
}
