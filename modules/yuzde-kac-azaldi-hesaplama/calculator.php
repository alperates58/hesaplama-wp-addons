<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yuzde_kac_azaldi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-how-dec',
        HC_PLUGIN_URL . 'modules/yuzde-kac-azaldi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-hd">
        <h3>Yüzde Kaç Azaldı?</h3>
        <div class="hc-form-group">
            <input type="number" id="hc-hd-v1" placeholder="100" style="width:80px">
            <span> değerinden, </span>
            <input type="number" id="hc-hd-v2" placeholder="80" style="width:80px">
            <span> değerine azalış yüzde kaçtır?</span>
        </div>
        <button class="hc-btn" onclick="hcHowDecHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-yuzde-how-dec-result">
            <strong>Azalış Oranı:</strong>
            <div id="hc-hd-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
