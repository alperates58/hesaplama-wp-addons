<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_guc_kaybi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-power-loss',
        HC_PLUGIN_URL . 'modules/guc-kaybi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-power-loss">
        <h3>Hat Güç Kaybı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Hat Akımı (I, Amper)</label>
            <input type="number" id="hc-gl-i" placeholder="A" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Hat Direnci (R, Ohm)</label>
            <input type="number" id="hc-gl-r" placeholder="Ω" step="0.01">
        </div>
        
        <div class="hc-form-group">
            <label>Sistem Tipi</label>
            <select id="hc-gl-type">
                <option value="1">Tek Faz / DC</option>
                <option value="3">Üç Faz (Dengeli)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcPowerLossHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-gl-result">
            <span>Toplam Güç Kaybı:</span>
            <div class="hc-result-value" id="hc-gl-res-val">0 Watt</div>
            <div id="hc-gl-res-perc" style="margin-top:5px; font-size:0.9em; opacity:0.8;">-</div>
        </div>
    </div>
    <?php
}
