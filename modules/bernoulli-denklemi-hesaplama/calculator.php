<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bernoulli_denklemi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bernoulli',
        HC_PLUGIN_URL . 'modules/bernoulli-denklemi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-bernoulli">
        <h3>Bernoulli Denklemi Hesaplama</h3>
        <p><small>P<sub>2</sub> = P<sub>1</sub> + ½ρ(v<sub>1</sub>² - v<sub>2</sub>²) + ρg(h<sub>1</sub> - h<sub>2</sub>)</small></p>
        
        <div class="hc-form-group">
            <label>Akışkan Yoğunluğu (ρ, kg/m³)</label>
            <input type="number" id="hc-ber-rho" value="1000" step="0.1">
        </div>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
            <div>
                <h4>Nokta 1</h4>
                <div class="hc-form-group">
                    <label>Basınç (P₁, Pa)</label>
                    <input type="number" id="hc-ber-p1" placeholder="Pa" step="1">
                </div>
                <div class="hc-form-group">
                    <label>Hız (v₁, m/s)</label>
                    <input type="number" id="hc-ber-v1" placeholder="m/s" step="0.1">
                </div>
                <div class="hc-form-group">
                    <label>Yükseklik (h₁, m)</label>
                    <input type="number" id="hc-ber-h1" placeholder="m" step="0.1">
                </div>
            </div>
            <div>
                <h4>Nokta 2</h4>
                <div class="hc-form-group">
                    <label>Basınç (P₂, Pa) - Çıkış</label>
                    <input type="number" id="hc-ber-p2" disabled style="background:#eee;">
                </div>
                <div class="hc-form-group">
                    <label>Hız (v₂, m/s)</label>
                    <input type="number" id="hc-ber-v2" placeholder="m/s" step="0.1">
                </div>
                <div class="hc-form-group">
                    <label>Yükseklik (h₂, m)</label>
                    <input type="number" id="hc-ber-h2" placeholder="m" step="0.1">
                </div>
            </div>
        </div>
        
        <button class="hc-btn" onclick="hcBernoulliHesapla()">Hesapla (P₂'yi Bul)</button>
        
        <div class="hc-result" id="hc-ber-result">
            <span>Hesaplanan Çıkış Basıncı (P₂):</span>
            <div class="hc-result-value" id="hc-ber-res-val">0 Pa</div>
            <div id="hc-ber-res-bar" style="margin-top:5px; font-size:0.9em; opacity:0.8;">0 bar</div>
        </div>
    </div>
    <?php
}
