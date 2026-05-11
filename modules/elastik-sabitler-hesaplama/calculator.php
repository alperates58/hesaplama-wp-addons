<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_elastik_sabitler_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-elastic-calc',
        HC_PLUGIN_URL . 'modules/elastik-sabitler-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-elastic-calc">
        <h3>Elastik Sabitler Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Young Modülü (E, GPa)</label>
            <input type="number" id="hc-es-e" placeholder="GPa" step="1" value="210">
            <small>Çelik: 210, Alüminyum: 70</small>
        </div>
        
        <div class="hc-form-group">
            <label>Poisson Oranı (ν)</label>
            <input type="number" id="hc-es-nu" placeholder="ν" step="0.01" value="0.3">
            <small>Çelik: 0.27-0.30</small>
        </div>
        
        <button class="hc-btn" onclick="hcElasticCalcHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-es-result">
            <div style="padding: 5px 0;">
                <span>Kayma Modülü (G):</span>
                <strong id="hc-es-res-g" style="float:right;">0 GPa</strong>
            </div>
            <div style="padding: 5px 0; border-top: 1px solid #eee;">
                <span>Hacim Modülü (K):</span>
                <strong id="hc-es-res-k" style="float:right;">0 GPa</strong>
            </div>
        </div>
    </div>
    <?php
}
