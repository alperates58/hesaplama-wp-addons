<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kilo_almak_icin_kalori_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-wa-calories',
        HC_PLUGIN_URL . 'modules/kilo-almak-icin-kalori-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-wa-calories-css',
        HC_PLUGIN_URL . 'modules/kilo-almak-icin-kalori-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-wa-calories">
        <h3>Kilo Alma Kalori Planlayıcı</h3>
        <div class="hc-form-group">
            <label for="hc-wac-bmr">Günlük Yakılan Kalori (Tahmini):</label>
            <input type="number" id="hc-wac-bmr" placeholder="2000">
        </div>
        <div class="hc-form-group">
            <label for="hc-wac-goal">Hedef:</label>
            <select id="hc-wac-goal">
                <option value="300">Hafif Fazla (+300 kcal)</option>
                <option value="500">Normal Fazla (+500 kcal)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcWacHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-wa-calories-result">
            <strong>Hedef Günlük Kalori:</strong>
            <div id="hc-wac-res-val" class="hc-result-value">-</div>
            <span>kcal</span>
        </div>
    </div>
    <?php
}
