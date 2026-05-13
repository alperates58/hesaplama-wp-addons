<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gunes_burcu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gunes-burcu',
        HC_PLUGIN_URL . 'modules/gunes-burcu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gunes-burcu-css',
        HC_PLUGIN_URL . 'modules/gunes-burcu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gunes-burcu">
        <div class="hc-header">
            <h3>Güneş Burcu Hesaplama</h3>
            <p>Doğum tarihinizi girerek temel karakterinizi şekillendiren güneş burcunuzu öğrenin.</p>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-gb-birthdate">Doğum Tarihiniz</label>
            <input type="date" id="hc-gb-birthdate" class="hc-input" required>
        </div>

        <button class="hc-btn" onclick="hcGunesBurcuHesapla()">Burcumu Hesapla</button>

        <div class="hc-result" id="hc-gb-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Güneş Burcunuz:</span>
                <span class="hc-result-value" id="hc-gb-sign-name">-</span>
            </div>
            <div class="hc-result-content" id="hc-gb-sign-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
