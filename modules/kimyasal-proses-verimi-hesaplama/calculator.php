<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kimyasal_proses_verimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-chem-yield',
        HC_PLUGIN_URL . 'modules/kimyasal-proses-verimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-chem-yield">
        <h3>Kimyasal Reaksiyon Verimi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Teorik Verim (Maksimum Olabilir Miktar, g)</label>
            <input type="number" id="hc-cy-theory" placeholder="gram" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Gerçek Verim (Elde Edilen Miktar, g)</label>
            <input type="number" id="hc-cy-actual" placeholder="gram" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcChemYieldHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-cy-result">
            <span>Yüzde Verim:</span>
            <div class="hc-result-value" id="hc-cy-res-val">%0</div>
        </div>
    </div>
    <?php
}
