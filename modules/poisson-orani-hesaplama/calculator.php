<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_poisson_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-poisson',
        HC_PLUGIN_URL . 'modules/poisson-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-poisson">
        <h3>Poisson Oranı (ν) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-po-trans">Enine Şekil Değiştirme (ε<sub>trans</sub>)</label>
            <input type="number" id="hc-po-trans" placeholder="Δd / d0" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-po-axial">Boyuna Şekil Değiştirme (ε<sub>axial</sub>)</label>
            <input type="number" id="hc-po-axial" placeholder="ΔL / L0" step="any">
        </div>

        <button class="hc-btn" onclick="hcPoissonHesapla()">Poisson Oranını Hesapla</button>

        <div class="hc-result" id="hc-po-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Poisson Oranı (ν):</span>
                <span class="hc-result-value" id="hc-po-res-total">--</span>
            </div>
            <p id="hc-po-material" style="text-align:center; font-size:0.9rem; margin-top:10px; color:#666;"></p>
        </div>
    </div>
    <?php
}
