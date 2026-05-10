<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yemek_porsiyon_kontrolu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-portion-control',
        HC_PLUGIN_URL . 'modules/yemek-porsiyon-kontrolu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-portion-control-calc">
        <h3>Porsiyon Kontrolü</h3>
        <div class="hc-form-group">
            <label for="hc-pco-goal">Hedef Öğün Kalorisi (kcal):</label>
            <input type="number" id="hc-pco-goal" placeholder="500">
        </div>
        <div class="hc-form-group">
            <label for="hc-pco-dense">Yemek Kalori Yoğunluğu:</label>
            <select id="hc-pco-dense">
                <option value="0.5">Düşük (Sebze ağırlıklı - 50 kcal/100g)</option>
                <option value="1.5">Orta (Tavuk, Pilav vb. - 150 kcal/100g)</option>
                <option value="3.5">Yüksek (Kırmızı Et, Soslu - 350 kcal/100g)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcPortionControlHesapla()">Porsiyonu Bul</button>
        <div class="hc-result" id="hc-portion-control-result">
            <strong>İdeal Porsiyon Miktarı:</strong>
            <div id="hc-pco-val" class="hc-result-value">-</div>
            <p id="hc-pco-info"></p>
        </div>
    </div>
    <?php
}
