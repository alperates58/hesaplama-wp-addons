<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sidereal_burc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burc-sidereal',
        HC_PLUGIN_URL . 'modules/sidereal-burc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burc-sidereal-css',
        HC_PLUGIN_URL . 'modules/sidereal-burc-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burc-sidereal">
        <div class="hc-header">
            <h3>Sidereal (Yıldızıl) Burç Hesaplama</h3>
            <p>Sidereal sistem, gökyüzündeki gerçek yıldız konumlarını esas alır. Batı (Tropikal) burcunuzdan yaklaşık 24 derece geridedir.</p>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-sb-birthdate">Doğum Tarihiniz</label>
            <input type="date" id="hc-sb-birthdate" class="hc-input" required>
        </div>

        <button class="hc-btn" onclick="hcSiderealBurcHesapla()">Yıldızıl Burcumu Bul</button>

        <div class="hc-result" id="hc-sb-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Yıldızıl Burcunuz:</span>
                <span class="hc-result-value" id="hc-sb-value">-</span>
            </div>
            <div class="hc-result-content" id="hc-sb-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
