<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yokdil_puan_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yokdil-puan-calc',
        HC_PLUGIN_URL . 'modules/yokdil-puan-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-yokdil-p-calc">
        <h3>YÖKDİL Puan Hesaplama</h3>
        <div class="hc-form-group">
            <label>Doğru Sayısı (0-80)</label>
            <input type="number" id="hc-yokdil-p-correct" min="0" max="80" placeholder="Örn: 55">
        </div>
        <button class="hc-btn" onclick="hcYokdilPHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-yokdil-p-result">
            <div class="hc-result-title">YÖKDİL Puanı:</div>
            <div class="hc-result-value" id="hc-yokdil-p-val">-</div>
            <p style="font-size: 12px; margin-top: 10px; color: #666;">* Yanlışlar doğruyu götürmez. Her soru 1.25 puandır.</p>
        </div>
    </div>
    <?php
}
