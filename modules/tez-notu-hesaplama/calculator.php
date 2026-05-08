<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tez_notu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tez-notu',
        HC_PLUGIN_URL . 'modules/tez-notu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-tez-calc">
        <h3>Tez Notu Hesaplama</h3>
        <div class="hc-form-group">
            <label>Danışman Puanı</label>
            <input type="number" id="hc-tn-supervisor" placeholder="0-100">
        </div>
        <div class="hc-form-group">
            <label>Savunma / Jüri Puanı</label>
            <input type="number" id="hc-tn-jury" placeholder="0-100">
        </div>
        <button class="hc-btn" onclick="hcTezNotuHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-tn-result">
            <div class="hc-result-title">Tez Başarı Notu:</div>
            <div class="hc-result-value" id="hc-tn-val">-</div>
        </div>
    </div>
    <?php
}
