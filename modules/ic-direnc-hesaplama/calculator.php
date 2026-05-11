<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ic_direnc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-int-res',
        HC_PLUGIN_URL . 'modules/ic-direnc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-int-res">
        <h3>İç Direnç Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Açık Devre Gerilimi (V-boş, Volt)</label>
            <input type="number" id="hc-ir-voc" placeholder="V" step="0.01">
        </div>
        
        <div class="hc-form-group">
            <label>Yük Altındaki Gerilim (V-yük, Volt)</label>
            <input type="number" id="hc-ir-vload" placeholder="V" step="0.01">
        </div>
        
        <div class="hc-form-group">
            <label>Yük Akımı (I, Amper)</label>
            <input type="number" id="hc-ir-i" placeholder="A" step="0.01">
        </div>
        
        <button class="hc-btn" onclick="hcIntResHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-ir-result">
            <span>Hesaplanan İç Direnç (r):</span>
            <div class="hc-result-value" id="hc-ir-res-val">0 Ω</div>
            <small>Formül: r = (Vboş - Vyük) / I</small>
        </div>
    </div>
    <?php
}
