<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hiz_gostergesi_disli_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-speedo-gear',
        HC_PLUGIN_URL . 'modules/hiz-gostergesi-disli-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-sg-box">
        <h3>Hız Göstergesi Dişli Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label>Tahrik Dişlisi Sayısı (Drive Gear)</label>
            <input type="number" id="hc-sg-drive" value="7">
        </div>
        <div class="hc-form-group">
            <label>Diferansiyel Oranı (Axle Ratio)</label>
            <input type="number" step="0.01" id="hc-sg-axle" value="3.55">
        </div>
        <div class="hc-form-group">
            <label>Lastik Devri (Revs per km)</label>
            <input type="number" id="hc-sg-revs" value="500">
        </div>
        <button class="hc-btn" onclick="hcSgHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-sg-result">
            <div class="hc-result-title">Gereken Gösterge Dişlisi:</div>
            <div class="hc-result-value" id="hc-sg-val">-</div>
        </div>
    </div>
    <?php
}
