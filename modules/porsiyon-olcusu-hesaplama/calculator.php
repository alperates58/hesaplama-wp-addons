<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_porsiyon_olcusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-portion-size-calc',
        HC_PLUGIN_URL . 'modules/porsiyon-olcusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-portion-calc">
        <h3>Porsiyon Ölçüsü Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-food-type">Yiyecek Türü:</label>
            <select id="hc-food-type">
                <option value="150">Et / Tavuk / Balık (150g)</option>
                <option value="100">Makarna / Pilav (Pişmiş, 100g)</option>
                <option value="200">Sebze Yemekleri (200g)</option>
                <option value="250">Çorba (250ml)</option>
                <option value="120">Tatlı / Pasta (120g)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-total-amount">Toplam Miktar (g veya ml):</label>
            <input type="number" id="hc-total-amount" placeholder="1000">
        </div>
        <button class="hc-btn" onclick="hcPortionSizeHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-portion-result">
            <strong>Toplam Porsiyon:</strong>
            <div id="hc-portion-val" class="hc-result-value">-</div>
            <p id="hc-portion-info"></p>
        </div>
    </div>
    <?php
}
