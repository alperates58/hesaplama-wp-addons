<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sinav_puan_ortalamasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-exam-avg',
        HC_PLUGIN_URL . 'modules/sinav-puan-ortalamasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-exam-avg">
        <h3>Sınav Puan Ortalaması</h3>
        <div id="hc-ea-inputs">
            <div class="hc-form-group">
                <label>1. Sınav:</label>
                <input type="number" class="hc-ea-score" placeholder="80">
            </div>
            <div class="hc-form-group">
                <label>2. Sınav:</label>
                <input type="number" class="hc-ea-score" placeholder="90">
            </div>
        </div>
        <div style="margin-bottom: 20px;">
            <button class="hc-btn" onclick="hcEaAddInput()" style="background:#666; font-size:0.8rem; padding:5px 10px;">+ Sınav Ekle</button>
        </div>
        <button class="hc-btn" onclick="hcExamAvgHesapla()">Ortalama Hesapla</button>
        <div class="hc-result" id="hc-sinav-puan-result">
            <strong>Ortalama Puan:</strong>
            <div id="hc-ea-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
