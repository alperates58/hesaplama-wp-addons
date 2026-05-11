<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ilac_dozu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-drug-dose',
        HC_PLUGIN_URL . 'modules/ilac-dozu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-drug-dose">
        <h3>İlaç Dozu Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Hasta Kilosu (kg)</label>
            <input type="number" id="hc-dd-weight" placeholder="kg" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Birim Doz (mg/kg)</label>
            <input type="number" id="hc-dd-unit" placeholder="mg/kg" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>İlaç Konsantrasyonu (Opsiyonel, mg/ml)</label>
            <input type="number" id="hc-dd-conc" placeholder="mg/ml" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcDrugDoseHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-dd-result">
            <span>Hesaplanan Toplam Doz:</span>
            <div class="hc-result-value" id="hc-dd-res-val">0 mg</div>
            <div id="hc-dd-res-vol" style="margin-top:5px; font-size:0.9em; opacity:0.8;">-</div>
            <small style="color:#e67e22;">Uyarı: Tıbbi kararlar için doktorunuza danışın.</small>
        </div>
    </div>
    <?php
}
