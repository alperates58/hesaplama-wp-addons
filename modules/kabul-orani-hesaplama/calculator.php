<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kabul_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kabul-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/kabul-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kabul-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kabul-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kabul-orani">
        <h3>Kabul Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-acc-total">Toplam Başvuru / Üretim Adedi:</label>
            <input type="number" id="hc-acc-total" class="hc-input" placeholder="Örn: 500">
        </div>
        <div class="hc-form-group">
            <label for="hc-acc-count">Kabul Edilen Adet:</label>
            <input type="number" id="hc-acc-count" class="hc-input" placeholder="Örn: 450">
        </div>
        <button class="hc-btn" onclick="hcKabulOraniHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kabul-orani-result">
            <div class="hc-result-label">Kabul Oranı:</div>
            <div class="hc-result-value" id="hc-res-acc-ratio">-</div>
            <p id="hc-acc-desc" style="margin-top:10px; font-size:0.9em;"></p>
        </div>
    </div>
    <?php
}
