<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_antrenman_temposu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-train-pace',
        HC_PLUGIN_URL . 'modules/antrenman-temposu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-train-pace-css',
        HC_PLUGIN_URL . 'modules/antrenman-temposu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-train-pace">
        <h3>İdeal Antrenman Tempoları</h3>
        <div class="hc-form-group">
            <label>Güncel 5K Süreniz (dk:sn):</label>
            <div style="display:flex; gap:10px;">
                <input type="number" id="hc-tp-min" placeholder="25" style="flex:1;">
                <input type="number" id="hc-tp-sec" placeholder="00" style="flex:1;">
            </div>
        </div>
        <button class="hc-btn" onclick="hcTrainPaceHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-train-pace-result">
            <table class="hc-pace-table">
                <thead>
                    <tr><th>Antrenman Tipi</th><th>Tempo (dk/km)</th></tr>
                </thead>
                <tbody id="hc-tp-tbody"></tbody>
            </table>
        </div>
    </div>
    <?php
}
