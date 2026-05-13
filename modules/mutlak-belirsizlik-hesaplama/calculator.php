<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mutlak_belirsizlik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mutlak-belirsizlik-hesaplama',
        HC_PLUGIN_URL . 'modules/mutlak-belirsizlik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mutlak-belirsizlik-hesaplama-css',
        HC_PLUGIN_URL . 'modules/mutlak-belirsizlik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mutlak-belirsizlik-hesaplama">
        <h3>Mutlak Belirsizlik Hesaplama</h3>
        <p>Ölçüm değerlerini virgül ile ayırarak giriniz.</p>
        <div class="hc-form-group">
            <label for="hc-au-data">Ölçümler</label>
            <textarea id="hc-au-data" rows="4" placeholder="10.2, 10.5, 10.3, 10.1"></textarea>
        </div>
        <button class="hc-btn" onclick="hcBelirsizlikHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mutlak-belirsizlik-hesaplama-result">
            <span class="hc-label">Mutlak Belirsizlik (Δx):</span>
            <div class="hc-result-value" id="hc-au-res-val">0</div>
            <div id="hc-au-res-range" style="margin-top:10px;"></div>
            <div id="hc-au-res-relative" style="margin-top:5px; font-style:italic; color:#666;"></div>
        </div>
    </div>
    <?php
}
