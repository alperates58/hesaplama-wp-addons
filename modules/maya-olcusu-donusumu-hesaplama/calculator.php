<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_maya_olcusu_donusumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yeast-conv',
        HC_PLUGIN_URL . 'modules/maya-olcusu-donusumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-yeast-conv-calc">
        <h3>Maya Türü Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-yeast-orig-type">Elinizdeki Maya:</label>
            <select id="hc-yeast-orig-type">
                <option value="1">Instant Maya</option>
                <option value="1.25">Aktif Kuru Maya</option>
                <option value="3">Yaş Maya</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-yeast-orig-val">Miktar (g):</label>
            <input type="number" id="hc-yeast-orig-val" placeholder="10">
        </div>
        <button class="hc-btn" onclick="hcYeastConvHesapla()">Dönüştür</button>
        <div class="hc-result" id="hc-yeast-conv-result">
            <strong>Eşdeğer Miktarlar:</strong>
            <div id="hc-yeast-conv-list" style="margin-top:10px;">-</div>
        </div>
    </div>
    <?php
}
