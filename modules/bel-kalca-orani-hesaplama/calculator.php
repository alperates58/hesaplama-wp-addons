<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bel_kalca_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-whr',
        HC_PLUGIN_URL . 'modules/bel-kalca-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-whr-css',
        HC_PLUGIN_URL . 'modules/bel-kalca-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-whr">
        <h3>Bel Kalça Oranı (WHR)</h3>
        <div class="hc-form-group">
            <label>Cinsiyet:</label>
            <select id="hc-whr-gender">
                <option value="male">Erkek</option>
                <option value="female">Kadın</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-whr-waist">Bel Çevresi (cm):</label>
            <input type="number" id="hc-whr-waist" placeholder="85">
        </div>
        <div class="hc-form-group">
            <label for="hc-whr-hip">Kalça Çevresi (cm):</label>
            <input type="number" id="hc-whr-hip" placeholder="95">
        </div>
        <button class="hc-btn" onclick="hcWhrHesapla()">Oranı Hesapla</button>
        <div class="hc-result" id="hc-whr-result">
            <strong>Oran: <span id="hc-whr-res-val" class="hc-result-value">-</span></strong>
            <div id="hc-whr-res-desc" style="margin-top:10px; font-weight:bold;"></div>
        </div>
    </div>
    <?php
}
