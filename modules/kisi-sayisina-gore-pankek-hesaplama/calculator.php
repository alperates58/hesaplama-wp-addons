<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisi_sayisina_gore_pankek_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pancake-per-person',
        HC_PLUGIN_URL . 'modules/kisi-sayisina-gore-pankek-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-pancake-pp-calc">
        <h3>Kişi Sayısına Göre Pankek Tarifi</h3>
        <div class="hc-form-group">
            <label for="hc-pancake-count">Kişi Sayısı:</label>
            <input type="number" id="hc-pancake-count" placeholder="4">
        </div>
        <button class="hc-btn" onclick="hcPancakePPHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-pancake-pp-result">
            <strong>Gereken Malzemeler:</strong>
            <div id="hc-pancake-list" style="margin-top:10px;">-</div>
            <p id="hc-pancake-info"></p>
        </div>
    </div>
    <?php
}
