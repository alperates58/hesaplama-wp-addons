<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kahve_olcusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-coffee-measure',
        HC_PLUGIN_URL . 'modules/kahve-olcusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-coffee-measure-calc">
        <h3>Kahve Ölçüsü (Yönteme Göre)</h3>
        <div class="hc-form-group">
            <label for="hc-measure-method">Demleme Yöntemi:</label>
            <select id="hc-measure-method">
                <option value="16">V60 / Pour Over (1:16)</option>
                <option value="15">French Press (1:15)</option>
                <option value="17">Chemex (1:17)</option>
                <option value="2">Espresso (1:2)</option>
                <option value="10">Türk Kahvesi (1:10)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-measure-cups">Fincan Sayısı:</label>
            <input type="number" id="hc-measure-cups" placeholder="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-measure-size">Fincan Hacmi (ml):</label>
            <input type="number" id="hc-measure-size" placeholder="250">
        </div>
        <button class="hc-btn" onclick="hcCoffeeMeasureHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-coffee-measure-result">
            <strong>Gereken Malzemeler:</strong>
            <div id="hc-measure-val" class="hc-result-value">-</div>
            <p id="hc-measure-desc"></p>
        </div>
    </div>
    <?php
}
