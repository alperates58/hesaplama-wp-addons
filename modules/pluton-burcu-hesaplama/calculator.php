<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pluton_burcu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pluton-burcu',
        HC_PLUGIN_URL . 'modules/pluton-burcu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pluton-burcu-css',
        HC_PLUGIN_URL . 'modules/pluton-burcu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pluton-burcu">
        <div class="hc-header">
            <h3>Plüton Burcu Hesaplama</h3>
            <p>Plüton güç, dönüşüm ve derin krizleri temsil eder. Bir burçta 12 ile 31 yıl arasında kalır.</p>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-pb-birthdate">Doğum Tarihiniz</label>
            <input type="date" id="hc-pb-birthdate" class="hc-input" required>
        </div>

        <button class="hc-btn" onclick="hcPlutonBurcuHesapla()">Plüton Burcumu Bul</button>

        <div class="hc-result" id="hc-pb-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Plüton Burcunuz:</span>
                <span class="hc-result-value" id="hc-pb-sign-name">-</span>
            </div>
            <div class="hc-result-content" id="hc-pb-sign-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
