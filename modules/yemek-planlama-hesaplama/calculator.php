<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yemek_planlama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-meal-planner',
        HC_PLUGIN_URL . 'modules/yemek-planlama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-meal-planner-calc">
        <h3>Haftalık Yemek Planlayıcı</h3>
        <div class="hc-form-group">
            <label for="hc-mp-people">Kişi Sayısı:</label>
            <input type="number" id="hc-mp-people" value="2">
        </div>
        <div class="hc-form-group">
            <label for="hc-mp-days">Gün Sayısı:</label>
            <input type="number" id="hc-mp-days" value="7">
        </div>
        <div class="hc-form-group">
            <label for="hc-mp-meals">Günlük Öğün Sayısı:</label>
            <input type="number" id="hc-mp-meals" value="2">
        </div>
        <button class="hc-btn" onclick="hcMealPlannerHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-meal-planner-result">
            <strong>Toplam İhtiyaç:</strong>
            <div id="hc-mp-val" class="hc-result-value">-</div>
            <p id="hc-mp-info"></p>
        </div>
    </div>
    <?php
}
