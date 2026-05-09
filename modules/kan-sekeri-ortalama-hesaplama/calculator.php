<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kan_sekeri_ortalama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mean-glucose',
        HC_PLUGIN_URL . 'modules/kan-sekeri-ortalama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-mean-gl">
        <h3>Kan Şekeri Ortalama Hesaplama</h3>
        
        <div id="hc-gl-inputs">
            <div class="hc-form-group">
                <label>Ölçüm 1 (mg/dL)</label>
                <input type="number" class="hc-gl-val" placeholder="Değer">
            </div>
            <div class="hc-form-group">
                <label>Ölçüm 2 (mg/dL)</label>
                <input type="number" class="hc-gl-val" placeholder="Değer">
            </div>
        </div>

        <button class="hc-btn" style="background:#666; margin-bottom:10px;" onclick="hcAddGlucoseInput()">+ Ölçüm Ekle</button>
        <button class="hc-btn" onclick="hcOrtalamaSekerHesapla()">Ortalamayı Hesapla</button>

        <div class="hc-result" id="hc-mean-gl-result">
            <div class="hc-result-item">
                <span>Genel Ortalama:</span>
                <div class="hc-result-value" id="hc-mean-gl-value">-</div>
            </div>
            <div class="hc-result-item">
                <span>Tahmini HbA1c Karşılığı:</span>
                <strong id="hc-mean-hba1c">-</strong>
            </div>
        </div>
    </div>
    <?php
}
