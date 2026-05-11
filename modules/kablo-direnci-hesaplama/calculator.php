<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kablo_direnci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cable-res',
        HC_PLUGIN_URL . 'modules/kablo-direnci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cable-res">
        <h3>Kablo Direnci Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Kablo Uzunluğu (L, metre)</label>
            <input type="number" id="hc-cr-len" placeholder="m" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Kablo Kesiti (A, mm²)</label>
            <input type="number" id="hc-cr-area" placeholder="mm²" step="0.1" value="2.5">
        </div>
        
        <div class="hc-form-group">
            <label>İletken Malzemesi</label>
            <select id="hc-cr-rho">
                <option value="0.0172" selected>Bakır (Cu)</option>
                <option value="0.0282">Alüminyum (Al)</option>
                <option value="0.01">Gümüş (Ag)</option>
                <option value="0.0244">Altın (Au)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcCableResHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-cr-result">
            <span>Toplam Kablo Direnci (R):</span>
            <div class="hc-result-value" id="hc-cr-res-val">0 Ω</div>
            <small>Formül: R = ρ × (L / A)</small>
        </div>
    </div>
    <?php
}
