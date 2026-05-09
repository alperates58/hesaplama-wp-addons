<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_baume_yogunluk_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-baume-conv',
        HC_PLUGIN_URL . 'modules/baume-yogunluk-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-baume-box">
        <h3>Baumé Yoğunluk Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Sıvı Tipi</label>
            <select id="hc-baume-type" onchange="hcBaumeToSg()">
                <option value="heavy">Sudan Ağır (Ağır Sıvılar)</option>
                <option value="light">Sudan Hafif (Hafif Sıvılar)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>Baumé (°Bé)</label>
            <input type="number" id="hc-baume-val" value="10" step="0.1" oninput="hcBaumeToSg()">
        </div>
        <div class="hc-form-group">
            <label>Özgül Ağırlık (SG)</label>
            <input type="number" id="hc-baume-sg" value="1.074" step="0.001" oninput="hcSgToBaume()">
        </div>
    </div>
    <?php
}
