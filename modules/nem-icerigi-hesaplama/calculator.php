<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_nem_icerigi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-moisture',
        HC_PLUGIN_URL . 'modules/nem-icerigi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-moisture">
        <h3>Nem İçeriği Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-mc-wet">Yaş Ağırlık (kg/g)</label>
            <input type="number" id="hc-mc-wet" placeholder="Yaş numune ağırlığı" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-mc-dry">Kuru Ağırlık (kg/g)</label>
            <input type="number" id="hc-mc-dry" placeholder="Kurutulmuş numune ağırlığı" step="any">
        </div>

        <button class="hc-btn" onclick="hcMcHesapla()">Nemi Hesapla</button>

        <div class="hc-result" id="hc-mc-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Yaş Bazda Nem (%):</span>
                <span class="hc-result-value" id="hc-mc-res-wet">--</span>
                <span class="hc-result-unit">%</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Kuru Bazda Nem (%):</span>
                <span id="hc-mc-res-dry">--</span>
                <span class="hc-result-unit">%</span>
            </div>
        </div>
    </div>
    <?php
}
