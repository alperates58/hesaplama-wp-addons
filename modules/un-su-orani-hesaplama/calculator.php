<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_un_su_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-flour-water-js',
        HC_PLUGIN_URL . 'modules/un-su-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-flour-water-css',
        HC_PLUGIN_URL . 'modules/un-su-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-flour-water">
        <h3>Hidrasyon (Un-Su) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-fw-flour">Un Miktarı (Gram)</label>
            <input type="number" id="hc-fw-flour" value="500" min="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-fw-ratio">Hidrasyon Oranı (%)</label>
            <input type="number" id="hc-fw-ratio" value="65" min="1" max="100">
            <small>Ekmek için %60-70 arası idealdir. Pizza için %55-65.</small>
        </div>

        <button class="hc-btn" onclick="hcHidrasyonHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-flour-water-result">
            <div class="hc-result-item">
                <span>Gereken Su Miktarı:</span>
                <strong class="hc-result-value" id="hc-fw-res-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Toplam Hamur Ağırlığı:</span>
                <strong id="hc-fw-total-val">-</strong>
            </div>
        </div>
    </div>
    <?php
}
