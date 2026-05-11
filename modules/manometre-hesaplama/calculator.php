<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_manometre_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-manometer',
        HC_PLUGIN_URL . 'modules/manometre-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-manometer">
        <h3>Manometre Basınç Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-mn-height">Yükseklik Farkı (h - mm)</label>
            <input type="number" id="hc-mn-height" placeholder="mm" step="any">
        </div>

        <div class="hc-form-group">
            <label>Manometre Sıvısı</label>
            <select id="hc-mn-fluid" onchange="hcManometreSiviGuncelle()">
                <option value="13600">Civa (13.600 kg/m³)</option>
                <option value="1000">Su (1.000 kg/m³)</option>
                <option value="800">Yağ (800 kg/m³)</option>
                <option value="custom">Özel Yoğunluk...</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-mn-custom-rho-group" style="display:none;">
            <label for="hc-mn-rho">Sıvı Yoğunluğu (ρ - kg/m³)</label>
            <input type="number" id="hc-mn-rho" placeholder="kg/m³" step="any">
        </div>

        <button class="hc-btn" onclick="hcManometreHesapla()">Basıncı Hesapla</button>

        <div class="hc-result" id="hc-mn-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Basınç Farkı (ΔP):</span>
                <span class="hc-result-value" id="hc-mn-res-pa">--</span>
                <span class="hc-result-unit">Pascal (Pa)</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Bar Cinsinden:</span>
                <span id="hc-mn-res-bar">--</span>
                <span class="hc-result-unit">Bar</span>
            </div>
        </div>
    </div>
    <?php
}
