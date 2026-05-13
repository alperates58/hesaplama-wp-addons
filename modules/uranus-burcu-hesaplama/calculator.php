<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_uranus_burcu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-uranus-burcu',
        HC_PLUGIN_URL . 'modules/uranus-burcu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-uranus-burcu-css',
        HC_PLUGIN_URL . 'modules/uranus-burcu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-uranus-burcu">
        <div class="hc-header">
            <h3>Uranüs Burcu Hesaplama</h3>
            <p>Uranüs bir burçta yaklaşık 7 yıl kalır ve nesillerin değişim, teknoloji ve özgürlük anlayışını belirler.</p>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-ub-birthdate">Doğum Tarihiniz</label>
            <input type="date" id="hc-ub-birthdate" class="hc-input" required>
        </div>

        <button class="hc-btn" onclick="hcUranusBurcuHesapla()">Uranüs Burcumu Bul</button>

        <div class="hc-result" id="hc-ub-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Uranüs Burcunuz:</span>
                <span class="hc-result-value" id="hc-ub-sign-name">-</span>
            </div>
            <div class="hc-result-content" id="hc-ub-sign-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
