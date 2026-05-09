<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_aktif_karliligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-roa',
        HC_PLUGIN_URL . 'modules/aktif-karliligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-roa-css',
        HC_PLUGIN_URL . 'modules/aktif-karliligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-roa">
        <h3>Aktif Karlılığı (ROA) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-roa-net-profit">Yıllık Net Kar (TL)</label>
            <input type="number" id="hc-roa-net-profit">
        </div>

        <div class="hc-form-group">
            <label for="hc-roa-assets">Toplam Varlıklar (TL)</label>
            <input type="number" id="hc-roa-assets">
        </div>
        
        <button class="hc-btn" onclick="hcROAHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-roa-result">
            <div class="hc-result-value" id="hc-roa-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Yıllık Aktif Karlılığı (ROA)</p>
        </div>
    </div>
    <?php
}
