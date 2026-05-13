<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_baba_cocuk_burc_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-baba-cocuk-uyum',
        HC_PLUGIN_URL . 'modules/baba-cocuk-burc-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-baba-cocuk-uyum-css',
        HC_PLUGIN_URL . 'modules/baba-cocuk-burc-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-baba-cocuk">
        <div class="hc-header">
            <h3>Baba-Çocuk Burç Uyumu</h3>
            <p>Babalık figürü ve çocuğun gelişimi arasındaki kadersel bağı ve rehberlik yolculuğunu keşfedin.</p>
        </div>
        
        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-bc-sign1">Babanın Burcu</label>
                <select id="hc-bc-sign1" class="hc-input">
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
                <label for="hc-bc-sign2">Çocuğun Burcu</label>
                <select id="hc-bc-sign2" class="hc-input">
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

        <button class="hc-btn" onclick="hcBabaCocukUyumHesapla()">Bağımızı Analiz Et</button>

        <div class="hc-result" id="hc-bc-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Rehberlik Uyumu:</span>
                <span class="hc-result-value" id="hc-bc-value">% -</span>
            </div>
            <div class="hc-result-content" id="hc-bc-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
