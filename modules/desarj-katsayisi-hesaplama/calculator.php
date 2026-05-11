<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_desarj_katsayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-desarj-katsayisi',
        HC_PLUGIN_URL . 'modules/desarj-katsayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-desarj-katsayisi">
        <h3>Deşarj Katsayısı (C<sub>d</sub>) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Gerçek Debi (Q<sub>gerçek</sub>)</label>
            <input type="number" id="hc-dk-gercek" placeholder="Örn: 0.95" step="0.001">
        </div>
        
        <div class="hc-form-group">
            <label>Teorik Debi (Q<sub>teorik</sub>)</label>
            <input type="number" id="hc-dk-teorik" placeholder="Örn: 1.00" step="0.001">
        </div>
        
        <button class="hc-btn" onclick="hcDesarjKatsayisiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-dk-result">
            <span>Deşarj Katsayısı (C<sub>d</sub>):</span>
            <div class="hc-result-value" id="hc-dk-res-val">0</div>
            <small>Not: Her iki debi de aynı birimde (örn. m³/s veya L/sn) olmalıdır.</small>
        </div>
    </div>
    <?php
}
