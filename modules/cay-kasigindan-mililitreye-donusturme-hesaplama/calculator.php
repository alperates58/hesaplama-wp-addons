<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cay_kasigindan_mililitreye_donusturme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tsp-ml-conv',
        HC_PLUGIN_URL . 'modules/cay-kasigindan-mililitreye-donusturme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-tspml-box">
        <h3>Çay Kaşığından Mililitreye Dönüştürme Hesaplama</h3>
        <div class="hc-form-group">
            <label>Ölçü Birimi</label>
            <select id="hc-tspml-type" onchange="hcTspToMl()">
                <option value="5">Metrik Çay Kaşığı (5 ml)</option>
                <option value="4.92892">ABD Çay Kaşığı (4.93 ml)</option>
                <option value="2.5">Küçük Çay Kaşığı (2.5 ml)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>Kaşık Sayısı</label>
            <input type="number" id="hc-tspml-tsp" value="1" oninput="hcTspToMl()">
        </div>
        <div class="hc-form-group">
            <label>Mililitre (mL)</label>
            <input type="number" id="hc-tspml-ml" value="5" oninput="hcMlToTsp()">
        </div>
    </div>
    <?php
}
