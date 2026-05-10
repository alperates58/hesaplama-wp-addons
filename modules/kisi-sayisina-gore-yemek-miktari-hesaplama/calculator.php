<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisi_sayisina_gore_yemek_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-food-per-person',
        HC_PLUGIN_URL . 'modules/kisi-sayisina-gore-yemek-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-food-pp-calc">
        <h3>Kişi Sayısına Göre Yemek Ölçüsü</h3>
        <div class="hc-form-group">
            <label for="hc-food-count">Kişi Sayısı:</label>
            <input type="number" id="hc-food-count" placeholder="20">
        </div>
        <button class="hc-btn" onclick="hcFoodPPHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-food-pp-result">
            <strong>Genel Menü Planı:</strong>
            <div id="hc-food-list" style="margin-top:10px;">-</div>
        </div>
    </div>
    <?php
}
