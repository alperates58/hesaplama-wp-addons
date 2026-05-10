<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisi_sayisina_gore_taco_malzemesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-taco-per-person',
        HC_PLUGIN_URL . 'modules/kisi-sayisina-gore-taco-malzemesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-taco-pp-calc">
        <h3>Kişi Sayısına Göre Taco Malzemeleri</h3>
        <div class="hc-form-group">
            <label for="hc-taco-count">Kişi Sayısı:</label>
            <input type="number" id="hc-taco-count" placeholder="4">
        </div>
        <button class="hc-btn" onclick="hcTacoPPHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-taco-pp-result">
            <strong>Taco Alışveriş Listesi:</strong>
            <div id="hc-taco-list" style="margin-top:10px;">-</div>
        </div>
    </div>
    <?php
}
