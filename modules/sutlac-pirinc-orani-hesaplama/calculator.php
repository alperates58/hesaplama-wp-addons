<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sutlac_pirinc_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rice-pudding',
        HC_PLUGIN_URL . 'modules/sutlac-pirinc-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-rice-pudding-calc">
        <h3>Sütlaç Ölçü Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-rp-milk">Süt Miktarı (Litre):</label>
            <input type="number" id="hc-rp-milk" placeholder="1" step="0.5">
        </div>
        <button class="hc-btn" onclick="hcRicePuddingHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-rice-pudding-result">
            <strong>Gereken Malzemeler:</strong>
            <div id="hc-rp-res-list" style="margin-top:10px;">-</div>
        </div>
    </div>
    <?php
}
