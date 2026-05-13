<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vedik_burc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burc-vedik',
        HC_PLUGIN_URL . 'modules/vedik-burc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burc-vedik-css',
        HC_PLUGIN_URL . 'modules/vedik-burc-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burc-vedik">
        <div class="hc-header">
            <h3>Vedik (Hint) Burç Hesaplama</h3>
            <p>Vedik astroloji (Jyotish), ışığın bilimidir. Kaderinizi ve ruhsal ödevlerinizi Yıldızıl Zodyak üzerinden okur.</p>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-vb-birthdate">Doğum Tarihiniz</label>
            <input type="date" id="hc-vb-birthdate" class="hc-input" required>
        </div>

        <button class="hc-btn" onclick="hcVedikBurcHesapla()">Vedik Burcumu Bul</button>

        <div class="hc-result" id="hc-vb-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Vedik Burcunuz:</span>
                <span class="hc-result-value" id="hc-vb-value">-</span>
            </div>
            <div class="hc-result-content" id="hc-vb-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
