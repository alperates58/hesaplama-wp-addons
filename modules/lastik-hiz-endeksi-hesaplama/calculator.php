<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lastik_hiz_endeksi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-speed-index',
        HC_PLUGIN_URL . 'modules/lastik-hiz-endeksi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-hiz-box">
        <h3>Lastik Hız Endeksi Sorgulama</h3>
        <div class="hc-form-group">
            <label>Hız Sembolü</label>
            <select id="hc-hiz-input">
                <option value="160">Q (160 km/h)</option>
                <option value="170">R (170 km/h)</option>
                <option value="180">S (180 km/h)</option>
                <option value="190">T (190 km/h)</option>
                <option value="200">U (200 km/h)</option>
                <option value="210" selected>H (210 km/h)</option>
                <option value="240">V (240 km/h)</option>
                <option value="270">W (270 km/h)</option>
                <option value="300">Y (300 km/h)</option>
                <option value="301">(Y) (300+ km/h)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcHizSorgula()">Sorgula</button>
        <div class="hc-result" id="hc-hiz-result">
            <div class="hc-result-title">Maksimum Güvenli Hız:</div>
            <div class="hc-result-value" id="hc-hiz-val">-</div>
        </div>
    </div>
    <?php
}
