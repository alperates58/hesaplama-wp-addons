<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tansiyon_ve_nabiz_takibi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tansiyon-ve-nabiz-takibi-hesaplama',
        HC_PLUGIN_URL . 'modules/tansiyon-ve-nabiz-takibi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tansiyon-ve-nabiz-takibi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/tansiyon-ve-nabiz-takibi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bp-tracker">
        <h3>Tansiyon ve Nabız Takibi</h3>
        <div class="hc-form-group" style="display:flex; gap:10px;">
            <input type="number" id="hc-bt-sys" placeholder="Sistolik" style="flex:1">
            <input type="number" id="hc-bt-dia" placeholder="Diyastolik" style="flex:1">
            <input type="number" id="hc-bt-pulse" placeholder="Nabız" style="flex:1">
        </div>
        <button class="hc-btn" onclick="hcBTKaydet()">Ölçümü Ekle</button>
        
        <div id="hc-bt-log" style="margin-top:20px; max-height:200px; overflow-y:auto; border:1px solid #eee; padding:10px; display:none;">
            <table style="width:100%; font-size:0.9em; text-align:center;">
                <thead><tr><th>Tarih</th><th>Tansiyon</th><th>Nabız</th></tr></thead>
                <tbody id="hc-bt-body"></tbody>
            </table>
        </div>

        <div class="hc-result" id="hc-bt-result">
            <div id="hc-bt-stats" style="text-align:left; font-size:1em; line-height:1.6;"></div>
        </div>
    </div>
    <?php
}
