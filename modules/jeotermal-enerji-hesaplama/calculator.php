<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_jeotermal_enerji_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-geo-energy',
        HC_PLUGIN_URL . 'modules/jeotermal-enerji-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-geo-energy-css',
        HC_PLUGIN_URL . 'modules/jeotermal-enerji-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-geo-energy">
        <h3>Jeotermal Enerji Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ge-flow">Debi (Litre/Saniye)</label>
            <input type="number" id="hc-ge-flow" placeholder="Örn: 10" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-ge-tin">Giriş Sıcaklığı (°C)</label>
            <input type="number" id="hc-ge-tin" placeholder="Örn: 80" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-ge-tout">Çıkış Sıcaklığı (°C)</label>
            <input type="number" id="hc-ge-tout" placeholder="Örn: 40" step="0.1">
        </div>

        <button class="hc-btn" onclick="hcJeoEnerjiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-ge-result">
            <div class="hc-result-item">
                <span>Elde Edilen Isıl Güç:</span>
                <span class="hc-result-value highlight" id="hc-res-ge-kw">-</span>
            </div>
            <div class="hc-result-item">
                <span>Kcal/Saat Cinsinden:</span>
                <span class="hc-result-value" id="hc-res-ge-kcal">-</span>
            </div>
            <div class="hc-result-note">
                * Q = m * Cp * ΔT formülü ile hesaplanmıştır. (Cp: 4.187 kJ/kg°C)
            </div>
        </div>
    </div>
    <?php
}
