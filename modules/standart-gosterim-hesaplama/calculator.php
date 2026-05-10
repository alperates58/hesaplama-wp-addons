<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_standart_gosterim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-std-not',
        HC_PLUGIN_URL . 'modules/standart-gosterim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-std">
        <h3>Standart Gösterim (Bilimsel)</h3>
        <div class="hc-form-group">
            <label for="hc-sn-val">Sayıyı Giriniz:</label>
            <input type="text" id="hc-sn-val" placeholder="0.00005 veya 1200000">
        </div>
        <button class="hc-btn" onclick="hcStdNotHesapla()">Çevir</button>
        <div class="hc-result" id="hc-standart-gosterim-result">
            <strong>Standart Gösterim:</strong>
            <div id="hc-sn-res-val" class="hc-result-value" style="font-size: 1.5rem;">-</div>
        </div>
    </div>
    <?php
}
