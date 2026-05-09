<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_direnc_birimi_donusturme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-res-conv',
        HC_PLUGIN_URL . 'modules/direnc-birimi-donusturme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-res-box">
        <h3>Direnç Birimi Dönüştürme Hesaplama</h3>
        <div class="hc-form-group">
            <label>Değer</label>
            <input type="number" id="hc-res-input" value="1" oninput="hcResConvert()">
        </div>
        <div class="hc-form-group">
            <label>Kaynak Birim</label>
            <select id="hc-res-from" onchange="hcResConvert()">
                <option value="ohm">Ohm (Ω)</option>
                <option value="kohm">Kilohm (kΩ)</option>
                <option value="mohm">Megohm (MΩ)</option>
                <option value="miohm">Miliohm (mΩ)</option>
            </select>
        </div>
        <div class="hc-result visible">
            <div id="hc-res-results" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;"></div>
        </div>
    </div>
    <?php
}
