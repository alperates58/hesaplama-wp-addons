<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_plastik_atik_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-plastik-atik-miktari-hesaplama',
        HC_PLUGIN_URL . 'modules/plastik-atik-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-plastik-atik-miktari-hesaplama-css',
        HC_PLUGIN_URL . 'modules/plastik-atik-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-plastic-waste">
        <h3>Plastik Atık Miktarı</h3>
        <div class="hc-form-group">
            <label for="hc-pw-bottles">Haftalık Plastik Şişe (Adet)</label>
            <input type="number" id="hc-pw-bottles" placeholder="Örn: 10">
        </div>
        <div class="hc-form-group">
            <label for="hc-pw-bags">Haftalık Plastik Poşet (Adet)</label>
            <input type="number" id="hc-pw-bags" placeholder="Örn: 5">
        </div>
        <div class="hc-form-group">
            <label for="hc-pw-packaging">Haftalık Gıda Paketi (Adet)</label>
            <input type="number" id="hc-pw-packaging" placeholder="Örn: 15">
        </div>
        <button class="hc-btn" onclick="hcPlastikAtıkMiktarıHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-pw-result">
            <div class="hc-result-label">Yıllık Plastik Atık:</div>
            <div class="hc-result-value" id="hc-pw-val">-</div>
            <p id="hc-pw-info" style="margin-top:10px; font-size:0.85em; color:#666;"></p>
        </div>
    </div>
    <?php
}
