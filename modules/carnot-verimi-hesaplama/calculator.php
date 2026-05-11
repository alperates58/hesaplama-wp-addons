<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_carnot_verimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-carnot',
        HC_PLUGIN_URL . 'modules/carnot-verimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-carnot">
        <h3>Carnot Verimi Hesaplama</h3>
        <p><small>η = 1 - (T<sub>L</sub> / T<sub>H</sub>)</small></p>
        
        <div class="hc-form-group">
            <label>Sıcak Kaynak Sıcaklığı (T<sub>H</sub>, °C)</label>
            <input type="number" id="hc-cv-th" placeholder="Örn: 500" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Soğuk Kaynak Sıcaklığı (T<sub>L</sub>, °C)</label>
            <input type="number" id="hc-cv-tl" placeholder="Örn: 25" step="1">
        </div>
        
        <button class="hc-btn" onclick="hcCarnotHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-cv-result">
            <span>Maksimum Teorik Verim (η):</span>
            <div class="hc-result-value" id="hc-cv-res-val">%0</div>
            <small>Not: Gerçek motor verimi bu değerden her zaman küçüktür.</small>
        </div>
    </div>
    <?php
}
