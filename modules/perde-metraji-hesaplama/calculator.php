<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_perde_metraji_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-curtain-meter',
        HC_PLUGIN_URL . 'modules/perde-metraji-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-curtain-meter-css',
        HC_PLUGIN_URL . 'modules/perde-metraji-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-curtain-meter">
        <h3>Perde Metrajı Hesapla</h3>
        <div class="hc-form-group">
            <label for="hc-cm-width">Gereken Kumaş Eni (cm)</label>
            <input type="number" id="hc-cm-width" placeholder="Örn: 600">
        </div>
        <div class="hc-form-group">
            <label for="hc-cm-roll">Kumaş Topu Eni (cm)</label>
            <select id="hc-cm-roll">
                <option value="280">280 cm (Standart)</option>
                <option value="300">300 cm</option>
                <option value="140">140 cm (Dar Top)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcCurtainMeterHesapla()">Metraj Hesapla</button>
        <div class="hc-result" id="hc-curtain-meter-result">
            <div class="hc-result-item">
                <span>Gereken Metraj:</span>
                <span class="hc-result-value" id="hc-res-cm-total">0 Metre</span>
            </div>
            <p class="hc-cm-note">Not: 280-300cm enindeki kumaşlarda tavan yüksekliği 280cm altındaysa, enini metraj olarak alabilirsiniz.</p>
        </div>
    </div>
    <?php
}
