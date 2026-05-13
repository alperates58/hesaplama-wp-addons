<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burc_yonetici_element_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burc-element',
        HC_PLUGIN_URL . 'modules/burc-yonetici-element-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burc-element-css',
        HC_PLUGIN_URL . 'modules/burc-yonetici-element-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burc-element">
        <div class="hc-header">
            <h3>Burç Elementi Hesaplama</h3>
            <p>Astrolojide elementler, ruhumuzun ham maddesidir. Sizin ruhunuz hangi elementten yapıldı?</p>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-be-sign">Burcunuzu Seçin</label>
            <select id="hc-be-sign" class="hc-input">
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

        <button class="hc-btn" onclick="hcBurcElementHesapla()">Elementimi Bul</button>

        <div class="hc-result" id="hc-be-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Yönetici Elementiniz:</span>
                <span class="hc-result-value" id="hc-be-value">-</span>
            </div>
            <div class="hc-result-content" id="hc-be-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
