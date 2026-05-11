<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kondansator_enerjisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cap-energy',
        HC_PLUGIN_URL . 'modules/kondansator-enerjisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cap-energy">
        <h3>Kondansatör Enerjisi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Kapasite (C)</label>
            <div style="display: flex; gap: 5px;">
                <input type="number" id="hc-ce-c" placeholder="Değer" step="0.001" style="flex:1;">
                <select id="hc-ce-unit" style="width: 80px;">
                    <option value="1">F</option>
                    <option value="0.001">mF</option>
                    <option value="0.000001" selected>μF</option>
                    <option value="0.000000001">nF</option>
                </select>
            </div>
        </div>
        
        <div class="hc-form-group">
            <label>Gerilim (V, Volt)</label>
            <input type="number" id="hc-ce-v" placeholder="V" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcCapEnergyHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-ce-result">
            <span>Depolanan Enerji (E):</span>
            <div class="hc-result-value" id="hc-ce-res-val">0 Joule</div>
            <small>Formül: E = ½ × C × V²</small>
        </div>
    </div>
    <?php
}
