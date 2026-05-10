<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_goreceli_degisim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rel-change',
        HC_PLUGIN_URL . 'modules/goreceli-degisim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-rel-change-css',
        HC_PLUGIN_URL . 'modules/goreceli-degisim-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rel-change">
        <h3>Göreceli Değişim Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-rc-v1">Başlangıç Değeri (V₁):</label>
            <input type="number" id="hc-rc-v1" step="0.01" placeholder="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-rc-v2">Yeni Değer (V₂):</label>
            <input type="number" id="hc-rc-v2" step="0.01" placeholder="120">
        </div>
        <button class="hc-btn" onclick="hcRelChangeHesapla()">Değişimi Hesapla</button>
        <div class="hc-result" id="hc-rel-change-result">
            <strong>Göreceli Değişim:</strong>
            <div id="hc-rc-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
