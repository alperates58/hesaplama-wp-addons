<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_toefl_puan_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-toefl-p-calc',
        HC_PLUGIN_URL . 'modules/toefl-puan-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-toefl-p-calc">
        <h3>TOEFL Puan Hesaplama</h3>
        <div class="hc-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
            <div class="hc-form-group"><label>Reading (0-30)</label><input type="number" class="hc-toefl-p-score" placeholder="Skor"></div>
            <div class="hc-form-group"><label>Listening (0-30)</label><input type="number" class="hc-toefl-p-score" placeholder="Skor"></div>
            <div class="hc-form-group"><label>Speaking (0-30)</label><input type="number" class="hc-toefl-p-score" placeholder="Skor"></div>
            <div class="hc-form-group"><label>Writing (0-30)</label><input type="number" class="hc-toefl-p-score" placeholder="Skor"></div>
        </div>
        <button class="hc-btn" onclick="hcToeflPHesapla()">Toplam Puanı Hesapla</button>
        <div class="hc-result" id="hc-toefl-p-result">
            <div class="hc-result-title">Toplam TOEFL Puanı:</div>
            <div class="hc-result-value" id="hc-toefl-p-val">-</div>
        </div>
    </div>
    <?php
}
