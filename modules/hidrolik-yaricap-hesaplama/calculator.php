<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hidrolik_yaricap_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hyd-rad',
        HC_PLUGIN_URL . 'modules/hidrolik-yaricap-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-hyd-rad">
        <h3>Hidrolik Yarıçap (Rh) Hesaplama</h3>
        <p><small>Rh = Islak Alan (A) / Islak Çevre (P)</small></p>
        
        <div class="hc-form-group">
            <label>Akış Kesit Alanı (A, m²)</label>
            <input type="number" id="hc-hr-a" placeholder="m²" step="0.01">
        </div>
        
        <div class="hc-form-group">
            <label>Islak Çevre (P, metre)</label>
            <input type="number" id="hc-hr-p" placeholder="m" step="0.01">
        </div>
        
        <button class="hc-btn" onclick="hcHydRadHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-hr-result">
            <span>Hidrolik Yarıçap (Rh):</span>
            <div class="hc-result-value" id="hc-hr-res-val">0 m</div>
        </div>
    </div>
    <?php
}
