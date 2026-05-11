<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_filtrasyon_hizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-filter-rate',
        HC_PLUGIN_URL . 'modules/filtrasyon-hizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-filter-rate">
        <h3>Filtrasyon Hızı Hesaplama</h3>
        <p><small>v = Q / A</small></p>
        
        <div class="hc-form-group">
            <label>Akış Debisi (Q, m³/h)</label>
            <input type="number" id="hc-fr-q" placeholder="m³/h" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Filtre Yüzey Alanı (A, m²)</label>
            <input type="number" id="hc-fr-a" placeholder="m²" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcFilterRateHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-fr-result">
            <span>Filtrasyon Hızı (v):</span>
            <div class="hc-result-value" id="hc-fr-res-val">0 m/h</div>
        </div>
    </div>
    <?php
}
