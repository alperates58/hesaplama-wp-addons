<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_santimetreden_yuzuk_olcusune_cevirme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cm-to-ring',
        HC_PLUGIN_URL . 'modules/santimetreden-yuzuk-olcusune-cevirme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cm-to-ring-css',
        HC_PLUGIN_URL . 'modules/santimetreden-yuzuk-olcusune-cevirme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cm-to-ring">
        <h3>cm'den Yüzük Ölçüsü</h3>
        <div class="hc-form-group">
            <label for="hc-ring-cm">Parmak Çevresi (cm)</label>
            <input type="number" id="hc-ring-cm" placeholder="Örn: 5.4" step="0.1" min="4">
        </div>
        <button class="hc-btn" onclick="hcCmToRingHesapla()">Ölçüyü Bul</button>
        <div class="hc-result" id="hc-cm-to-ring-result">
            <div class="hc-result-item">
                <span>Yüzük Ölçünüz:</span>
                <span class="hc-result-value" id="hc-res-ring-size-cm">0</span>
            </div>
        </div>
    </div>
    <?php
}
