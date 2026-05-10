<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kemik_kutlesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bone-mass',
        HC_PLUGIN_URL . 'modules/kemik-kutlesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bone-mass-css',
        HC_PLUGIN_URL . 'modules/kemik-kutlesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bone-mass">
        <h3>Tahmini Kemik Kütlesi</h3>
        <div class="hc-form-group">
            <label for="hc-bm-weight">Toplam Kilo (kg):</label>
            <input type="number" id="hc-bm-weight" placeholder="70">
        </div>
        <button class="hc-btn" onclick="hcBoneMassHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bone-mass-result">
            <strong>Tahmini Kemik Ağırlığı:</strong>
            <div id="hc-bm-res-val" class="hc-result-value">-</div>
            <span>kg</span>
            <p style="font-size:0.85em; margin-top:10px; opacity:0.8;">Bu hesaplama genel bir istatistiksel tahmindir.</p>
        </div>
    </div>
    <?php
}
