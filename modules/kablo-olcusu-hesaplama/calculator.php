<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kablo_olcusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-awg-calc',
        HC_PLUGIN_URL . 'modules/kablo-olcusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-awg-calc">
        <h3>AWG - mm² Dönüşüm Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>AWG Değeri</label>
            <input type="number" id="hc-awg-val" placeholder="Örn: 12" step="1" value="12">
        </div>
        
        <button class="hc-btn" onclick="hcAwgHesapla()">Dönüştür</button>
        
        <div class="hc-result" id="hc-awg-result">
            <div style="padding: 5px 0;">
                <span>Kablo Çapı:</span>
                <strong id="hc-awg-res-dia" style="float:right;">0 mm</strong>
            </div>
            <div style="padding: 5px 0; border-top: 1px solid #eee;">
                <span>Kablo Kesiti:</span>
                <strong id="hc-awg-res-area" style="float:right;">0 mm²</strong>
            </div>
        </div>
    </div>
    <?php
}
