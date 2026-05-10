<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yuzde_kac_artti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-how-inc',
        HC_PLUGIN_URL . 'modules/yuzde-kac-artti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-hi">
        <h3>Yüzde Kaç Arttı?</h3>
        <div class="hc-form-group">
            <input type="number" id="hc-hi-v1" placeholder="80" style="width:80px">
            <span> değerinden, </span>
            <input type="number" id="hc-hi-v2" placeholder="100" style="width:80px">
            <span> değerine artış yüzde kaçtır?</span>
        </div>
        <button class="hc-btn" onclick="hcHowIncHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-yuzde-how-inc-result">
            <strong>Artış Oranı:</strong>
            <div id="hc-hi-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
