<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sogutma_yuku_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cooling-load',
        HC_PLUGIN_URL . 'modules/sogutma-yuku-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cooling-load-css',
        HC_PLUGIN_URL . 'modules/sogutma-yuku-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cooling-load">
        <h3>Soğutma Yükü Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-cl-mass">Kütle (m) [kg]</label>
            <input type="number" id="hc-cl-mass" value="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-cl-cp">Özgül Isı (Cp) [kJ/kg.K]</label>
            <input type="number" id="hc-cl-cp" value="4.18">
            <small>Su: 4.18, Hava: 1.0</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-cl-dt">Sıcaklık Farkı (ΔT) [°C]</label>
            <input type="number" id="hc-cl-dt" value="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-cl-time">Soğuma Süresi [Dakika]</label>
            <input type="number" id="hc-cl-time" value="60">
        </div>
        <button class="hc-btn" onclick="hcCoolingLoadHesapla()">Yükü Hesapla</button>
        <div class="hc-result" id="hc-cooling-load-result">
            <div class="hc-result-item">
                <span>Toplam Isı (Q):</span>
                <span id="hc-res-cl-total">0 kJ</span>
            </div>
            <div class="hc-result-item">
                <span>Soğutma Kapasitesi:</span>
                <span class="hc-result-value" id="hc-res-cl-val">0 kW</span>
            </div>
        </div>
    </div>
    <?php
}
