<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_oy_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-vote-rate',
        HC_PLUGIN_URL . 'modules/oy-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-vote-rate">
        <h3>Oy Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-vr-votes">Alınan Oy Sayısı:</label>
            <input type="number" id="hc-vr-votes" placeholder="1500">
        </div>
        <div class="hc-form-group">
            <label for="hc-vr-total">Toplam Geçerli Oy Sayısı:</label>
            <input type="number" id="hc-vr-total" placeholder="5000">
        </div>
        <button class="hc-btn" onclick="hcVoteRateHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-vote-rate-result">
            <strong>Oy Oranı:</strong>
            <div id="hc-vr-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
