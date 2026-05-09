<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_element_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-elem-uyumu',
        HC_PLUGIN_URL . 'modules/element-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-elem-uyumu-css',
        HC_PLUGIN_URL . 'modules/element-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-element-uyumu-hesaplama">
        <h3>Element Uyumu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-elem-sel1">Sizin Elementiniz</label>
            <select id="hc-elem-sel1">
                <option value="Ateş">Ateş (Koç, Aslan, Yay)</option>
                <option value="Toprak">Toprak (Boğa, Başak, Oğlak)</option>
                <option value="Hava">Hava (İkizler, Terazi, Kova)</option>
                <option value="Su">Su (Yengeç, Akrep, Balık)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-elem-sel2">Partnerinizin Elementi</label>
            <select id="hc-elem-sel2">
                <option value="Ateş">Ateş (Koç, Aslan, Yay)</option>
                <option value="Toprak">Toprak (Boğa, Başak, Oğlak)</option>
                <option value="Hava">Hava (İkizler, Terazi, Kova)</option>
                <option value="Su">Su (Yengeç, Akrep, Balık)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcElementUyumuHesapla()">Uyum Analizi Yap</button>
        <div class="hc-result" id="hc-element-uyumu-result">
            <div class="hc-result-label">Doğal Enerji Uyumu:</div>
            <div class="hc-result-value" id="hc-elem-skor"></div>
            <div class="hc-result-desc" id="hc-elem-desc"></div>
        </div>
    </div>
    <?php
}
