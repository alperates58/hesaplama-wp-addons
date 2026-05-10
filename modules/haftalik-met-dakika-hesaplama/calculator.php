<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_haftalik_met_dakika_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-met-min',
        HC_PLUGIN_URL . 'modules/haftalik-met-dakika-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-met-min-css',
        HC_PLUGIN_URL . 'modules/haftalik-met-dakika-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-met-min">
        <h3>Haftalık MET-Dakika Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-met-intensity">Egzersiz Yoğunluğu:</label>
            <select id="hc-met-intensity">
                <option value="3.3">Yürüyüş (3.3 MET)</option>
                <option value="4.0">Hafif Egzersiz (4.0 MET)</option>
                <option value="8.0">Şiddetli Egzersiz / Koşu (8.0 MET)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-met-duration">Günlük Süre (Dakika):</label>
            <input type="number" id="hc-met-duration" placeholder="30">
        </div>
        <div class="hc-form-group">
            <label for="hc-met-days">Haftalık Gün Sayısı:</label>
            <input type="number" id="hc-met-days" placeholder="5">
        </div>
        <button class="hc-btn" onclick="hcMetMinHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-met-min-result">
            <strong>Haftalık Toplam MET-Dakika:</strong>
            <div id="hc-met-res-val" class="hc-result-value">-</div>
            <p id="hc-met-res-desc" style="margin-top:10px; font-size:0.85rem;"></p>
        </div>
    </div>
    <?php
}
