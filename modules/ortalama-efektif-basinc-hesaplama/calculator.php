<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ortalama_efektif_basinc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mep',
        HC_PLUGIN_URL . 'modules/ortalama-efektif-basinc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-mep">
        <h3>Ortalama Efektif Basınç (MEP) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-mep-torque">Tork (Nm)</label>
            <input type="number" id="hc-mep-torque" placeholder="Nm" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-mep-disp">Motor Hacmi (cm³ - cc)</label>
            <input type="number" id="hc-mep-disp" placeholder="Örn: 1600" step="any">
        </div>

        <div class="hc-form-group">
            <label>Motor Tipi</label>
            <select id="hc-mep-stroke">
                <option value="2">4 Zamanlı (4-Stroke)</option>
                <option value="1">2 Zamanlı (2-Stroke)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcMepHesapla()">MEP Hesapla</button>

        <div class="hc-result" id="hc-mep-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Ortalama Efektif Basınç:</span>
                <span class="hc-result-value" id="hc-mep-res-total">--</span>
                <span class="hc-result-unit">Bar</span>
            </div>
        </div>
    </div>
    <?php
}
