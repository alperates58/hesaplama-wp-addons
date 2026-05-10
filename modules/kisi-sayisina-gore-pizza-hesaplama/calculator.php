<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisi_sayisina_gore_pizza_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pizza-per-person',
        HC_PLUGIN_URL . 'modules/kisi-sayisina-gore-pizza-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-pizza-pp-calc">
        <h3>Kişi Sayısına Göre Pizza</h3>
        <div class="hc-form-group">
            <label for="hc-pizza-count">Kişi Sayısı:</label>
            <input type="number" id="hc-pizza-count" placeholder="4">
        </div>
        <div class="hc-form-group">
            <label for="hc-pizza-size">Pizza Boyutu:</label>
            <select id="hc-pizza-size">
                <option value="1">Küçük Boy (1 kişilik)</option>
                <option value="2">Orta Boy (2 kişilik)</option>
                <option value="3">Büyük Boy (3 kişilik)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcPizzaPPHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-pizza-pp-result">
            <strong>Önerilen Sipariş:</strong>
            <div id="hc-pizza-val" class="hc-result-value">-</div>
            <p id="hc-pizza-info"></p>
        </div>
    </div>
    <?php
}
