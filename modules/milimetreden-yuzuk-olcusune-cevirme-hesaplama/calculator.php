<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_milimetreden_yuzuk_olcusune_cevirme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mm-to-ring',
        HC_PLUGIN_URL . 'modules/milimetreden-yuzuk-olcusune-cevirme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mm-to-ring-css',
        HC_PLUGIN_URL . 'modules/milimetreden-yuzuk-olcusune-cevirme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mm-to-ring">
        <h3>mm'den Yüzük Ölçüsü</h3>
        <div class="hc-form-group">
            <label for="hc-ring-mm">Parmak Çevresi (mm)</label>
            <input type="number" id="hc-ring-mm" placeholder="Örn: 54" step="0.1" min="40">
        </div>
        <button class="hc-btn" onclick="hcMmToRingHesapla()">Ölçüyü Bul</button>
        <div class="hc-result" id="hc-mm-to-ring-result">
            <div class="hc-result-item">
                <span>Yüzük Ölçünüz:</span>
                <span class="hc-result-value" id="hc-res-ring-size-mm">0</span>
            </div>
        </div>
    </div>
    <?php
}
