<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yokdil_net_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yokdil-calc',
        HC_PLUGIN_URL . 'modules/yokdil-net-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-yokdil-box">
        <h3>YÖKDİL Puan Hesaplama</h3>
        <div class="hc-form-group">
            <label>Doğru Sayısı (Maks 80)</label>
            <input type="number" id="hc-yokdil-correct" max="80" min="0">
        </div>
        <button class="hc-btn" onclick="hcYokdilHesapla()">Puanı Hesapla</button>
        <div class="hc-result" id="hc-yokdil-result">
            <div class="hc-result-title">YÖKDİL Puanınız:</div>
            <div class="hc-result-value" id="hc-yokdil-val">-</div>
        </div>
    </div>
    <?php
}
