<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_haritadaki_baskin_burc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-baskin-burc',
        HC_PLUGIN_URL . 'modules/haritadaki-baskin-burc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-baskin-burc-css',
        HC_PLUGIN_URL . 'modules/haritadaki-baskin-burc-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-baskin-burc">
        <div class="hc-header">
            <h3>Haritadaki Baskın Burç Analizi</h3>
            <p>Güneş burcunuzun ötesinde, haritanızın genelinde hangi burcun enerjisi daha baskın?</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>Güneş</label>
                <select id="hc-hb-sun" class="hc-input">
                    <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                    <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                    <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                    <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label>Ay</label>
                <select id="hc-hb-moon" class="hc-input">
                    <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                    <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                    <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                    <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label>Merkür</label>
                <select id="hc-hb-mercury" class="hc-input">
                    <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                    <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                    <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                    <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label>Venüs</label>
                <select id="hc-hb-venus" class="hc-input">
                    <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                    <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                    <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                    <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label>Mars</label>
                <select id="hc-hb-mars" class="hc-input">
                    <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                    <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                    <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                    <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label>Yükselen</label>
                <select id="hc-hb-asc" class="hc-input">
                    <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                    <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                    <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                    <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcBaskinBurcHesapla()">Baskın Burcumu Bul</button>

        <div class="hc-result" id="hc-hb-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Baskın Burcunuz:</span>
                <span class="hc-result-value" id="hc-hb-value">-</span>
            </div>
            <div class="hc-result-content" id="hc-hb-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
