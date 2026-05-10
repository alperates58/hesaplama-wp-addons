<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kendinden_kabaran_un_karisimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-self-rising',
        HC_PLUGIN_URL . 'modules/kendinden-kabaran-un-karisimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-self-rising-calc">
        <h3>Kendinden Kabaran Un Hazırlama</h3>
        <div class="hc-form-group">
            <label for="hc-sr-target">Gereken Toplam Un (g):</label>
            <input type="number" id="hc-sr-target" placeholder="125">
            <small>Örn: 1 su bardağı yaklaşık 125g'dır.</small>
        </div>
        <button class="hc-btn" onclick="hcSelfRisingHesapla()">Karışımı Hesapla</button>
        <div class="hc-result" id="hc-self-rising-result">
            <strong>Malzemeler:</strong>
            <div id="hc-sr-list" style="margin-top:10px;">-</div>
        </div>
    </div>
    <?php
}
