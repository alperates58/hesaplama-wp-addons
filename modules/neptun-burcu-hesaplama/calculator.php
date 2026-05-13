<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_neptun_burcu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-neptun-burcu',
        HC_PLUGIN_URL . 'modules/neptun-burcu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-neptun-burcu-css',
        HC_PLUGIN_URL . 'modules/neptun-burcu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-neptun-burcu">
        <div class="hc-header">
            <h3>Neptün Burcu Hesaplama</h3>
            <p>Neptün hayalleri, ruhsallığı ve kolektif ilhamı temsil eder. Bir burçta yaklaşık 14 yıl kalır.</p>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-nb-birthdate">Doğum Tarihiniz</label>
            <input type="date" id="hc-nb-birthdate" class="hc-input" required>
        </div>

        <button class="hc-btn" onclick="hcNeptunBurcuHesapla()">Neptün Burcumu Bul</button>

        <div class="hc-result" id="hc-nb-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Neptün Burcunuz:</span>
                <span class="hc-result-value" id="hc-nb-sign-name">-</span>
            </div>
            <div class="hc-result-content" id="hc-nb-sign-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
