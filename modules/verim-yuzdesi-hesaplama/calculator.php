<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_verim_yuzdesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-eff-pct',
        HC_PLUGIN_URL . 'modules/verim-yuzdesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ep">
        <h3>Verim Yüzdesi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ep-real">Gerçek Verim:</label>
            <input type="number" id="hc-ep-real" placeholder="75">
        </div>
        <div class="hc-form-group">
            <label for="hc-ep-theo">Teorik Verim:</label>
            <input type="number" id="hc-ep-theo" placeholder="100">
        </div>
        <button class="hc-btn" onclick="hcEffPctHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-verim-yuzdesi-result">
            <strong>Verim Yüzdesi:</strong>
            <div id="hc-ep-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
