<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burc_elementi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burc-elementi',
        HC_PLUGIN_URL . 'modules/burc-elementi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burc-elementi-css',
        HC_PLUGIN_URL . 'modules/burc-elementi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burc-elementi-hesaplama">
        <h3>Burç Elementi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-element-burc-select">Burcunuzu Seçin</label>
            <select id="hc-element-burc-select">
                <option value="koc">Koç</option>
                <option value="boga">Boğa</option>
                <option value="ikizler">İkizler</option>
                <option value="yengec">Yengeç</option>
                <option value="aslan">Aslan</option>
                <option value="basak">Başak</option>
                <option value="terazi">Terazi</option>
                <option value="akrep">Akrep</option>
                <option value="yay">Yay</option>
                <option value="oglak">Oğlak</option>
                <option value="kova">Kova</option>
                <option value="balik">Balık</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcBurcElementiHesapla()">Elementi Bul</button>
        <div class="hc-result" id="hc-burc-elementi-result">
            <div class="hc-result-label">Burcunuzun Elementi:</div>
            <div class="hc-result-value" id="hc-element-value"></div>
            <div class="hc-result-desc" id="hc-element-desc"></div>
        </div>
    </div>
    <?php
}
