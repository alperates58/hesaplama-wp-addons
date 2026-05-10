<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yillik_kilo_degisimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yearly-weight',
        HC_PLUGIN_URL . 'modules/yillik-kilo-degisimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yearly-weight-css',
        HC_PLUGIN_URL . 'modules/yillik-kilo-degisimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yearly-weight">
        <h3>Yıllık Kilo Tahmini</h3>
        <div class="hc-form-group">
            <label for="hc-yw-surplus">Günlük Kalori Dengesi (kcal):</label>
            <input type="number" id="hc-yw-surplus" placeholder="Örn: -200">
            <p style="font-size:0.8rem; margin-top:5px;">Eksi değer kilo kaybını, artı değer kilo alımını temsil eder.</p>
        </div>
        <button class="hc-btn" onclick="hcYearlyWeightHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-yearly-weight-result">
            <strong>1 Yıl Sonundaki Değişim:</strong>
            <div id="hc-yw-res-val" class="hc-result-value">-</div>
            <span>kg</span>
        </div>
    </div>
    <?php
}
