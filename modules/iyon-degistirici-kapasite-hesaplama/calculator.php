<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_iyon_degistirici_kapasite_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ion-cap',
        HC_PLUGIN_URL . 'modules/iyon-degistirici-kapasite-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ion-cap">
        <h3>İyon Değiştirici Kapasite Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>İşlenen Su Miktarı (V_su, m³)</label>
            <input type="number" id="hc-ic-vsu" placeholder="m³" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Giderilen İyon Konsantrasyonu (ΔC, meq/L)</label>
            <input type="number" id="hc-ic-dc" placeholder="meq/L" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Reçine Hacmi (V_reçine, Litre)</label>
            <input type="number" id="hc-ic-vr" placeholder="Litre" step="1">
        </div>
        
        <button class="hc-btn" onclick="hcIonCapHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-ic-result">
            <span>Reçine Kapasitesi:</span>
            <div class="hc-result-value" id="hc-ic-res-val">0 eq/L</div>
        </div>
    </div>
    <?php
}
