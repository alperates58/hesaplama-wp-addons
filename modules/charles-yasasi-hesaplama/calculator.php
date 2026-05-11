<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_charles_yasasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-charles-law',
        HC_PLUGIN_URL . 'modules/charles-yasasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-charles-law">
        <h3>Charles Yasası Hesaplama (V₁/T₁ = V₂/T₂)</h3>
        <p><small>Hesaplamak istediğiniz alanı boş bırakın. Sıcaklıkları °C cinsinden girin.</small></p>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
            <div>
                <h4>Durum 1</h4>
                <div class="hc-form-group">
                    <label>Hacim (V₁, Litre)</label>
                    <input type="number" id="hc-cy-v1" step="0.1">
                </div>
                <div class="hc-form-group">
                    <label>Sıcaklık (T₁, °C)</label>
                    <input type="number" id="hc-cy-t1" step="0.1">
                </div>
            </div>
            <div>
                <h4>Durum 2</h4>
                <div class="hc-form-group">
                    <label>Hacim (V₂, Litre)</label>
                    <input type="number" id="hc-cy-v2" step="0.1">
                </div>
                <div class="hc-form-group">
                    <label>Sıcaklık (T₂, °C)</label>
                    <input type="number" id="hc-cy-t2" step="0.1">
                </div>
            </div>
        </div>
        
        <button class="hc-btn" onclick="hcCharlesHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-cy-result">
            <span>Hesaplanan Sonuç:</span>
            <div class="hc-result-value" id="hc-cy-res-val">-</div>
        </div>
    </div>
    <?php
}
