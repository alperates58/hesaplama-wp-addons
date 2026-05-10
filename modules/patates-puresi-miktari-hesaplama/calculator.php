<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_patates_puresi_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mash-potato',
        HC_PLUGIN_URL . 'modules/patates-puresi-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-mash-potato-calc">
        <h3>Patates Püresi Ölçüsü</h3>
        <div class="hc-form-group">
            <label for="hc-mp-count">Kişi Sayısı:</label>
            <input type="number" id="hc-mp-count" placeholder="4">
        </div>
        <button class="hc-btn" onclick="hcMashPotatoHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mash-potato-result">
            <strong>Gereken Malzemeler:</strong>
            <div id="hc-mp-list" style="margin-top:10px;">-</div>
        </div>
    </div>
    <?php
}
