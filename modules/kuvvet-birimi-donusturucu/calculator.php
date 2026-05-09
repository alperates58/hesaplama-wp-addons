<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kuvvet_birimi_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-force-conv',
        HC_PLUGIN_URL . 'modules/kuvvet-birimi-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-force-box">
        <h3>Kuvvet Birimi Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Değer</label>
            <input type="number" id="hc-force-input" value="1" oninput="hcForceConvert()">
        </div>
        <div class="hc-form-group">
            <label>Kaynak Birim</label>
            <select id="hc-force-from" onchange="hcForceConvert()">
                <option value="n">Newton (N)</option>
                <option value="kn">Kilonewton (kN)</option>
                <option value="kgf">Kilogram-kuvvet (kgf)</option>
                <option value="lbf">Pound-kuvvet (lbf)</option>
            </select>
        </div>
        <div class="hc-result visible">
            <div id="hc-force-results" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;"></div>
        </div>
    </div>
    <?php
}
