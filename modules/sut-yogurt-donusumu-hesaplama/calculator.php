<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sut_yogurt_donusumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-milk-yogurt',
        HC_PLUGIN_URL . 'modules/sut-yogurt-donusumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-milk-yogurt-calc">
        <h3>Süt -> Yoğurt Dönüşümü</h3>
        <div class="hc-form-group">
            <label for="hc-my-milk">Süt Miktarı (Litre):</label>
            <input type="number" id="hc-my-milk" placeholder="5" step="0.5">
        </div>
        <button class="hc-btn" onclick="hcMilkYogurtHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-milk-yogurt-result">
            <strong>Tahmini Sonuçlar:</strong>
            <div id="hc-my-res-list" style="margin-top:10px;">-</div>
        </div>
    </div>
    <?php
}
