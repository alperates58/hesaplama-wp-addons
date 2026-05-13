<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_haritadaki_baskin_element_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-baskin-element',
        HC_PLUGIN_URL . 'modules/haritadaki-baskin-element-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-baskin-element-css',
        HC_PLUGIN_URL . 'modules/haritadaki-baskin-element-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-baskin-element">
        <div class="hc-header">
            <h3>Haritadaki Baskın Element Analizi</h3>
            <p>Doğum haritanızdaki mizaç dengesini keşfedin. Hangi element hayat enerjinizi yönetiyor?</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>Güneş</label>
                <select id="hc-he-sun" class="hc-input">
                    <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                    <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                    <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                    <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label>Ay</label>
                <select id="hc-he-moon" class="hc-input">
                    <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                    <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                    <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                    <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label>Yükselen</label>
                <select id="hc-he-asc" class="hc-input">
                    <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                    <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                    <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                    <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label>Merkür</label>
                <select id="hc-he-mercury" class="hc-input">
                    <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                    <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                    <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                    <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label>Venüs</label>
                <select id="hc-he-venus" class="hc-input">
                    <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                    <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                    <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                    <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label>Mars</label>
                <select id="hc-he-mars" class="hc-input">
                    <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                    <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                    <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                    <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcBaskinElementHesapla()">Baskın Elementimi Bul</button>

        <div class="hc-result" id="hc-he-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Baskın Elementiniz:</span>
                <span class="hc-result-value" id="hc-he-value">-</span>
            </div>
            <div class="hc-result-content" id="hc-he-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
