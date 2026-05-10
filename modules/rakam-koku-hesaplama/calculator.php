<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_rakam_koku_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-digit-root',
        HC_PLUGIN_URL . 'modules/rakam-koku-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-digit-root">
        <h3>Rakam Kökü Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dr-input">Sayıyı Giriniz:</label>
            <input type="number" id="hc-dr-input" placeholder="12345">
        </div>
        <button class="hc-btn" onclick="hcDigitRootHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-digit-root-result">
            <strong>Rakam Kökü:</strong>
            <div id="hc-dr-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
