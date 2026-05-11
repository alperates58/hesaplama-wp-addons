<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_guc_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cons-calc',
        HC_PLUGIN_URL . 'modules/guc-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cons-calc">
        <h3>Güç Tüketimi ve Maliyet Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Cihaz Gücü (Watt)</label>
            <input type="number" id="hc-cc-power" placeholder="W" step="1">
        </div>
        
        <div class="hc-form-group">
            <label>Günlük Kullanım (Saat)</label>
            <input type="number" id="hc-cc-hours" placeholder="Saat" step="0.5" value="1">
        </div>
        
        <div class="hc-form-group">
            <label>Elektrik Birim Fiyatı (TL/kWh)</label>
            <input type="number" id="hc-cc-price" placeholder="TL" step="0.1" value="2.5">
        </div>
        
        <button class="hc-btn" onclick="hcConsCalcHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-cc-result">
            <div style="padding: 5px 0;">
                <span>Günlük Tüketim:</span>
                <strong id="hc-cc-res-daily" style="float:right;">0 kWh</strong>
            </div>
            <div style="padding: 5px 0; border-top: 1px solid #eee;">
                <span>Aylık Tüketim (30 Gün):</span>
                <strong id="hc-cc-res-monthly" style="float:right;">0 kWh</strong>
            </div>
            <div style="padding: 10px 0; border-top: 2px solid #eee; margin-top:5px;">
                <span>Tahmini Aylık Maliyet:</span>
                <div class="hc-result-value" id="hc-cc-res-cost" style="color:#27ae60;">0 TL</div>
            </div>
        </div>
    </div>
    <?php
}
