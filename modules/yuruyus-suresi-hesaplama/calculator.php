<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yuruyus_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-walk-time',
        HC_PLUGIN_URL . 'modules/yuruyus-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-walk-box">
        <h3>Yürüyüş Süresi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-wt-dist">Mesafe (km)</label>
            <input type="number" id="hc-wt-dist" step="0.1" placeholder="Örn: 5">
        </div>

        <div class="hc-form-group">
            <label for="hc-wt-speed">Yürüme Hızı (km/sa)</label>
            <select id="hc-wt-speed">
                <option value="3">Yavaş (Gezinti) - 3 km/sa</option>
                <option value="5" selected>Normal (Tempolu) - 5 km/sa</option>
                <option value="7">Hızlı (Power Walking) - 7 km/sa</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcYuruyusSüresiHesapla()">Süreyi Hesapla</button>

        <div class="hc-result" id="hc-walk-time-result">
            <div class="hc-result-item">
                <span>Tahmini Varış Süresi:</span>
                <div class="hc-result-value" id="hc-wt-value">-</div>
            </div>
        </div>
    </div>
    <?php
}
