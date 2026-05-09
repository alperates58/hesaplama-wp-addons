<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ucuncu_ceyrek_deger_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-q3-calc',
        HC_PLUGIN_URL . 'modules/ucuncu-ceyrek-deger-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-q3-calc-css',
        HC_PLUGIN_URL . 'modules/ucuncu-ceyrek-deger-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-q3-calc">
        <h3>Üçüncü Çeyrek (Q3)</h3>
        <div class="hc-form-group">
            <label for="hc-q3-data">Veri Seti (Virgül ile ayırın)</label>
            <textarea id="hc-q3-data" placeholder="Örn: 5, 10, 15, 20, 25, 30"></textarea>
        </div>
        <button class="hc-btn" onclick="hcQ3Hesapla()">Q3 Değerini Bul</button>
        <div class="hc-result" id="hc-q3-calc-result">
            <div class="hc-result-item">
                <span>Q3 Değeri:</span>
                <span class="hc-result-value" id="hc-res-q3-val">0</span>
            </div>
            <p class="hc-q3-note">Not: Verilerin %75'i bu değerin altında, %25'i ise üzerindedir.</p>
        </div>
    </div>
    <?php
}
