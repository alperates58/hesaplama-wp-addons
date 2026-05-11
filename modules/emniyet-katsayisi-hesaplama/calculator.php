<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_emniyet_katsayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fos-calc',
        HC_PLUGIN_URL . 'modules/emniyet-katsayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-fos-calc">
        <h3>Emniyet Katsayısı (Safety Factor) Hesaplama</h3>
        <p><small>FOS = Mukavemet / Çalışma Gerilmesi</small></p>
        
        <div class="hc-form-group">
            <label>Malzeme Akma Mukavemeti (σ-akma, MPa)</label>
            <input type="number" id="hc-fs-sigma-y" placeholder="MPa" step="1" value="235">
            <small>S235 Çelik: 235, S355: 355</small>
        </div>
        
        <div class="hc-form-group">
            <label>Hesaplanan Çalışma Gerilmesi (σ-çalışma, MPa)</label>
            <input type="number" id="hc-fs-sigma-w" placeholder="MPa" step="1">
        </div>
        
        <button class="hc-btn" onclick="hcFosCalcHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-fs-result">
            <span>Emniyet Katsayısı (FOS):</span>
            <div class="hc-result-value" id="hc-fs-res-val">0</div>
            <div id="hc-fs-res-desc" style="margin-top:10px; text-align:center; font-size:0.9em; opacity:0.8;">-</div>
        </div>
    </div>
    <?php
}
