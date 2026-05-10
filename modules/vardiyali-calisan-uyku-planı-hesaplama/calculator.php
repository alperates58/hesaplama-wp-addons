<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vardiyali_calisan_uyku_planı_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-shift-sleep',
        HC_PLUGIN_URL . 'modules/vardiyali-calisan-uyku-planı-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-shift-sleep-css',
        HC_PLUGIN_URL . 'modules/vardiyali-calisan-uyku-planı-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-shift-sleep">
        <h3>Vardiyalı Çalışan Uyku Planı</h3>
        <div class="hc-form-group">
            <label for="hc-vcs-type">Vardiya Tipiniz:</label>
            <select id="hc-vcs-type">
                <option value="night">Gece Vardiyası (22:00 - 06:00)</option>
                <option value="evening">Akşam Vardiyası (16:00 - 00:00)</option>
                <option value="rotation">Dönüşümlü Vardiya</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcShiftSleepHesapla()">Planı Gör</button>
        <div class="hc-result" id="hc-shift-sleep-result">
            <div id="hc-vcs-res-content"></div>
        </div>
    </div>
    <?php
}
