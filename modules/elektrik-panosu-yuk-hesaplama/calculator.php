<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_elektrik_panosu_yuk_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-panel-load',
        HC_PLUGIN_URL . 'modules/elektrik-panosu-yuk-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-panel-load">
        <h3>Elektrik Panosu Yük Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Toplam Kurulu Güç (kW)</label>
            <input type="number" id="hc-pl-power" placeholder="kW" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Eşzamanlılık (Talep) Faktörü (0.1 - 1.0)</label>
            <input type="number" id="hc-pl-factor" placeholder="Örn: 0.7" step="0.05" value="0.7">
        </div>
        
        <div class="hc-form-group">
            <label>Sistem Gerilimi</label>
            <select id="hc-pl-volt">
                <option value="220">220V (Monofaze)</option>
                <option value="380" selected>380V (Trifaze)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcPanelLoadHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-pl-result">
            <div style="padding: 5px 0;">
                <span>Talep Gücü:</span>
                <strong id="hc-pl-res-kw" style="float:right;">0 kW</strong>
            </div>
            <div style="padding: 5px 0; border-top: 1px solid #eee;">
                <span>Tahmini Akım (I):</span>
                <strong id="hc-pl-res-i" style="float:right;">0 Amper</strong>
            </div>
        </div>
    </div>
    <?php
}
