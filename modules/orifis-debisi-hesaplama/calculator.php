<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_orifis_debisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-orifis',
        HC_PLUGIN_URL . 'modules/orifis-debisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-orifis">
        <h3>Orifis Debisi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-od-cd">Boşaltma Katsayısı (Cd - Genellikle 0.6-0.65)</label>
            <input type="number" id="hc-od-cd" placeholder="Cd" step="0.01" value="0.62">
        </div>

        <div class="hc-form-group">
            <label for="hc-od-diam">Orifis Çapı (d - mm)</label>
            <input type="number" id="hc-od-diam" placeholder="mm" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-od-dp">Basınç Farkı (ΔP - Pa veya N/m²)</label>
            <input type="number" id="hc-od-dp" placeholder="Pa" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-od-rho">Akışkan Yoğunluğu (ρ - kg/m³)</label>
            <input type="number" id="hc-od-rho" placeholder="kg/m³" step="any" value="1000">
        </div>

        <button class="hc-btn" onclick="hcOrifisHesapla()">Debi (Q) Hesapla</button>

        <div class="hc-result" id="hc-od-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Hacimsel Debi (Q):</span>
                <span class="hc-result-value" id="hc-od-res-total">--</span>
                <span class="hc-result-unit">m³/s</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Litre/Saniye:</span>
                <span id="hc-od-res-lps">--</span>
                <span class="hc-result-unit">L/s</span>
            </div>
        </div>
    </div>
    <?php
}
