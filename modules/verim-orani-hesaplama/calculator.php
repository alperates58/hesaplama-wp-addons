<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_verim_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-eff-rate',
        HC_PLUGIN_URL . 'modules/verim-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-eff">
        <h3>Verim Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-er-out">Faydalı Çıktı:</label>
            <input type="number" id="hc-er-out" placeholder="80">
        </div>
        <div class="hc-form-group">
            <label for="hc-er-in">Toplam Girdi:</label>
            <input type="number" id="hc-er-in" placeholder="100">
        </div>
        <button class="hc-btn" onclick="hcEffRateHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-verim-orani-result">
            <strong>Verim Oranı:</strong>
            <div id="hc-er-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
