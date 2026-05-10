<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_npk_gubre_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-npk-calc',
        HC_PLUGIN_URL . 'modules/npk-gubre-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-npk-calc-css',
        HC_PLUGIN_URL . 'modules/npk-gubre-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-npk-calc">
        <h3>NPK Gübre Dozajı</h3>
        <div class="hc-form-group">
            <label for="hc-np-target">Hedef Azot (N) Miktarı (kg/hektar):</label>
            <input type="number" id="hc-np-target" placeholder="50">
        </div>
        <div class="hc-form-group">
            <label for="hc-np-fertilizer">Gübredeki N Oranı (%):</label>
            <input type="number" id="hc-np-fertilizer" placeholder="20">
            <small>Örn: 20-10-10 gübre için 20 girin.</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-np-area">Uygulama Alanı (m²):</label>
            <input type="number" id="hc-np-area" placeholder="1000">
        </div>
        <button class="hc-btn" onclick="hcNpkHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-npk-calc-result">
            <strong>Gereken Gübre Miktarı:</strong>
            <div id="hc-np-res-val" class="hc-result-value">-</div>
            <span>kg</span>
        </div>
    </div>
    <?php
}
