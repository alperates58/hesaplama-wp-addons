<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_salata_sosu_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-salad-dressing',
        HC_PLUGIN_URL . 'modules/salata-sosu-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-dressing-calc">
        <h3>Salata Sosu Oranı</h3>
        <div class="hc-form-group">
            <label for="hc-dressing-oil">Hedef Toplam Sos (ml):</label>
            <input type="number" id="hc-dressing-total" placeholder="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-dressing-type">Sos Karakteri:</label>
            <select id="hc-dressing-type">
                <option value="3">Klasik (3 Ölçek Yağ : 1 Ölçek Asit)</option>
                <option value="2">Ekşi Sevenler (2 Ölçek Yağ : 1 Ölçek Asit)</option>
                <option value="4">Hafif (4 Ölçek Yağ : 1 Ölçek Asit)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcSaladDressingHesapla()">Oranla</button>
        <div class="hc-result" id="hc-salad-dressing-result">
            <strong>Malzeme Dağılımı:</strong>
            <div id="hc-dressing-list" style="margin-top:10px;">-</div>
        </div>
    </div>
    <?php
}
