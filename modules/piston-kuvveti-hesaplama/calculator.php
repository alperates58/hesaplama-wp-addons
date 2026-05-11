<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_piston_kuvveti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-piston-kuvvet',
        HC_PLUGIN_URL . 'modules/piston-kuvveti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-piston-kuvvet">
        <h3>Piston Kuvveti Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-pk-pressure">Çalışma Basıncı (Bar)</label>
            <input type="number" id="hc-pk-pressure" placeholder="Bar" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-pk-diam">Piston Çapı (mm)</label>
            <input type="number" id="hc-pk-diam" placeholder="mm" step="any">
        </div>

        <button class="hc-btn" onclick="hcPistonKuvvetHesapla()">Kuvveti Hesapla</button>

        <div class="hc-result" id="hc-pk-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Teorik İtme Kuvveti (F):</span>
                <span class="hc-result-value" id="hc-pk-res-total">--</span>
                <span class="hc-result-unit">Newton (N)</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Kilogram Cinsinden:</span>
                <span id="hc-pk-res-kg">--</span>
                <span class="hc-result-unit">kgf</span>
            </div>
        </div>
    </div>
    <?php
}
