<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_makine_kullanilabilirlik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-availability',
        HC_PLUGIN_URL . 'modules/makine-kullanilabilirlik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-availability">
        <h3>Makine Kullanılabilirlik (Availability) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-av-planned">Planlanan Üretim Süresi (Dakika)</label>
            <input type="number" id="hc-av-planned" placeholder="Dakika" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-av-downtime">Planlanmamış Duruşlar (Dakika)</label>
            <input type="number" id="hc-av-downtime" placeholder="Dakika" step="any">
        </div>

        <button class="hc-btn" onclick="hcAvHesapla()">Kullanılabilirliği Hesapla</button>

        <div class="hc-result" id="hc-av-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Kullanılabilirlik Oranı:</span>
                <span class="hc-result-value" id="hc-av-res-total">--</span>
                <span class="hc-result-unit">%</span>
            </div>
            <p id="hc-av-status" style="text-align:center; font-weight:600; margin-top:10px;"></p>
        </div>
    </div>
    <?php
}
