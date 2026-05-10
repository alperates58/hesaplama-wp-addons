<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sos_olceklendirme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sauce-scale',
        HC_PLUGIN_URL . 'modules/sos-olceklendirme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-sauce-scale-calc">
        <h3>Sos Ölçeklendirme</h3>
        <div class="hc-form-group">
            <label for="hc-ss-orig">Orijinal Porsiyon:</label>
            <input type="number" id="hc-ss-orig" value="4">
        </div>
        <div class="hc-form-group">
            <label for="hc-ss-target">Hedef Porsiyon:</label>
            <input type="number" id="hc-ss-target" value="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-ss-amount">Orijinal Malzeme Miktarı (g/ml):</label>
            <input type="number" id="hc-ss-amount" placeholder="250">
        </div>
        <button class="hc-btn" onclick="hcSauceScaleHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-sauce-scale-result">
            <strong>Yeni Malzeme Miktarı:</strong>
            <div id="hc-ss-res" class="hc-result-value">-</div>
            <p id="hc-ss-info"></p>
        </div>
    </div>
    <?php
}
