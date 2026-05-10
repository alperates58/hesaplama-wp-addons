<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisi_sayisina_gore_kahve_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-coffee-pp',
        HC_PLUGIN_URL . 'modules/kisi-sayisina-gore-kahve-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-coffee-pp-calc">
        <h3>Kişi Sayısına Göre Kahve Ölçüsü</h3>
        <div class="hc-form-group">
            <label for="hc-coffee-pp-count">Kişi Sayısı:</label>
            <input type="number" id="hc-coffee-pp-count" placeholder="4">
        </div>
        <div class="hc-form-group">
            <label for="hc-coffee-pp-type">Kahve Türü:</label>
            <select id="hc-coffee-pp-type">
                <option value="7">Türk Kahvesi (7g / 65ml)</option>
                <option value="15">Filtre Kahve (15g / 250ml)</option>
                <option value="18">Espresso Double (18g / 40ml)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcCoffeePPHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-coffee-pp-result">
            <strong>Gereken Malzemeler:</strong>
            <div id="hc-coffee-pp-val" class="hc-result-value">-</div>
            <p id="hc-coffee-pp-info"></p>
        </div>
    </div>
    <?php
}
