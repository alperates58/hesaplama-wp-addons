<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vucut_yuzey_alani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bsa',
        HC_PLUGIN_URL . 'modules/vucut-yuzey-alani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bsa-css',
        HC_PLUGIN_URL . 'modules/vucut-yuzey-alani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bsa">
        <h3>Vücut Yüzey Alanı (BSA)</h3>
        <div class="hc-form-group">
            <label for="hc-bsa-height">Boy (cm):</label>
            <input type="number" id="hc-bsa-height" placeholder="175">
        </div>
        <div class="hc-form-group">
            <label for="hc-bsa-weight">Kilo (kg):</label>
            <input type="number" id="hc-bsa-weight" placeholder="70">
        </div>
        <button class="hc-btn" onclick="hcBsaHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bsa-result">
            <strong>Toplam Yüzey Alanı:</strong>
            <div id="hc-bsa-res-val" class="hc-result-value">-</div>
            <span>m²</span>
            <p style="font-size:0.85em; margin-top:10px; opacity:0.8;">Mosteller formülü kullanılmıştır.</p>
        </div>
    </div>
    <?php
}
