<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ustel_fonksiyon_degeri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-exp-func',
        HC_PLUGIN_URL . 'modules/ustel-fonksiyon-degeri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ef">
        <h3>Üstel Fonksiyon Değeri (a<sup>x</sup>)</h3>
        <div class="hc-form-group">
            <label>Taban (a):</label>
            <input type="text" id="hc-ef-a" placeholder="e veya sayı (örn: 2.718)">
            <p style="font-size:0.7rem; color:#888;">Doğal logaritma tabanı için 'e' yazabilirsiniz.</p>
        </div>
        <div class="hc-form-group">
            <label>Üs (x):</label>
            <input type="number" id="hc-ef-x" step="any" placeholder="2">
        </div>
        <button class="hc-btn" onclick="hcExpFuncHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ustel-fonksiyon-result">
            <strong>Sonuç:</strong>
            <div id="hc-ef-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
