<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_throughput_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-throughput-calc',
        HC_PLUGIN_URL . 'modules/throughput-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-throughput-calc-css',
        HC_PLUGIN_URL . 'modules/throughput-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-throughput-calc">
        <h3>Sistem Throughput (Verim)</h3>
        <div class="hc-form-group">
            <label for="hc-th-data">Toplam Başarılı Veri / İş</label>
            <input type="number" id="hc-th-data" value="1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-th-time">Geçen Süre [Saniye]</label>
            <input type="number" id="hc-th-time" value="10" min="0.1">
        </div>
        <button class="hc-btn" onclick="hcThroughputHesapla()">Throughput Hesapla</button>
        <div class="hc-result" id="hc-throughput-calc-result">
            <div class="hc-result-item">
                <span>Throughput:</span>
                <span class="hc-result-value" id="hc-res-th-val">0 Birim/sn</span>
            </div>
        </div>
    </div>
    <?php
}
