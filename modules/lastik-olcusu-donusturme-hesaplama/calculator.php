<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lastik_olcusu_donusturme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tire-conv',
        HC_PLUGIN_URL . 'modules/lastik-olcusu-donusturme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-tc-box">
        <h3>Lastik Ölçüsü Dönüştürme Hesaplama</h3>
        <div class="hc-form-group">
            <label>Taban Genişliği (mm)</label>
            <input type="number" id="hc-tc-width" value="225">
        </div>
        <div class="hc-form-group">
            <label>Yanak Oranı (%)</label>
            <input type="number" id="hc-tc-ratio" value="45">
        </div>
        <div class="hc-form-group">
            <label>Jant Çapı (İnç)</label>
            <input type="number" id="hc-tc-rim" value="17">
        </div>
        <button class="hc-btn" onclick="hcTcHesapla()">Dönüştür</button>
        <div class="hc-result" id="hc-tc-result">
            <div class="hc-result-title">İnç Bazlı Karşılığı:</div>
            <div class="hc-result-value" id="hc-tc-val">-</div>
        </div>
    </div>
    <?php
}
