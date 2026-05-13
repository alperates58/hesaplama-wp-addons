<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_anne_cocuk_burc_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-anne-cocuk-uyum',
        HC_PLUGIN_URL . 'modules/anne-cocuk-burc-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-anne-cocuk-uyum-css',
        HC_PLUGIN_URL . 'modules/anne-cocuk-burc-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-anne-cocuk">
        <div class="hc-header">
            <h3>Anne-Çocuk Burç Uyumu</h3>
            <p>Ebeveynlik yolculuğunda çocuğunuzun ruhsal ihtiyaçlarını ve sizin yaklaşımınızı keşfedin.</p>
        </div>
        
        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-ac-sign1">Annenin Burcu</label>
                <select id="hc-ac-sign1" class="hc-input">
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
                <label for="hc-ac-sign2">Çocuğun Burcu</label>
                <select id="hc-ac-sign2" class="hc-input">
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

        <button class="hc-btn" onclick="hcAnneCocukUyumHesapla()">Bağımızı Analiz Et</button>

        <div class="hc-result" id="hc-ac-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Duygusal Bağ:</span>
                <span class="hc-result-value" id="hc-ac-value">% -</span>
            </div>
            <div class="hc-result-content" id="hc-ac-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
