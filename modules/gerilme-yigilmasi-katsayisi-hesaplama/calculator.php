<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gerilme_yigilmasi_katsayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-stress-conc',
        HC_PLUGIN_URL . 'modules/gerilme-yigilmasi-katsayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-stress-conc">
        <h3>Gerilme Yığılması Katsayısı (Kt)</h3>
        <p><small>Kt = σ-max / σ-nominal</small></p>
        
        <div class="hc-form-group">
            <label>Maksimum Gerilme (σ-max, MPa)</label>
            <input type="number" id="hc-sc-max" placeholder="MPa" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Nominal Gerilme (σ-nom, MPa)</label>
            <input type="number" id="hc-sc-nom" placeholder="MPa" step="1">
        </div>
        
        <button class="hc-btn" onclick="hcStressConcHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-sc-result">
            <span>Yığılma Katsayısı (Kt):</span>
            <div class="hc-result-value" id="hc-sc-res-val">0</div>
        </div>
    </div>
    <?php
}
