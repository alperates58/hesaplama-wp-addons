<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burc_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burc-uyumu',
        HC_PLUGIN_URL . 'modules/burc-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burc-uyumu-css',
        HC_PLUGIN_URL . 'modules/burc-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burc-uyumu-hesaplama">
        <h3>Burç Uyumu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-burc1">Sizin Burcunuz</label>
            <select id="hc-burc1">
                <option value="Koç">Koç</option>
                <option value="Boğa">Boğa</option>
                <option value="İkizler">İkizler</option>
                <option value="Yengeç">Yengeç</option>
                <option value="Aslan">Aslan</option>
                <option value="Başak">Başak</option>
                <option value="Terazi">Terazi</option>
                <option value="Akrep">Akrep</option>
                <option value="Yay">Yay</option>
                <option value="Oğlak">Oğlak</option>
                <option value="Kova">Kova</option>
                <option value="Balık">Balık</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-burc2">Partnerinizin Burcu</label>
            <select id="hc-burc2">
                <option value="Koç">Koç</option>
                <option value="Boğa">Boğa</option>
                <option value="İkizler">İkizler</option>
                <option value="Yengeç">Yengeç</option>
                <option value="Aslan">Aslan</option>
                <option value="Başak">Başak</option>
                <option value="Terazi">Terazi</option>
                <option value="Akrep">Akrep</option>
                <option value="Yay">Yay</option>
                <option value="Oğlak">Oğlak</option>
                <option value="Kova">Kova</option>
                <option value="Balık">Balık</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcBurcUyumuHesapla()">Uyumu Analiz Et</button>
        <div class="hc-result" id="hc-burc-uyumu-result">
            <div class="hc-result-label">Genel Uyum Skoru:</div>
            <div class="hc-result-value" id="hc-uyum-skor"></div>
            <div class="hc-result-desc" id="hc-uyum-desc"></div>
        </div>
    </div>
    <?php
}
