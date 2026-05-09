<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ekmek_hamuru_su_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bread-water',
        HC_PLUGIN_URL . 'modules/ekmek-hamuru-su-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bread-water-css',
        HC_PLUGIN_URL . 'modules/ekmek-hamuru-su-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bread-water">
        <h3>Hamur Hidrasyonu</h3>
        <div class="hc-form-group">
            <label for="hc-bw-flour">Un Miktarı (gr)</label>
            <input type="number" id="hc-bw-flour" value="500" min="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-bw-hydro">Hidrasyon Oranı (%)</label>
            <input type="number" id="hc-bw-hydro" value="65" min="50" max="100">
        </div>
        <button class="hc-btn" onclick="hcBreadWaterHesapla()">Su Ölçüsünü Gör</button>
        <div class="hc-result" id="hc-bread-water-result">
            <div class="hc-result-item">
                <span>Gereken Su:</span>
                <span class="hc-result-value" id="hc-res-bw-water">0 ml</span>
            </div>
            <p class="hc-bw-note">Klasik köy ekmeği için %65-70, ciabatta gibi gözenekli ekmekler için %80+ önerilir.</p>
        </div>
    </div>
    <?php
}
