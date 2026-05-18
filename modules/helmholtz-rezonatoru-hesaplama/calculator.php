<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_helmholtz_rezonatoru_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-helmholtz-rezonatoru-hesaplama',
        HC_PLUGIN_URL . 'modules/helmholtz-rezonatoru-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-helmholtz-rezonatoru-hesaplama-css',
        HC_PLUGIN_URL . 'modules/helmholtz-rezonatoru-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-helmholtz-rezonatoru-hesaplama">
        <h3>Helmholtz Rezonatörü Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-hr-hiz">Ses Hızı (v - m/s)</label>
            <input type="number" step="any" id="hc-hr-hiz" value="343" placeholder="Hava (20°C): 343" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-hr-hacim">Boşluk Hacmi (V - Litre)</label>
            <input type="number" step="any" id="hc-hr-hacim" value="1.0" placeholder="Örn: 1.0 (Litre)" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-hr-boyun-boy">Boyun Uzunluğu (L - cm)</label>
            <input type="number" step="any" id="hc-hr-boyun-boy" value="5.0" placeholder="Örn: 5.0 (cm)" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-hr-boyun-cap">Boyun İç Çapı (d - cm)</label>
            <input type="number" step="any" id="hc-hr-boyun-cap" value="3.0" placeholder="Örn: 3.0 (cm)" required>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-hr-duzeltme">Uç Düzeltme Tipi (End Correction)</label>
            <select id="hc-hr-duzeltme">
                <option value="iki-flans">Her İki Ucu Flanşlı (L_eq = L + 0.85 * r)</option>
                <option value="tek-flans" selected>Tek Ucu Flanşlı (L_eq = L + 0.613 * r)</option>
                <option value="flanssiz">Flanşsız (L_eq = L + 0.6 * r)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcHelmholtzRezonatoruHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-helmholtz-rezonatoru-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <?php
}
