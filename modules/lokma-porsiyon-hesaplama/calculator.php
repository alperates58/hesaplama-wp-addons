<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lokma_porsiyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lokma-pp',
        HC_PLUGIN_URL . 'modules/lokma-porsiyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-lokma-pp-calc">
        <h3>Lokma Porsiyon ve Tarif</h3>
        <div class="hc-form-group">
            <label for="hc-lokma-count">Kişi Sayısı:</label>
            <input type="number" id="hc-lokma-count" placeholder="20">
        </div>
        <button class="hc-btn" onclick="hcLokmaPPHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-lokma-pp-result">
            <strong>Gereken Malzemeler:</strong>
            <div id="hc-lokma-list" style="margin-top:10px;">-</div>
            <p id="hc-lokma-info"></p>
        </div>
    </div>
    <?php
}
