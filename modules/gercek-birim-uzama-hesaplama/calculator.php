<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gercek_birim_uzama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-true-strain',
        HC_PLUGIN_URL . 'modules/gercek-birim-uzama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-true-strain">
        <h3>Gerçek Birim Uzama (True Strain) Hesaplama</h3>
        <p><small>ε_true = ln(L / L₀)</small></p>
        
        <div class="hc-form-group">
            <label>İlk Boy (L₀, mm)</label>
            <input type="number" id="hc-ts-l0" placeholder="mm" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Son Boy (L, mm)</label>
            <input type="number" id="hc-ts-l" placeholder="mm" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcTrueStrainHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-ts-result">
            <span>Gerçek Birim Uzama (ε):</span>
            <div class="hc-result-value" id="hc-ts-res-val">0</div>
            <div id="hc-ts-res-eng" style="margin-top:5px; font-size:0.9em; opacity:0.8;">Mühendislik Uzaması: 0</div>
        </div>
    </div>
    <?php
}
