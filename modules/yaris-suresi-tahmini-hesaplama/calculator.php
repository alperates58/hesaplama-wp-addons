<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yaris_suresi_tahmini_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-race-pred',
        HC_PLUGIN_URL . 'modules/yaris-suresi-tahmini-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-train-pace-css',
        HC_PLUGIN_URL . 'modules/antrenman-temposu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-race-pred">
        <h3>Yarış Süresi Tahmini (Riegel Formülü)</h3>
        <div class="hc-form-group">
            <label for="hc-rp-dist-ref">Referans Mesafe:</label>
            <select id="hc-rp-dist-ref">
                <option value="5">5K</option>
                <option value="10">10K</option>
                <option value="21.097">Yarı Maraton</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>Referans Süreniz (Saat : Dk : Sn):</label>
            <div style="display:flex; gap:5px;">
                <input type="number" id="hc-rp-hr" placeholder="0" style="flex:1;">
                <input type="number" id="hc-rp-min" placeholder="25" style="flex:1;">
                <input type="number" id="hc-rp-sec" placeholder="0" style="flex:1;">
            </div>
        </div>
        <button class="hc-btn" onclick="hcRacePredHesapla()">Tahmin Et</button>
        <div class="hc-result" id="hc-race-pred-result">
            <table class="hc-pace-table">
                <thead>
                    <tr><th>Hedef Mesafe</th><th>Tahmini Süre</th></tr>
                </thead>
                <tbody id="hc-rp-tbody"></tbody>
            </table>
        </div>
    </div>
    <?php
}
