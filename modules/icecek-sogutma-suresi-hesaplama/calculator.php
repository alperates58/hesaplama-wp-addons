<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_icecek_sogutma_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-drink-cool',
        HC_PLUGIN_URL . 'modules/icecek-sogutma-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-drink-cool-calc">
        <h3>İçecek Soğutma Süresi</h3>
        <div class="hc-form-group">
            <label for="hc-cool-start">Mevcut Sıcaklık (°C):</label>
            <input type="number" id="hc-cool-start" placeholder="25">
        </div>
        <div class="hc-form-group">
            <label for="hc-cool-target">Hedef Sıcaklık (°C):</label>
            <input type="number" id="hc-cool-target" placeholder="4">
        </div>
        <div class="hc-form-group">
            <label for="hc-cool-method">Soğutma Yöntemi:</label>
            <select id="hc-cool-method">
                <option value="4">Buzdolabı (4°C)</option>
                <option value="-18">Dondurucu (-18°C)</option>
                <option value="0">Buzlu Su (0°C)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcDrinkCoolHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-drink-cool-result">
            <strong>Tahmini Süre:</strong>
            <div id="hc-cool-time" class="hc-result-value">-</div>
            <p id="hc-cool-tip"></p>
        </div>
    </div>
    <?php
}
