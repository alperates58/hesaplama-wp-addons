<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_reynolds_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-reynolds',
        HC_PLUGIN_URL . 'modules/reynolds-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-reynolds">
        <h3>Reynolds Sayısı (Re) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-re-density">Akışkan Yoğunluğu (ρ - kg/m³)</label>
            <input type="number" id="hc-re-density" placeholder="kg/m³" step="any" value="1.225">
        </div>

        <div class="hc-form-group">
            <label for="hc-re-velocity">Akış Hızı (v - m/s)</label>
            <input type="number" id="hc-re-velocity" placeholder="m/s" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-re-length">Karakteristik Uzunluk (L - m)</label>
            <input type="number" id="hc-re-length" placeholder="m" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-re-viscosity">Dinamik Viskozite (μ - Pa·s)</label>
            <input type="number" id="hc-re-viscosity" placeholder="Pa·s (veya kg/m·s)" step="any">
        </div>

        <button class="hc-btn" onclick="hcReynoldsHesapla()">Re Hesapla</button>

        <div class="hc-result" id="hc-re-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Reynolds Sayısı (Re):</span>
                <span class="hc-result-value" id="hc-re-res-total">--</span>
            </div>
            <p id="hc-re-flow-type" style="text-align:center; margin-top:10px; font-weight:600;"></p>
        </div>
    </div>
    <?php
}
