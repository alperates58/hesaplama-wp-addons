<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yaris_suresi_gelisim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-race-imp',
        HC_PLUGIN_URL . 'modules/yaris-suresi-gelisim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-race-imp-css',
        HC_PLUGIN_URL . 'modules/yaris-suresi-gelisim-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-race-imp">
        <h3>Yarış Süresi Gelişim Analizi</h3>
        <div class="hc-form-group">
            <label>Eski Süre (dk:sn):</label>
            <div style="display:flex; gap:10px;">
                <input type="number" id="hc-ri-old-min" placeholder="30" style="flex:1;">
                <input type="number" id="hc-ri-old-sec" placeholder="00" style="flex:1;">
            </div>
        </div>
        <div class="hc-form-group">
            <label>Yeni Süre (dk:sn):</label>
            <div style="display:flex; gap:10px;">
                <input type="number" id="hc-ri-new-min" placeholder="28" style="flex:1;">
                <input type="number" id="hc-ri-new-sec" placeholder="30" style="flex:1;">
            </div>
        </div>
        <button class="hc-btn" onclick="hcRaceImpHesapla()">Analiz Et</button>
        <div class="hc-result" id="hc-race-imp-result">
            <strong>Gelişim Oranı:</strong>
            <div id="hc-ri-res-val" class="hc-result-value">-</div>
            <span>%</span>
            <p id="hc-ri-res-diff" style="margin-top:10px; font-weight:bold;"></p>
        </div>
    </div>
    <?php
}
