<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sayi_yuvarlama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-num-round',
        HC_PLUGIN_URL . 'modules/sayi-yuvarlama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-num-round">
        <h3>Sayı Yuvarlama</h3>
        <div class="hc-form-group">
            <label for="hc-nr-val">Sayı:</label>
            <input type="number" id="hc-nr-val" step="any" placeholder="1234.5678">
        </div>
        <div class="hc-form-group">
            <label for="hc-nr-mode">Yuvarlama Basamağı:</label>
            <select id="hc-nr-mode">
                <option value="-3">En Yakın Binliğe</option>
                <option value="-2">En Yakın Yüzlüğe</option>
                <option value="-1">En Yakın Onluğa</option>
                <option value="0" selected>En Yakın Tam Sayıya</option>
                <option value="1">1 Ondalık Basamağa</option>
                <option value="2">2 Ondalık Basamağa</option>
                <option value="3">3 Ondalık Basamağa</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcNumRoundHesapla()">Yuvarla</button>
        <div class="hc-result" id="hc-sayi-yuvarlama-result">
            <strong>Sonuç:</strong>
            <div id="hc-nr-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
