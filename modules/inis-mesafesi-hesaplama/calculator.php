<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_inis_mesafesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-landing-dist',
        HC_PLUGIN_URL . 'modules/inis-mesafesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-landing-dist">
        <h3>İniş Mesafesi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>İniş Hızı (V, km/saat)</label>
            <input type="number" id="hc-id-v" placeholder="Örn: 250" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Sürtünme Katsayısı (f)</label>
            <select id="hc-id-f">
                <option value="0.30">Kuru Pist (0.30)</option>
                <option value="0.15" selected>Islak Pist (0.15)</option>
                <option value="0.05">Buzlu Pist (0.05)</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label>Pist Eğimi (Derece)</label>
            <input type="number" id="hc-id-slope" placeholder="Örn: 0" step="0.1" value="0">
        </div>
        
        <button class="hc-btn" onclick="hcLandingDistHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-id-result">
            <span>Tahmini İniş Mesafesi:</span>
            <div class="hc-result-value" id="hc-id-res-val">0 m</div>
            <small>Formül: d = V² / (2g(f + sin θ))</small>
        </div>
    </div>
    <?php
}
