<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_temel_sayma_prensibi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-counting',
        HC_PLUGIN_URL . 'modules/temel-sayma-prensibi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-count">
        <h3>Temel Sayma Prensibi</h3>
        <div id="hc-count-inputs">
            <div class="hc-form-group">
                <label>1. Aşama Seçenek Sayısı:</label>
                <input type="number" class="hc-c-val" placeholder="3">
            </div>
            <div class="hc-form-group">
                <label>2. Aşama Seçenek Sayısı:</label>
                <input type="number" class="hc-c-val" placeholder="4">
            </div>
        </div>
        <div style="margin-bottom: 20px;">
            <button class="hc-btn" onclick="hcCountingAddInput()" style="background:#666; font-size:0.8rem; padding:5px 10px;">+ Aşama Ekle</button>
        </div>
        <button class="hc-btn" onclick="hcCountingHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-counting-result">
            <strong>Toplam Kombinasyon Sayısı:</strong>
            <div id="hc-c-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
