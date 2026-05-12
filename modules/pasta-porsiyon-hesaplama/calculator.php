<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pasta_porsiyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cake-portion-js',
        HC_PLUGIN_URL . 'modules/pasta-porsiyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cake-portion-css',
        HC_PLUGIN_URL . 'modules/pasta-porsiyon-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cake-portion">
        <h3>Pasta Porsiyon Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-cp-shape">Pasta Şekli</label>
            <select id="hc-cp-shape" onchange="hcCakeShapeChange()">
                <option value="round">Yuvarlak</option>
                <option value="square">Kare / Dikdörtgen</option>
            </select>
        </div>

        <div id="hc-cp-round-inputs">
            <div class="hc-form-group">
                <label for="hc-cp-diameter">Çap (cm)</label>
                <input type="number" id="hc-cp-diameter" value="20" min="5">
            </div>
        </div>

        <div id="hc-cp-square-inputs" style="display:none;">
            <div class="hc-form-group">
                <label for="hc-cp-width">Kenar 1 (cm)</label>
                <input type="number" id="hc-cp-width" value="20" min="5">
            </div>
            <div class="hc-form-group">
                <label for="hc-cp-length">Kenar 2 (cm)</label>
                <input type="number" id="hc-cp-length" value="20" min="5">
            </div>
        </div>

        <button class="hc-btn" onclick="hcPastaPorsiyonHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-cake-portion-result">
            <div class="hc-result-item">
                <span>Tahmini Porsiyon Sayısı:</span>
                <strong class="hc-result-value" id="hc-cp-res-val">-</strong>
            </div>
            <div class="hc-result-note">Hesaplama, standart party porsiyon boyutları baz alınarak yapılmıştır.</div>
        </div>
    </div>
    <?php
}
