<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cop_performans_katsayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cop-calc',
        HC_PLUGIN_URL . 'modules/cop-performans-katsayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cop-calc">
        <h3>COP Performans Katsayısı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Aktarılan Isı Enerjisi (Q, kW)</label>
            <input type="number" id="hc-cop-q" placeholder="Örn: 12" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Harcanan Elektrik Gücü (W, kW)</label>
            <input type="number" id="hc-cop-w" placeholder="Örn: 3" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcCopHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-cop-result">
            <span>Performans Katsayısı (COP):</span>
            <div class="hc-result-value" id="hc-cop-res-val">0</div>
            <div id="hc-cop-res-eer" style="margin-top:5px; font-size:0.9em; opacity:0.8;">EER: 0 BTU/Wh</div>
            <small>Not: COP > 1 olması sistemin tükettiğinden fazla ısı taşıdığını gösterir.</small>
        </div>
    </div>
    <?php
}
