<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hacmen_alkol_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-abv-calc',
        HC_PLUGIN_URL . 'modules/hacmen-alkol-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-abv-calc-div">
        <h3>Hacmen Alkol Oranı (ABV)</h3>
        <div class="hc-form-group">
            <label for="hc-abv-total">Toplam Hacim (ml):</label>
            <input type="number" id="hc-abv-total" placeholder="1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-abv-alcohol">Saf Alkol Hacmi (ml):</label>
            <input type="number" id="hc-abv-alcohol" placeholder="50">
        </div>
        <button class="hc-btn" onclick="hcAbvHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-abv-result">
            <strong>Alkol Oranı:</strong>
            <div id="hc-abv-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
