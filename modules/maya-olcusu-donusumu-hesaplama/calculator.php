<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_maya_olcusu_donusumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yeast-conv-js',
        HC_PLUGIN_URL . 'modules/maya-olcusu-donusumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yeast-conv-css',
        HC_PLUGIN_URL . 'modules/maya-olcusu-donusumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yeast-conv">
        <h3>Maya Ölçüsü Dönüşümü</h3>
        
        <div class="hc-form-group">
            <label for="hc-yc-amount">Tarifteki Miktar (Gram)</label>
            <input type="number" id="hc-yc-amount" value="10" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-yc-from">Tarifteki Maya Türü</label>
            <select id="hc-yc-from">
                <option value="instant">Instant Maya</option>
                <option value="active">Kuru Maya (Active Dry)</option>
                <option value="fresh">Yaş Maya</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcMayaDonustur()">Dönüştür</button>

        <div class="hc-result" id="hc-yeast-conv-result">
            <div id="hc-yc-res-list">
                <!-- JS will populate -->
            </div>
        </div>
    </div>
    <?php
}
