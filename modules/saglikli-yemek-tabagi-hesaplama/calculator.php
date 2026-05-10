<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_saglikli_yemek_tabagi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-healthy-plate',
        HC_PLUGIN_URL . 'modules/saglikli-yemek-tabagi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-healthy-plate-calc">
        <h3>Sağlıklı Yemek Tabağı</h3>
        <div class="hc-form-group">
            <label for="hc-plate-total">Öğün Kalori Hedefi (kcal):</label>
            <input type="number" id="hc-plate-total" placeholder="600">
        </div>
        <button class="hc-btn" onclick="hcHealthyPlateHesapla()">Tabağı Planla</button>
        <div class="hc-result" id="hc-healthy-plate-result">
            <strong>Tabak Dağılımı:</strong>
            <div id="hc-plate-list" style="margin-top:10px;">-</div>
            <p id="hc-plate-info"></p>
        </div>
    </div>
    <?php
}
