<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sat_puan_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sat-calc',
        HC_PLUGIN_URL . 'modules/sat-puan-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-sat-calc-box">
        <h3>SAT Puan Hesaplama</h3>
        <div class="hc-form-group">
            <label>Evidence-Based Reading and Writing (200-800)</label>
            <input type="number" id="hc-sat-rw" placeholder="Puan" min="200" max="800">
        </div>
        <div class="hc-form-group">
            <label>Math (200-800)</label>
            <input type="number" id="hc-sat-math" placeholder="Puan" min="200" max="800">
        </div>
        <button class="hc-btn" onclick="hcSatHesapla()">Toplam Puanı Hesapla</button>
        <div class="hc-result" id="hc-sat-result">
            <div class="hc-result-title">Toplam SAT Skoru:</div>
            <div class="hc-result-value" id="hc-sat-val">-</div>
        </div>
    </div>
    <?php
}
