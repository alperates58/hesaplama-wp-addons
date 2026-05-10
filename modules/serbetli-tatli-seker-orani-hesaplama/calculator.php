<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_serbetli_tatli_seker_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dessert-syrup',
        HC_PLUGIN_URL . 'modules/serbetli-tatli-seker-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-dessert-syrup-calc">
        <h3>Şerbetli Tatlı Şerbeti</h3>
        <div class="hc-form-group">
            <label for="hc-ds-size">Tepsi Boyutu (Çap veya Kenar cm):</label>
            <input type="number" id="hc-ds-size" placeholder="30">
        </div>
        <div class="hc-form-group">
            <label for="hc-ds-type">Tatlı Türü:</label>
            <select id="hc-ds-type">
                <option value="1.2">Baklava (Koyu Şerbet)</option>
                <option value="1.0">Kadayıf (Orta Şerbet)</option>
                <option value="0.8">Revani / Hafif Tatlılar</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcDessertSyrupHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dessert-syrup-result">
            <strong>Gereken Şerbet Malzemeleri:</strong>
            <div id="hc-ds-res-list" style="margin-top:10px;">-</div>
        </div>
    </div>
    <?php
}
