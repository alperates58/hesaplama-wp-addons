<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mri_guc_yogunlugu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mri-sar',
        HC_PLUGIN_URL . 'modules/mri-guc-yogunlugu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-mri-sar">
        <h3>MRI Güç Yoğunluğu (SAR) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-mri-power">Emilen Toplam Güç (Watt)</label>
            <input type="number" id="hc-mri-power" placeholder="Watt" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-mri-mass">Doku Kütlesi (kg)</label>
            <input type="number" id="hc-mri-mass" placeholder="kg" step="any">
        </div>

        <button class="hc-btn" onclick="hcMriSarHesapla()">SAR Hesapla</button>

        <div class="hc-result" id="hc-mri-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Özgül Soğurma Oranı (SAR):</span>
                <span class="hc-result-value" id="hc-mri-res-total">--</span>
                <span class="hc-result-unit">W/kg</span>
            </div>
            <p id="hc-mri-limit" style="text-align:center; font-size:0.9rem; margin-top:10px;"></p>
        </div>
    </div>
    <?php
}
