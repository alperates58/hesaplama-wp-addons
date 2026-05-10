<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kahve_kafein_etkisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-caff-effect',
        HC_PLUGIN_URL . 'modules/kahve-kafein-etkisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-caff-effect-calc">
        <h3>Kahve Kafein Etkisi</h3>
        <div class="hc-form-group">
            <label for="hc-effect-amount">Tüketilen Kafein (mg):</label>
            <input type="number" id="hc-effect-amount" placeholder="95">
            <small>1 fincan filtre kahve ~95mg</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-effect-time">Kaç Saat Önce Tüketildi?</label>
            <input type="number" id="hc-effect-time" placeholder="2" step="0.5">
        </div>
        <button class="hc-btn" onclick="hcCaffEffectHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-caff-effect-result">
            <strong>Vücuttaki Mevcut Miktar:</strong>
            <div id="hc-effect-val" class="hc-result-value">-</div>
            <p id="hc-effect-info"></p>
        </div>
    </div>
    <?php
}
