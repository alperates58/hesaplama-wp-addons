<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kopek_vucut_kitle_endeksi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kopek-vki',
        HC_PLUGIN_URL . 'modules/kopek-vucut-kitle-endeksi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kopek-vki-css',
        HC_PLUGIN_URL . 'modules/kopek-vucut-kitle-endeksi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kopek-vki">
        <h3>Köpek Vücut Kondisyon Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-kov-weight">Mevcut Kilo (kg):</label>
            <input type="number" id="hc-kov-weight" step="0.1" placeholder="15">
        </div>
        <div class="hc-form-group">
            <label for="hc-kov-waist">Bel Görünümü:</label>
            <select id="hc-kov-waist">
                <option value="1">Kaburgalar çok belirgin, bel çok ince</option>
                <option value="3">Kaburgalar kolayca hissediliyor, bel kıvrımı var</option>
                <option value="5">Kaburgalar zor hissediliyor, bel kıvrımı yok</option>
                <option value="7">Kaburgalar hissedilmiyor, karın bölgesinde belirgin yağ</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcKopekVkiHesapla()">Analiz Et</button>
        <div class="hc-result" id="hc-kopek-vki-result">
            <strong>Tahmini Durum:</strong>
            <div id="hc-kov-res-status" class="hc-result-value">-</div>
            <p id="hc-kov-res-info" style="margin-top:10px;"></p>
        </div>
    </div>
    <?php
}
