<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bardak_mililitre_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-cup-ml-conv',
        HC_PLUGIN_URL . 'modules/bardak-mililitre-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cupml-box">
        <h3>Bardak Mililitre Dönüştürücü</h3>
        <div class="hc-form-group">
            <label>Bardak Tipi</label>
            <select id="hc-cupml-type" onchange="hcCupToMl()">
                <option value="200">Standart Su Bardağı (200 ml)</option>
                <option value="250">Metrik Bardak (250 ml)</option>
                <option value="236.588">ABD Bardağı (236.6 ml)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>Bardak Sayısı</label>
            <input type="number" id="hc-cupml-cup" value="1" oninput="hcCupToMl()">
        </div>
        <div class="hc-form-group">
            <label>Mililitre (mL)</label>
            <input type="number" id="hc-cupml-ml" value="200" oninput="hcMlToCup()">
        </div>
    </div>
    <?php
}
