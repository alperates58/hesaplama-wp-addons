<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_piston_hizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-piston-hiz',
        HC_PLUGIN_URL . 'modules/piston-hizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-piston-hiz">
        <h3>Piston Hızı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ph-stroke">Strok Boyu (mm)</label>
            <input type="number" id="hc-ph-stroke" placeholder="mm" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-ph-rpm">Motor Devri (RPM)</label>
            <input type="number" id="hc-ph-rpm" placeholder="devir/dakika" step="any">
        </div>

        <button class="hc-btn" onclick="hcPistonHizHesapla()">Hızı Hesapla</button>

        <div class="hc-result" id="hc-ph-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Ortalama Piston Hızı:</span>
                <span class="hc-result-value" id="hc-ph-res-total">--</span>
                <span class="hc-result-unit">m/s</span>
            </div>
        </div>
    </div>
    <?php
}
