<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ltr_100km_ve_mpg_donusturme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fuel-unit-conv',
        HC_PLUGIN_URL . 'modules/ltr-100km-ve-mpg-donusturme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-fuc-box">
        <h3>Yakıt Ekonomisi Dönüştürme Hesaplama</h3>
        <div class="hc-form-group">
            <label>Tüketim (L / 100km)</label>
            <input type="number" step="0.1" id="hc-fuc-input-l100" value="8.0" oninput="hcFucConvert()">
        </div>
        <div class="hc-result visible">
            <div class="hc-result-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                <div><strong>MPG (US):</strong><br><span id="hc-fuc-mpg-us">-</span></div>
                <div><strong>MPG (UK):</strong><br><span id="hc-fuc-mpg-uk">-</span></div>
            </div>
        </div>
    </div>
    <?php
}
