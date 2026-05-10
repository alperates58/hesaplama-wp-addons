<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_shannon_cesitlilik_indeksi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-shannon-cesitlilik-indeksi-hesaplama',
        HC_PLUGIN_URL . 'modules/shannon-cesitlilik-indeksi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-shannon-cesitlilik-indeksi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/shannon-cesitlilik-indeksi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-shannon">
        <h3>Shannon Çeşitlilik İndeksi (H)</h3>
        <p style="font-size:0.85em; color:#666; margin-bottom:15px;">Her türün birey sayısını girin.</p>
        <div id="hc-sh-inputs">
            <div class="hc-form-group">
                <label>Tür 1 Birey Sayısı</label>
                <input type="number" class="hc-sh-val" placeholder="Örn: 10" value="10">
            </div>
            <div class="hc-form-group">
                <label>Tür 2 Birey Sayısı</label>
                <input type="number" class="hc-sh-val" placeholder="Örn: 20" value="20">
            </div>
        </div>
        <button class="hc-btn-secondary" onclick="hcAddShannonInput()" style="margin-bottom:10px;">+ Tür Ekle</button>
        <button class="hc-btn" onclick="hcShannonÇeşitlilikİndeksiHesapla()">İndeksi Hesapla</button>
        <div class="hc-result" id="hc-sh-result">
            <div class="hc-result-label">İndeks Değeri (H):</div>
            <div class="hc-result-value" id="hc-sh-val">-</div>
            <p id="hc-sh-evenness" style="margin-top:10px; font-size:0.9em;"></p>
        </div>
    </div>
    <?php
}
