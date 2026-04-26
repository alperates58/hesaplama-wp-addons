<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burc_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burc-uyumu-hesaplama',
        HC_PLUGIN_URL . 'modules/burc-uyumu-hesaplama/calculator.js',
        [],
        HC_VERSION,
        true
    );
    wp_enqueue_style(
        'hc-burc-uyumu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/burc-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ],
        HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burc-uyumu-hesaplama">
        <h3>♈ Burç Uyumu Hesaplama</h3>

        <div class="hc-burc-uyumu-hesaplama-grid">
            <div class="hc-form-group">
                <label for="hc-burc-1">1. Burç</label>
                <select id="hc-burc-1">
                    <option value="">Burç seçin</option>
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

            <div class="hc-form-group">
                <label for="hc-burc-2">2. Burç</label>
                <select id="hc-burc-2">
                    <option value="">Burç seçin</option>
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
        </div>

        <button class="hc-btn" onclick="hcBurcUyumuHesapla()">Uyumu Hesapla</button>

        <div class="hc-result" id="hc-burc-uyumu-hesaplama-result">
            <p class="hc-burc-uyumu-hesaplama-title" id="hc-burc-uyumu-title"></p>
            <div class="hc-result-value" id="hc-burc-uyumu-puan"></div>
            <p class="hc-burc-uyumu-hesaplama-seviye" id="hc-burc-uyumu-seviye"></p>
            <p class="hc-burc-uyumu-hesaplama-yorum" id="hc-burc-uyumu-yorum"></p>
        </div>
    </div>
    <?php
}
