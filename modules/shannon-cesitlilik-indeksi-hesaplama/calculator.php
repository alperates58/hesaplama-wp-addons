<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_shannon_cesitlilik_indeksi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-shannon-calc',
        HC_PLUGIN_URL . 'modules/shannon-cesitlilik-indeksi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-shannon-calc-css',
        HC_PLUGIN_URL . 'modules/shannon-cesitlilik-indeksi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-shannon-calc">
        <h3>Shannon Çeşitlilik İndeksi (H')</h3>
        <p style="font-size:0.85rem; margin-bottom:15px;">Türlerin sayılarını virgülle ayırarak girin (Örn: 10, 25, 5, 2).</p>
        <div class="hc-form-group">
            <label for="hc-si-counts">Tür Birey Sayıları:</label>
            <input type="text" id="hc-si-counts" placeholder="10, 20, 5, 15">
        </div>
        <button class="hc-btn" onclick="hcShannonHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-shannon-calc-result">
            <strong>Shannon İndeksi (H'):</strong>
            <div id="hc-si-res-val" class="hc-result-value">-</div>
            <div id="hc-si-res-even" style="margin-top:10px; font-weight:bold;"></div>
        </div>
    </div>
    <?php
}
