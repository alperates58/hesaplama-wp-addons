<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ehliyet_sinav_puan_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ehliyet-calc',
        HC_PLUGIN_URL . 'modules/ehliyet-sinav-puan-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ehliyet-calc">
        <h3>Ehliyet Sınav Puan Hesaplama</h3>
        <div class="hc-form-group">
            <label>Doğru Sayısı (0-50)</label>
            <input type="number" id="hc-ehliyet-correct" min="0" max="50" placeholder="Örn: 35">
        </div>
        <button class="hc-btn" onclick="hcEhliyetHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ehliyet-result">
            <div class="hc-result-title">Sınav Puanınız:</div>
            <div class="hc-result-value" id="hc-ehliyet-val">-</div>
            <div id="hc-ehliyet-status" style="font-size: 16px; font-weight: bold; margin-top: 10px;"></div>
            <p style="font-size: 12px; margin-top: 10px; color: #666;">* Yanlışlar doğruyu götürmez. Geçme puanı 70'tir.</p>
        </div>
    </div>
    <?php
}
