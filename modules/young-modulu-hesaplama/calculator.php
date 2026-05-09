<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_young_modulu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-young-modulus',
        HC_PLUGIN_URL . 'modules/young-modulu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-young-modulus-css',
        HC_PLUGIN_URL . 'modules/young-modulu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-young-modulus">
        <h3>Young (Elastisite) Modülü</h3>
        <div class="hc-form-group">
            <label for="hc-ym-stress">Gerilme (σ) [Pascal Pa]</label>
            <input type="number" id="hc-ym-stress" value="1000000" step="1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-ym-strain">Gerinim (ε) [Birim Değişim]</label>
            <input type="number" id="hc-ym-strain" value="0.001" step="0.0001">
        </div>
        <button class="hc-btn" onclick="hcYoungModulusHesapla()">Modülü Hesapla</button>
        <div class="hc-result" id="hc-young-modulus-result">
            <div class="hc-result-item">
                <span>Young Modülü (E):</span>
                <span class="hc-result-value" id="hc-res-ym-val">0 GPa</span>
            </div>
            <p class="hc-ym-note">E = σ / ε</p>
        </div>
    </div>
    <?php
}
