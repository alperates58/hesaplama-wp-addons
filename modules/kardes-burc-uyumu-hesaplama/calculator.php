<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kardes_burc_uyumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kardes-uyum',
        HC_PLUGIN_URL . 'modules/kardes-burc-uyumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kardes-uyum-css',
        HC_PLUGIN_URL . 'modules/kardes-burc-uyumu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kardes-uyum">
        <div class="hc-header">
            <h3>Kardeş Burç Uyumu</h3>
            <p>Hayat boyu sürecek olan en derin bağlardan biri... Kardeşinizle olan uyumunuzu keşfedin.</p>
        </div>
        
        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-ku-sign1">1. Kardeşin Burcu</label>
                <select id="hc-ku-sign1" class="hc-input">
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
                <label for="hc-ku-sign2">2. Kardeşin Burcu</label>
                <select id="hc-ku-sign2" class="hc-input">
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

        <button class="hc-btn" onclick="hcKardesUyumHesapla()">Kardeşlik Bağını Gör</button>

        <div class="hc-result" id="hc-ku-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Kardeşlik Uyumu:</span>
                <span class="hc-result-value" id="hc-ku-value">% -</span>
            </div>
            <div class="hc-result-content" id="hc-ku-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
