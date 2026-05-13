<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_haritadaki_baskin_nitelik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-baskin-nitelik',
        HC_PLUGIN_URL . 'modules/haritadaki-baskin-nitelik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-baskin-nitelik-css',
        HC_PLUGIN_URL . 'modules/haritadaki-baskin-nitelik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-baskin-nitelik">
        <div class="hc-header">
            <h3>Haritadaki Baskın Nitelik Analizi</h3>
            <p>Hayat karşısındaki tavrınız nasıl? Öncü mü, sabit mi yoksa değişken mi?</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>Güneş</label>
                <select id="hc-hn-sun" class="hc-input">
                    <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                    <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                    <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                    <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label>Ay</label>
                <select id="hc-hn-moon" class="hc-input">
                    <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                    <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                    <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                    <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label>Yükselen</label>
                <select id="hc-hn-asc" class="hc-input">
                    <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                    <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                    <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                    <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label>Merkür</label>
                <select id="hc-hn-mercury" class="hc-input">
                    <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                    <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                    <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                    <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label>Venüs</label>
                <select id="hc-hn-venus" class="hc-input">
                    <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                    <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                    <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                    <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label>Mars</label>
                <select id="hc-hn-mars" class="hc-input">
                    <option value="koc">Koç</option><option value="boga">Boğa</option><option value="ikizler">İkizler</option>
                    <option value="yengec">Yengeç</option><option value="aslan">Aslan</option><option value="basak">Başak</option>
                    <option value="terazi">Terazi</option><option value="akrep">Akrep</option><option value="yay">Yay</option>
                    <option value="oglak">Oğlak</option><option value="kova">Kova</option><option value="balik">Balık</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcBaskinNitelikHesapla()">Baskın Niteliğimi Bul</button>

        <div class="hc-result" id="hc-hn-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Baskın Niteliğiniz:</span>
                <span class="hc-result-value" id="hc-hn-value">-</span>
            </div>
            <div class="hc-result-content" id="hc-hn-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
